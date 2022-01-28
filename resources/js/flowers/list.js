$(document).ready(() => {
    index();
    $("#close-modal").click(() => {
        $("#info-modal").toggle()
    })

    $("#filter-flowers").on('submit', event => {
        event.preventDefault();
        const form = $("#filter-flowers").serialize()
        index(form);
    }).on('change', () => {
        $("#filter-flowers").submit();

    })
})


const index = function index(form = null) {
    $.ajax({
        url: `${location.origin}/list-flowers`,
        type: 'get',
        data: form,
        dataType: 'json',
        success: (response => {
            const flowers = response.flowers
            pagination(flowers)
            loadFlowers(flowers.data);
        }),
        error: (response => {
            console.log(response)
        })
    });
}

const imgPlaceholder = img => {
    $(img).css('box-shadow', '1px 1px 5px 0px #00000040;');
    $(img).attr('src', 'https://www.gemkom.com.tr/wp-content/uploads/2020/02/NO_IMG_600x600-1.png');
}

const loadFlowers = (flowers) => {
    $("#flowers-list").html('');

    const appendElement = (flower) => {
        $("#flowers-list").append(`
            <li class="">
                <div class="flex flex-col text-center gap-4 flower-list__picture-container">
                    <img src="storage/${flower.photo}" onerror="imgPlaceholder(this)" alt="${flower.name}" class="flower-list__picture" onclick="find(${flower.id})"/>
                    <span class="flower-list__legend">${flower.name}</span>
                </div>
            </li>
        `);
        }

    if (Object.keys(flowers).length === 1) {
        const key = Object.keys(flowers)[0]
        return appendElement(flowers[key])
    }

    if(flowers.constructor !== Object) {
        for (const flower of flowers) {
            appendElement(flower)
        }

        return
    }

    for (const key in flowers) {
        appendElement(flowers[key]);
    }


}

const find = id => {
    // window.alert(id);
    const fileExists = url => {
        const http = new XMLHttpRequest()
        http.open('HEAD', url, false)
        http.send()
        return http.status !== 404
    }
    $.ajax({
        url: `${location.origin}/flower/${id}`,
        type: 'GET',
        success: ((response) => {
            console.log(response.name)
            const img = fileExists(`storage/${response.flower.photo}`) ? [(`storage/${response.flower.photo}`), 'cover'] : ['https://www.gemkom.com.tr/wp-content/uploads/2020/02/NO_IMG_600x600-1.png']
            $('.modal-body__title-name').text(response.flower.name)
            $('.modal-body__about-flower').text(response.flower.description)
            $('.modal-body__bee-names').text(response.flower.bees)
            $('.modal-header').css({
                'background': `url('${img[0]}') no-repeat center`,
                'background-size': `${img[1]}`,
            })
            $("#info-modal").toggle()
        })
    })
}

const pagination = flowers => {
    console.log(flowers.current_page)
}

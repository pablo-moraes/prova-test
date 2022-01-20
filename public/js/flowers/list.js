$(document).ready(() => {
    index();
    $("#close-modal").click(() => {
        $("#info-modal").toggle()
    })

    // $("#filter-flowers").on('change', () => {
    // });

    $("#filter-flowers").on('submit', (event) => {
        event.preventDefault();
        const form = $("#filter-flowers").serialize()
        index(form);
    }).on('change', () => {
        $("#filter-flowers").submit();

    })
})


function index(form = null) {
    $.ajax({
        url: `${location.origin}/list-flowers`,
        type: 'get',
        data: form,
        dataType: 'json',
        success: ((response) => {
            console.log(response.flowers);
            loadFlowers(response.flowers);
        }),
        error: ((response) => {
            console.log(response)
        })
    });
}

const loadFlowers = (flowers) => {
    $("#flowers-list").html('');
    const appendElement = (flower) => {
        console.log('puta');
        console.log(flower);
        $("#flowers-list").append(`
            <li class="">
                <div class="flex flex-col text-center gap-4 flower-list__picture-container">
                    <img src="storage/${flower.photo}" alt="${flower.name}" class="flower-list__picture" onclick="find(${flower.id})"/>
                    <span class="flower-list__legend">${flower.name}</span>
                </div>
            </li>
        `);
        }

    if (Object.keys(flowers).length === 1) {
        const key = Object.keys(flowers)[0]
        return appendElement(flowers[key])
    }
    for (const flower of flowers) {
        appendElement(flower)
    }
}

const find = (id) => {
    // window.alert(id);

    $.ajax({
        url: `${location.origin}/flower/${id}`,
        type: 'GET',
        success: ((response) => {
            console.log(response.name)
            $('.modal-body__title-name').text(response.flower.name)
            $('.modal-body__about-flower').text(response.flower.description)
            $('.modal-body__bee-names').text(response.flower.bees)
            $('.modal-header').css({
                'background': `url('storage/${response.flower.photo}') no-repeat center`,
                'background-size': 'cover'
            })
            $("#info-modal").toggle()
        })
    })
}

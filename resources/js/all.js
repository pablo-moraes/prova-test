$(document).ready(() => {
    fillMonths();
});

function fillMonths() {
    for(let m = 0; m < 12; m++) {
        let month = formattedShortDate(m);
        let lowerMonth = month.toLowerCase();
        $('.checkbox-months').append(`
                    <li class="shadow-md">
                        <input type="checkbox" name="months[]" id="flower-months" value="${lowerMonth}">
                        <span class="text-center">${month}</span>
                    </li>`);
    }
}

function formattedShortDate(month = 0) {
    let shortDate = new Date(1970, month, 1).toLocaleString('pt-PT', {month: 'short'}).replace(/\W+/, '');
    // This code search the first letter in a text and change the capitalization to upper case
    return shortDate.replace(/\b[a-z]/, `${shortDate.match(/\b[a-z]/)[0].toUpperCase()}`);
}


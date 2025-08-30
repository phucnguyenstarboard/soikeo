function removeComma(number) {
    if (number == '' || number == undefined) {
        number = "0";
    }
    var removed = ("" + number).replace(/,/g, '');
    return parseInt(removed, 10);
}

function intNumberFormat(number) {
    return parseInt(number, 10).toLocaleString();
}


function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
} 

function getGrossMarginRatio(gross_margin_amount, total_amount) {
    let gross_margin_ratio = 0.0;
    if (total_amount > 0) {
        gross_margin_ratio = Math.round(parseInt(gross_margin_amount, 10) / parseInt(total_amount, 10) * 1000) / 10;
    }
    return gross_margin_ratio;
}
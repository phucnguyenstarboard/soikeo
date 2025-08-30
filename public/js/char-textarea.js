$(document).on('keyup', '.char-textarea', function (event) {
    checkTextAreaMaxLength(this, event);
    // to later change text color in dark layout
    $(this).addClass("active");
});

/*
Checks the MaxLength of the Textarea
-----------------------------------------------------
@prerequisite:  textBox = textarea dom element
        e = textarea event
                length = Max length of characters
*/
function checkTextAreaMaxLength(textBox, e) {
    let $danger = "#ea5455";
    let $primary = "#7367f0";
    let $textcolor = "#4e5154";
    let maxLength = parseInt($(textBox).data("length")),
        counterValue = $(textBox).parent().find('.counter-value'),
        charTextarea = $(textBox).parent().find(".char-textarea");

    if (!checkSpecialKeys(e)) {
        if (textBox.value.length < maxLength - 1)
        textBox.value = textBox.value.substring(0, maxLength);
    }
    $(textBox).parent().find(".char-count").html(textBox.value.length);

    if (textBox.value.length > maxLength) {
        counterValue.css("background-color", $danger);
        charTextarea.css("color", $danger);
        // to change text color after limit is maxedout out
        charTextarea.addClass("max-limit");
    } else {
        counterValue.css("background-color", $primary);
        charTextarea.css("color", $textcolor);
        charTextarea.removeClass("max-limit");
    }

    return true;
}
function checkSpecialKeys(e) {
    if (
        e.keyCode != 8 &&
        e.keyCode != 46 &&
        e.keyCode != 37 &&
        e.keyCode != 38 &&
        e.keyCode != 39 &&
        e.keyCode != 40
    )
        return false;
    else return true;
}

$(document).on('click', '.upItem', function () {
    moveUp(this)
});
$(document).on('click', '.downItem', function () {
    moveDown(this)
});

// Move the row up
function moveUp(content) {
    var tr = $(content).closest('tr'); // DTFC_LeftWrapper
    let row_index = tr.index();
    let real_row = tr.closest('.DTFC_ScrollWrapper').find('.dataTables_scroll tbody tr:eq(' + row_index + ')');

    let prev_tr = tr.prev("tr");
    if(tr.prev.length) {
        tr.insertBefore(prev_tr);
    }
    let prev_real_tr = real_row.prev("tr");
    if(real_row.prev.length) {
        real_row.insertBefore(prev_real_tr);
    }
}

// Move the row down
function moveDown(content) {
    var tr = $(content).closest('tr'); // DTFC_LeftWrapper
    let row_index = tr.index();
    let real_row = tr.closest('.DTFC_ScrollWrapper').find('.dataTables_scroll tbody tr:eq(' + row_index + ')');

    let next_tr = tr.next("tr");
    if(tr.next.length) {
        tr.insertAfter(next_tr);
    }
    let next_real_tr = real_row.next("tr");
    if(real_row.next.length) {
        real_row.insertAfter(next_real_tr);
    }
}

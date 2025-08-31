$(document).on('click', '.upItem', function () {
    moveUp(this)
});
$(document).on('click', '.downItem', function () {
    moveDown(this)
});

// Move the row up
function moveUp(content) {
    var tr = $(content).closest('tr');
    let prev_tr = tr.prev("tr");
    if(tr.prev.length) {
        tr.insertBefore(prev_tr);
    }
}

// Move the row down
function moveDown(content) {
    var tr = $(content).closest('tr');
    let next_tr = tr.next("tr");
    if(tr.next.length) {
        tr.insertAfter(next_tr);
    }
}

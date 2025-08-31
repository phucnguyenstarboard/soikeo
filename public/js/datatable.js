(function (window, document, $) {
    // Thay đổi setting mặc định
    $.extend($.fn.dataTable.defaults, {
        language: {
            "emptyTable": "Không có dữ liệu.",
            "info": " Hiển thị từ START đến END trong tổng số TOTAL dữ liệu.",
            "infoEmpty": " Hiển thị từ 0 đến 0 trong tổng số 0 dữ liệu.",
            "infoFiltered": "(Trích xuất toàn bộ MAX) dữ liệu.",
            "infoThousands": ",",
            "lengthMenu": "Hiển thị MENU ",
            "loadingRecords": "Đang tải...",
            "processing": "Đang xử lý…",
            "search": "Tìm kiếm:",
            "zeroRecords": "Không có bản ghi trùng khớp.",
            "paginate": {
                "first": "Đầu",
                "last": "Cuối",
                "next": "Trang sau",
                "previous": "Trang trước"
            },
            "aria": {
                "sortAscending": ": Sắp xếp cột theo tứ tự tăng dần",
                "sortDescending": ": Sắp xếp cột theo tứ tự giảm dần"
            }
        }
    });
})(window, document, jQuery);

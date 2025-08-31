@extends('layouts.admin')
@section('title')
<title>Danh sách sản phẩm - ADMIN</title>
@endsection
@section('content')
    <h3 class="text-center" style="font-weight: 700;">Danh sách sản phẩm</h3>
    <!-- list -->
    <a style="color: #fff;" href="{{ route('admin_category_add') }}" class="btn btn-primary mb-2">Thêm mới</a>
    <div id="search_result">
        @include('pages.admin.subpages.category_list',[
           'data_list' => $data_list
        ])
    </div>
    
    <form id="form_back" action="{{ route('admin_category') }}" method="GET" style="display: none;"></form>
    <form id="form_update" action="{{ route('admin_category_delete') }}" method="POST" style="display: none;">
        <input type="hidden" class="hdId" name="cat_id" value="">>
    </form>

@endsection

@push('scripts')
    <script>
        var dt_index_1;
        $(document).ready(function() {
            $(".btn-sidebar").on('click', function(event) {
                $('#sidebarMenu').toggle({
                    direction: "left"
                }, 100);
            });

            $(document).on('click', '.btn-confirm-2', function() {
                $(".hdId").val($(this).attr('data-id'));
                var m = 'Bạn muốn xóa sản phẩm [ ' + $(this).attr('data-name') + ' ] ?';
                Swal.fire({
                    title: 'Xác nhận',
                    html: m,
                    type: '',
                    showCancelButton: true,
                    showConfirmButton: true,
                    confirmButtonText: "Xác nhận",
                    cancelButtonText: "Hủy",
                }).then(function(result) {
                    if (result['dismiss'] === undefined) {
                        updateData($('#form_update'), false, function(data) {
                            window.location.reload();
                        });
                    }
                });

            });

            // DatePicker
            // $('.datepicker').datepicker();
            initDataTable();

        });

        function initDataTable() {
            dt_index_1 = $('.t2-datatable').DataTable({
                "oLanguage": {
                   "sSearch": "Tên sản phẩm"
                },
                lengthChange: false,
                displayLength: 20,
                ordering: false,
                searching: false,
                paginate: true,
                info: false,
                scrollX: true,
                "dom": '<"top"f>rt<"bottom"lp><"clear">', 
                columnDefs: [
                    {
                        targets: 0,
                        width: 40
                    },
                    {
                        targets: 1,
                        width: 80
                    },
                    {
                        targets: 2,
                        width: 400
                    },
                    {
                        targets: 3,
                        width: 100
                    },
                    {
                        targets: 4,
                        width: 100
                    },
                    {
                        targets: 5,
                        width: 80
                    },
                ],
            });
        }
    </script>
@endpush
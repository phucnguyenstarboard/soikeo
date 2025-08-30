@extends('layouts.admin')
@section('title')
<title>银行列表 - ADMIN</title>
@endsection
@section('content')
    <h3 class="text-center" style="font-weight: 700;">银行列表</h3>
    <!-- list -->
    <a style="color: #fff;" href="{{ route('admin_banks_add') }}" class="btn btn-primary mb-2">添加银行</a>
    <div id="search_result">
        @include('pages.admin.subpages.bank_list',[
           'data_list' => $data_list
        ])
    </div>
    
    <form id="form_back" action="{{ route('admin_banks') }}" method="GET" style="display: none;"></form>
    <form id="form_update" action="{{ route('admin_banks_delete') }}" method="POST" style="display: none;">
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
                var m = '您确定要删除这家银行吗 [ ' + $(this).attr('data-name') + ' ] ?';
                Swal.fire({
                    title: '确认',
                    html: m,
                    type: '',
                    showCancelButton: true,
                    showConfirmButton: true,
                    confirmButtonText: "确认",
                    cancelButtonText: "取消",
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
                   "sSearch": "Tên danh mục"
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
                        width: 70
                    },
                    {
                        targets: 2,
                        width: 400
                    },
                    {
                        targets: 3,
                        width: 100
                    }
                ],
            });
        }
    </script>
@endpush
@extends('admin.layout')
  
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6"><h5>{{ __('Giải đấu') }}</h5></div>
                        <div class="col-md-6 text-right"><a class="btn btn-primary ml-4" href="{{ route('tour_add') }}" role="button">Thêm giải đấu</a></div>
                    </div>
                </div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
  
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 60px;">Thứ tự</th>
                                <th>Tên gốc</th>
                                <th>Tên thay đổi</th>                               
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                              $i = 1;
                            @endphp
                            @foreach($items as $item)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>{{ $item->tour_name }}</td>
                                <td>{{ $item->tour_name_edit }}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary" href="{{ route('tour_edit', $item->id) }}" role="button">Cập nhật</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    (function(window, document, $) {
        // デフォルトの設定を変更
        $.extend( $.fn.dataTable.defaults, {
            language: {
                "emptyTable": "Không có dữ liệu.",
                "info": " Hiển thị từ _START_ đến _END_ của _TOTAL_ dòng",
                "infoEmpty": " Hiển thị 0 đến 0 trên 0",
                "infoFiltered": "(Tìm kiếm trong tổng số _MAX_ dòng)",
                "infoThousands": ",",
                "lengthMenu": "Hiển thị _MENU_ dòng trên trang",
                "loadingRecords": "Đang tải...",
                "processing": "Đang xử lý...",
                "search": "Tìm kiếm:",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "paginate": {
                    "first": "Trang đầu",
                    "last": "Trang cuối",
                    "next": "Trang sau",
                    "previous": "Trang trước"
                },
            }
        });
    })(window, document, jQuery);    
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endsection

@extends('admin.layout')
  
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                      <div class="col-md-6"><h5>{{ __('Trận đấu') }}</h5></div>
                      <div class="col-md-6 text-right"><a class="btn btn-primary ml-4" href="{{ route('match_add') }}" role="button">Thêm trận đấu</a></div>
                    </div
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
                                <th>Thứ tự</th>
                                <th>Giải đấu</th>
                                <th>Thời gian</th>
                                <th>Đội và Đội</th>
                                <th>Dự đoán</th>
                                <th>Kết quả (Hiệp 1)</th>
                                <th>Xác xuất (%)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                @php
                                $matchResult =  $item->matchResult;
                                $result1 = $item->result1;
                                if ($item->matchLong == "未"){
                                    $result1 = 'Chưa có';
                                }
                                @endphp
                            <tr>
                                <td>{{ $item->rowNo }}</td>
                                <td>{{ !empty($item->tour_name_edit) ? $item->tour_name_edit : $item->tour_name }}</td>
                                <td>{{ $item->matchTime }}</td>
                                <td>{{ $item->homeTeam }} vs {{ $item-> visitTeam }}</td>
                                <td>{{ $matchResult }}</td>
                                <td>{{ $result1 }}</td>
                                <td>{{ $item->recPercent }} %</td>
                                <td class="text-center">
                                    <a class="btn btn-primary" href="{{ route('match_edit', $item->matchId) }}" role="button">Cập nhật</a>
                                    <button data-id="{{ $item->matchId }}" class="btn btn-danger ml-2 btn-delete" role="button">Xoá</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <form id="frmDelete" action="{{ route('match_delete.post') }}" method="POST">
    @csrf
       <input type="hidden" name="matchId" id="hdMatchId">
    </form>
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

        $('body').on('click','.btn-delete', function() {
              $('body').loadingOverlay(true, {
                  backgroundColor: 'rgba(0,0,0,0.65)',
              });
              $("#hdMatchId").val($(this).attr("data-id"));
              $("#frmDelete").submit();
        });       
    } );
</script>
@endsection

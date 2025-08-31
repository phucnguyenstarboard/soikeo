<div class="row" id="tabpanel">
    <div class="col-12">
        <div class="card overflow-hidden">
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered t2-datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">Thao tác</th>
                                    <th class="text-center">Tài khoản</th>
                                    <th class="text-center">Tên người dùng</th>
                                    <th class="text-center">Kết quả cược</th>
                                    <th class="text-center">Tình trạng</th>
                                    <th class="text-center">Kết quả phiên</th>
                                    <th class="text-center">Số tiền cược</th>
                                    <th class="text-center">Thời gian đặt cược</th>
                                    <th class="text-center">Mã phiên</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_list as $item)
                                <tr>
                                    <td class="text-center">
                                        <button data-type="{{$item->bet}}" data-status="{{ $item->status }}" data-session="{{ $item->session_id }}" data-account="{{ $item->account }}" data-id="{{ $item->id }}" type="button" class="btn-show-modal btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-light">Cập Nhật</button>
                                    </td>
                                    <td class="text-center">{{ $item->account }}</td>
                                    <td class="text-center">{{ $item->username }}</td>
                                    <td class="text-center">{{ $item->bet == 1 ? 'Xuất' : 'Nhập' }}</td>
                                    <td class="text-center">{{ $item->status == 1 ? 'Thắng' : ($item->status == 2 ? 'Thua' : 'Đang xử lý') }}</td>
                                    <td class="text-center">
                                        <div class="col-12 col-md-12 text-center number">
                                            <span class="txt-num-1">{{ substr($item->result,0,1) }}</span>
                                            <span class="txt-num-2">{{ substr($item->result,1,1) }}</span>
                                            <span class="txt-num-3">{{ substr($item->result,2,1) }}</span>
                                            <span class="txt-num-4">{{ substr($item->result,3,1) }}</span>
                                            <span class="txt-num-5">{{ substr($item->result,4,1) }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ number_format($item->betMoney) }} VNĐ</td>
                                    <td class="text-center">{{ date('d/m/Y H:i:s', $item->timeInt) }}</td>
                                    <td class="text-center">{{ $item->session_id }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                     <div class="mt-1"></div>
                    {{ $data_list->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
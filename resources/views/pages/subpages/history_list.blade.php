<div class="row" id="tabpanel">
    <div class="col-12">
        <div class="card overflow-hidden">
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered t1-datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">Mã phiên</th>
                                    <th class="text-center">Kết quả tham gia</th>
                                    <th class="text-center">Kết quả đổi thưởng</th>
                                    <th class="text-center">Số tiền tham gia</th>
                                    <th class="text-center">Số tiền thưởng</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Thời gian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_list as $item)
                                <tr>
                                    <td class="text-center">{{ $item->session_id }}</td>
                                    <td class="text-center">{{ $item->bet == 1 ? 'Xuất' : 'Nhập' }}</td>
                                    <td class="text-center">{{ $item->status == 0 ? 'Đợi mở thưởng' : $item->result }}</td>
                                    <td class="text-center">{{ number_format($item->betMoney) }}</td>
                                    <td class="text-center">{{ $item->status == 1 ? number_format($item->betMoney) : ($item->status == 2 ? 0 : '') }}</td>
                                    <td class="text-center">{{ $item->status == 1 ? 'Đúng' : ($item->status == 2 ? 'Sai' : 'Đang xử lý') }}</td>
                                    <td class="text-center">{{ date('d/m/Y H:i:s', $item->timeInt) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
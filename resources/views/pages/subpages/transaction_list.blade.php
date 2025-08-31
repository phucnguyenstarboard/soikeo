<div class="row" id="tabpanel">
    <div class="col-12">
        <div class="card overflow-hidden">
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered t1-datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">Thời gian giao dịch</th>
                                    <th class="text-center">Mã tiền giao dịch</th>
                                    <th class="text-center">Loại xổ số</th>
                                    <th class="text-center">Số dư trước</th>
                                    <th class="text-center">Số dư sau</th>
                                    <th class="text-center">Loại giao dịch</th>
                                    <th class="text-center">Số tiền giao dịch</th>
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
                                    <td class="text-center">{{ $item->status == 1 ? 'Thắng' : ($item->status == 2 ? 'Thua' : 'Đang xử lý') }}</td>
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
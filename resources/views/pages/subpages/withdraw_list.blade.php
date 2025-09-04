<div class="row" id="tabpanel">
    <div class="col-12">
        <div class="card overflow-hidden">
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered t2-datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Thao tác</th>
                                    <th class="text-center">Tên tài khoản</th>
                                    <th class="text-center">Số tiền rút</th>
                                    <th class="text-center">Tên tài khoản ngân hàng</th>
                                    <th class="text-center">Số tài khoản ngân hàng</th>
                                    <th class="text-center">Tên ngân hàng</th>
                                    <th class="text-center">IP</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Thời gian tạo</th>
                                    <th class="text-center">Thời gian cập nhật</th>
                                    <th class="text-center">Ghi chú</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_list as $k => $item)
                                @php
                                $d_create = '';
                                $d_update = '';

                                $date = $item->time_created;

                                if(!empty($date)){
                                $tz1 = 'UTC';
                                $tz2 = 'Asia/Ho_Chi_Minh'; // UTC +7
                                $findme = '(';
                                $pos = strpos($date, $findme );
                                if ($pos !== false) {
                                $date = substr($date,0, $pos);
                                }
                                $d_create = new DateTime($date, new DateTimeZone($tz1));
                                $d_create->setTimeZone(new DateTimeZone($tz2));
                                $d_create = $d_create->format('Y-m-d H:i:s');
                                }

                                $date = $item->time_updated;

                                if(!empty($date)){
                                $tz1 = 'UTC';
                                $tz2 = 'Asia/Ho_Chi_Minh'; // UTC +7
                                $findme = '(';
                                $pos = strpos($date, $findme );
                                if ($pos !== false) {
                                $date = substr($date,0, $pos);
                                }
                                $d_update = new DateTime($date, new DateTimeZone($tz1));
                                $d_update->setTimeZone(new DateTimeZone($tz2));
                                $d_update = $d_update->format('Y-m-d H:i:s');
                                }

                                @endphp
                                @if(strtotime($from) < strtotime($d_update) && strtotime($to)> strtotime($d_update))
                                    <tr>
                                        <td class="text-center">{{ $k + 1 }}</td>
                                        <td class="text-center">
                                            @if($item->status == 0)
                                            <button data-status="1" data-id="{{ $item->id }}" type="button" class="btn-confirm btn btn-primary">Duyệt</button>
                                            <button data-status="2" data-id="{{ $item->id }}" type="button" class="btn-confirm btn btn-outline-danger">Từ chối</button>
                                            @endif
                                            <button data-status="3" data-id="{{ $item->id }}" type="button" class="btn-confirm btn btn-danger">Xoá</button>
                                        </td>
                                        <td class="text-center">{{ $item->account }}</td>
                                        <td class="text-center">{{ number_format($item->amount) }}</td>
                                        <td class="text-center">{{ $item->account_name }}</td>
                                        <td class="text-center">{{ $item->account_number }}</td>
                                        <td class="text-center">{{ $item->bank_name }}</td>
                                        <td class="text-center">{{ $item->ip }}</td>
                                        <td class="text-center">{{ $item->status == 1 ? 'Đã duyệt' : ($item->status == 2 ? 'Đã từ chối' : 'Chưa xác nhận') }}</td>
                                        <td class="text-center">{{ $d_create }}</td>
                                        <td class="text-center">{{ $d_update }}</td>
                                        <td class="text-center">{{ $item->note }}</td>

                                    </tr>
                                    @endif
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
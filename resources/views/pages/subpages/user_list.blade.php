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
                                    <th class="text-center">Số dư</th>
                                    <th class="text-center">Thời gian đăng ký</th>
                                    <th class="text-center">Thời gian đăng nhập lần cuối</th>
                                    <th class="text-center">IP đăng nhập</th>
                                    <th class="text-center">IP đăng ký</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_list as $k => $item)
                                @php
                                $d_update = '';
                                $d_login = '';

                                $date = $item->time_register;

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

                                $date = $item->time_last_login;

                                if(!empty($date)){
                                $tz1 = 'UTC';
                                $tz2 = 'Asia/Ho_Chi_Minh'; // UTC +7
                                $findme = '(';
                                $pos = strpos($date, $findme );
                                if ($pos !== false) {
                                $date = substr($date,0, $pos);
                                }
                                $d_login = new DateTime($date, new DateTimeZone($tz1));
                                $d_login->setTimeZone(new DateTimeZone($tz2));
                                $d_login = $d_login->format('Y-m-d H:i:s');
                                }

                                @endphp

                                <tr>
                                    <td class="text-center">{{ $k + 1 }}</td>
                                    <td class="text-center">
                                        <button data-status="1" data-balance="{{ $item->balance }}" data-username="{{ $item->username }}" data-account="{{ $item->account }}" data-id="{{ $item->id }}" type="button" class="btn-confirm-2 btn btn-primary">Cập Nhật</button>
                                        <button data-status="2" data-balance="{{ $item->balance }}" data-username="{{ $item->username }}" data-account="{{ $item->account }}" data-id="{{ $item->id }}" type="button" class="btn-confirm-2 btn btn-primary">Đổi mật khẩu</button>
                                        <button data-status="3" data-balance="{{ $item->balance }}" data-username="{{ $item->username }}" data-account="{{ $item->account }}" data-id="{{ $item->id }}" type="button" class="btn-confirm-2 btn btn-primary">Đổi mật khẩu quỹ</button>
                                        <button data-status="6" data-balance="{{ $item->balance }}" data-username="{{ $item->username }}" data-account="{{ $item->account }}" data-id="{{ $item->id }}" type="button" class="btn-confirm-2 btn btn-outline-danger mt-1">Cập nhật thưởng</button>
                                        <button data-status="4" data-balance="{{ $item->balance }}" data-username="{{ $item->username }}" data-account="{{ $item->account }}" data-id="{{ $item->id }}" type="button" class="btn-confirm-2 btn btn-outline-danger mt-1">Cập nhật số dư</button>
                                        <button data-status="5" data-balance="{{ $item->balance }}" data-username="{{ $item->username }}" data-account="{{ $item->account }}" data-id="{{ $item->id }}" type="button" class="btn-confirm-2 btn btn-danger mt-1">Xoá</button>
                                    </td>
                                    <td class="text-center">{{ $item->account }}</td>
                                    <td class="text-center">{{ number_format($item->balance) }}</td>
                                    <td class="text-center">{{ $d_update }}</td>
                                    <td class="text-center">{{ $d_login }}</td>
                                    <td class="text-center">{{ $item->ip_login }}</td>
                                    <td class="text-center">{{ $item->ip_register }}</td>

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
<div class="row" id="tabpanel">
    <div class="col-12">
        <div class="card overflow-hidden">
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered t2-datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">操作</th>
                                    <th class="text-center">帐户名称</th>
                                    <th class="text-center">平衡</th>
                                    <th class="text-center">报名期限</th>
                                    <th class="text-center">上次登录时间</th>
                                    <th class="text-center">登录IP</th>
                                    <th class="text-center">注册IP</th>

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
                                        <button data-status="1" data-balance="{{ $item->balance }}" data-username="{{ $item->username }}" data-account="{{ $item->account }}" data-id="{{ $item->id }}" type="button" class="btn-confirm-2 btn btn-primary">更新</button>
                                        <button data-status="2" data-balance="{{ $item->balance }}" data-username="{{ $item->username }}" data-account="{{ $item->account }}" data-id="{{ $item->id }}" type="button" class="btn-confirm-2 btn btn-primary">更改密码</button>
                                        <button data-status="3" data-balance="{{ $item->balance }}" data-username="{{ $item->username }}" data-account="{{ $item->account }}" data-id="{{ $item->id }}" type="button" class="btn-confirm-2 btn btn-primary">修改资金密码</button>
                                        <button data-status="6" data-balance="{{ $item->balance }}" data-username="{{ $item->username }}" data-account="{{ $item->account }}" data-id="{{ $item->id }}" type="button" class="btn-confirm-2 btn btn-outline-danger mt-1">更新奖励</button>
                                        <button data-status="4" data-balance="{{ $item->balance }}" data-username="{{ $item->username }}" data-account="{{ $item->account }}" data-id="{{ $item->id }}" type="button" class="btn-confirm-2 btn btn-outline-danger mt-1">更新余额</button>
                                        <button data-status="5" data-balance="{{ $item->balance }}" data-username="{{ $item->username }}" data-account="{{ $item->account }}" data-id="{{ $item->id }}" type="button" class="btn-confirm-2 btn btn-danger mt-1">删除</button>
                                    </td>
                                    <td class="text-center">{{ $item->account }}</td>
                                    <td class="text-center">R$ {{ number_format($item->balance) }}</td>
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
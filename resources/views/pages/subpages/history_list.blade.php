<div class="row" id="tabpanel">
    <div class="col-12">
        <div class="card overflow-hidden">
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered t1-datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">操作</th>
                                    <th class="text-center">帐户名称</th>
                                    <th class="text-center">用户名</th>
                                    <th class="text-center">投注结果</th>
                                    <th class="text-center">地位</th>
                                    <th class="text-center">投注代码结果</th>
                                    <th class="text-center">投注金额</th>
                                    <th class="text-center">投注时间</th>
                                    <th class="text-center">会话代码</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_list as $item)
                                <tr>
                                    <td class="text-center">
                                        <button data-type="{{$item->bet}}" data-status="{{ $item->status }}" data-session="{{ $item->session_id }}" data-account="{{ $item->account }}" data-id="{{ $item->id }}" type="button" class="btn-show-modal btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-light">更新</button>
                                    </td>
                                    <td class="text-center">{{ $item->account }}</td>
                                    <td class="text-center">{{ $item->username }}</td>
                                    <td class="text-center">{{ $item->bet == 1 ? 'Export' : 'Import' }}</td>
                                    <td class="text-center">{{ $item->status == 1 ? 'Win' : ($item->status == 2 ? 'Lose' : 'Pendding') }}</td>
                                    <td class="text-center">
                                        <div class="text-center number">
                                            <span class="txt-num-1">{{ substr($item->result,0,1) }}</span>
                                            <span class="txt-num-2">{{ substr($item->result,1,1) }}</span>
                                            <span class="txt-num-3">{{ substr($item->result,2,1) }}</span>
                                            <span class="txt-num-4">{{ substr($item->result,3,1) }}</span>
                                            <span class="txt-num-5">{{ substr($item->result,4,1) }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center">R$ {{ number_format($item->betMoney) }}</td>
                                    <td class="text-center">{{ date('d/m/Y H:i:s', $item->timeInt) }}</td>
                                    <td class="text-center">{{ $item->number }}</td>
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
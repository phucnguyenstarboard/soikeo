<div class="row" id="tabpanel">
    <div class="col-12">
        <div class="card overflow-hidden">
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered t1-datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">周期数</th>
                                    <th class="text-center">开始时间</th>
                                    <th class="text-center">结束时间</th>
                                    <th class="text-center">地位</th>
                                    <th class="text-center">开奖时间</th>
                                    <th class="text-center"></th>
                                    <th class="text-center">开奖结果</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_list as $item)
                                <tr>
                                    <td class="text-center">{{ date('Ymd', $item->timeInt) }} - {{ $item->session_id }}</td>
                                    <td class="text-center">{{ date('Y-m-d H:i:s', $item->timeInt) }}</td>
                                    <td class="text-center">{{ date('Y-m-d H:i:s', $item->timeInt + 180) }}</td>
                                    <td class="text-center {{ $item->timeInt > strtotime(date('Y-m-d H:i:s')) ? 'active' : '' }}">{{ $item->timeInt > strtotime(date('Y-m-d H:i:s')) ? '等待奖品开启' : '奖品已开启' }}</td>
                                    <td class="text-center">{{ date('Y-m-d H:i:s', $item->timeInt) }}</td>
                                    <td class="text-center">
                                        <div class="col-12 col-md-12 text-center number">
                                            <span class="txt-num-1">{{ substr($item->result,0,1) }}</span>
                                            <span class="txt-num-2">{{ substr($item->result,1,1) }}</span>
                                            <span class="txt-num-3">{{ substr($item->result,2,1) }}</span>
                                            <span class="txt-num-4">{{ substr($item->result,3,1) }}</span>
                                            <span class="txt-num-5">{{ substr($item->result,4,1) }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center {{ $item->timeInt > strtotime(date('Y-m-d H:i:s')) ? 'active' : '' }}">
                                        @if($item->timeInt > strtotime(date('Y-m-d H:i:s')))
                                        <a href="{{ route('home') }}" class="btn btn-primary btn-setup">重置</a>
                                        @else
                                        <a href="javascript:void(9)" style="cursor:default" class="btn btn-light ">结束了</a>
                                        @endif

                                    </td>
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
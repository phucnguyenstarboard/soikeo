<div class="row" id="tabpanel">
    <div class="col-12">
        <div class="card overflow-hidden">
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered t1-datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Thời gian</th>
                                    <th class="text-center">Số điện thoại</th>
                                    <th class="text-center">Nội dung</th>
                                    <th class="text-center">Trạng thái</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_list as $k => $item)
                                <tr>
                                    <td class="text-center">{{ $k + 1 }}</td>
                                    <td class="text-center">{{ date('d/m/Y H:i:s', strtotime($item->time_updated ))}}</td>
                                    <td class="text-center">{{ $item->phone }}</td>
                                    <td class="text-center">{{ $item->content }}</td>
                                    <td class="text-center">{{ $item->status == 0 ? 'Đang xử lý' : 'Đã xử lý' }}</td>
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
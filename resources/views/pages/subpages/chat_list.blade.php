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
                                    <th class="text-center">Thời gian</th>
                                    <th class="text-center">Số điện thoại</th>
                                    <th class="text-center">Nội dung</th>
                                    <th class="text-center">Hình ảnh</th>
                                    <th class="text-center">Trạng thái</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_list as $k => $item)
                                <tr>
                                    <td class="text-center">
                                    @if($item->status == 0)
                                        <button data-status="1" data-id="{{ $item->id }}" type="button" class="btn-confirm btn btn-primary">Duyệt</button>
                                        <button data-status="2" data-id="{{ $item->id }}" type="button" class="btn-confirm btn btn-outline-danger">Từ chối</button>
                                    @endif
                                        <button data-status="3" data-id="{{ $item->id }}" type="button" class="btn-confirm btn btn-danger">Xoá</button>
                                    </td>
                                    <td class="text-center">{{ date('d/m/Y H:i:s', strtotime($item->time_updated ))}}</td>
                                    <td class="text-center">{{ $item->phone }}</td>
                                    <td class="text-center">{{ $item->content }}</td>
                                    <td class="text-center">
                                        <a href="{{ $item->image }}" target="_blank"><img src="{{ $item->image }}" width="100px" height="100px"></a>
                                    </td>
                                    <td class="text-center">{{ $item->status == 0 ? 'Đang xử lý' : ($item->status == 1 ? 'Đã xử lý' : 'Từ chối' ) }}</td>
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
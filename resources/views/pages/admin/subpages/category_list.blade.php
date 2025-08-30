<div class="row" id="tabpanel">
    <div class="col-12">
        <div class="card overflow-hidden">
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered t2-datatable" style="width: 100%;">
                            <thead>
                                <tr>                                    
                                    <th class="text-center">商品ID</th>
                                    <th class="text-center">操作</th>
                                    <th class="text-center">商品名称</th>
                                    <th class="text-center">商品图片</th>
                                    <th class="text-center">商品价格</th>
                                    <th class="text-center">已移除？</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_list as $k => $item)
                                <tr>
                                    <td class="text-center">{{ $k + 1 }}</td>                                    
                                    <td class="text-center"><button {{ $item->is_delete == 1 ? 'disabled' :  '' }} data-id="{{ $item->id }}" data-name="{{ $item->title }}" type="button" class="btn-confirm-2 btn btn-danger">删除</button></td>
                                    <td class="text-left"><a style="color: blue" href="{{ route('admin_category_edit', ['id' => $item->id ] ) }}">{!! $item->title !!}</a></td>
                                    <td class="text-center">
                                        @if(!empty($item->image))
                                        <img src="{{ asset('uploads/category/'.$item->image ) }}"  height="32px" width="32px" />
                                        @endif
                                    </td>
                                    <td class="text-right">R$ {{ number_format($item->price) }}</td>
                                    <td class="text-center">{{ empty($item->is_delete) ? '' : 'X' }}</td>
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
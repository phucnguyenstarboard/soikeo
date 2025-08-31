@extends('layouts.admin')
@section('title')
<title>Cập nhật sản phẩm - ADMIN</title>
@endsection
@section('page-style')
<!-- <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css"> -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> -->
<link rel="stylesheet" href="{{ asset('css/style_admin.css') }}">
@endsection
@section('content')
    <h3 class="text-center" style="font-weight: 700;">Cập nhật sản phẩm</h3>

    <div class="card block-search">
        <div class="card-content">
            <div class="card-body mt-1">
                <div>
                    <form id="form-create" action="{{ route('admin_category_update', ['id' => $product->id ]) }}" method="POST" enctype="multipart/form-data" novalidate="">
                        @csrf
                        
                        <div class="row">
                             <div class="col-12 col-sm-6 col-lg-4">
                                <label for="s-ordered_date_s">Tên sản phẩm</label>
                                <fieldset class="form-group">
                                    <input type="text" class="form-control" required value="{{ $product->title }}" name="title">
                                    <div class="help-block"></div>
                                </fieldset>
                            </div>

                            <div class="col-12 col-sm-4 col-lg-4">
                                <label for="s-ordered_date_s">Hình ảnh</label>
                                <fieldset class="form-group">
                                    <input type="file" class="form-control" name="image">
                                    <div class="help-block"></div>
                                </fieldset>
                            </div>

                            <div class="col-12 col-sm-2 col-lg-4">
                                <label for="s-ordered_date_s">Giá sản phẩm</label>
                                <fieldset class="form-group">
                                    <input type="text" class="form-control" required value="{{ $product->price }}" name="price">
                                    <div class="help-block"></div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-12 col-lg-12">
                                <label for="s-ordered_date_s">Mô tả sản phẩm</label>
                                <fieldset class="form-group">
                                    <textarea rows="3" class="form-control" required name="description">{{ $product->description }}</textarea>
                                    <div class="help-block"></div>
                                </fieldset>
                            </div>                           
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-3 col-lg-3">
                                <label for="s-ordered_date_s"></label>
                                <fieldset class="form-group">
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" {{ 1 == $product->is_delete ? 'checked="checked"' : '' }} style="height: 20px;width: 20px;" type="checkbox" name="is_delete" id="inlineCheckbox1" value="1">
                                      <label class="form-check-label" for="inlineCheckbox1">Xóa sản phẩm</label>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        

                        <div class="row mb-2 mt-1">
                            <div class="col-12 col-sm-12 col-lg-12 text-center">
                                <button  type="submit" class="btn-confirm-2 btn btn-primary mr-3">Cập nhật</button>

                                <button  type="button" class="btn-confirm-2 btn-reset btn btn-outline-primary mr-3">Hủy</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <form id="form_back" action="{{ route('admin_category') }}" method="GET" style="display: none;"></form>

@endsection
@push('scripts')
    <script>
        var dt_index_1;
        $(document).ready(function() {


            $(".btn-sidebar").on('click', function(event) {
                $('#sidebarMenu').toggle({
                    direction: "left"
                }, 100);
            });

            $(document).on('click', '.btn-reset', function() {                
                $('#form-create')[0].reset();
            });



            initValidation();
        });
        function initValidation() {

                if($("#form-create").attr("novalidate")!=undefined){
                    // Input, Select, Textarea validations except submit button
                    $("#form-create").find("input,select,textarea").not("[type=submit]").jqBootstrapValidation({
                        submitSuccess: function ($form, event) {
                            updateDataFile($form, true);
                            // will not trigger the default submission in favor of the ajax function
                            event.preventDefault();
                        },
                        submitError: function ($form, event, errors) {
                            let messages = '{{ trans('common.error_validate') }}';
                            // エラー詳細を表示する場合は以下を使う
                            // $.each(errors, function(key, val){
                            //     messages = messages + val[0] + '<br>';
                            // });

                            // if (messages.slice(-4) == '<br>') {
                            //     messages = messages.slice(0, -4);
                            // }
                            Swal.fire({
                                title: '{{ trans('common.warning') }}',
                                html: messages,
                                type: 'warning',
                                showCancelButton: false,
                            });
                        },
                    });
                }
        }
    </script>
@endpush
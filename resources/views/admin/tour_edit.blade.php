@extends('admin.layout')
  
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cập nhật giải đấu') }}</div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('edit_tour.post', $item->id) }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="tour_name" class="col-md-4 col-form-label text-md-right">Tên gốc</label>
                              <div class="col-md-6">
                                  <input type="text" id="tour_name" readonly class="form-control" name="tour_name" value="{{ $item->tour_name  }}">
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="tour_name_edit" class="col-md-4 col-form-label text-md-right">Tên thay đổi</label>
                              <div class="col-md-6">
                                  <input type="text" id="tour_name_edit" class="form-control" name="tour_name_edit" value="{{ $item->tour_name_edit  }}">
                              </div>
                          </div>
  
                          <div class="col-md-6 offset-md-4">
                               <button type="submit" class="btn btn-primary btn-submit">
                                  Cập nhật
                               </button>
                               <a class="btn btn-secondary ml-4" href="{{ route('tour') }}" role="button">Về trang danh sách</a>
                          </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
      $(document).ready(function() {
          $('body').on('click','.btn-submit', function() {
              $('body').loadingOverlay(true, {
                  backgroundColor: 'rgba(0,0,0,0.65)',
              });
          });
      });
</script>
@endsection

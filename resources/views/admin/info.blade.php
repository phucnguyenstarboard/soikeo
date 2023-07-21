@extends('admin.layout')
  
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h5>{{ __('Thông tin khác') }}</h5></div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('info.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="link_zalo" class="col-md-4 col-form-label text-md-right">Link Zalo</label>
                              <div class="col-md-6">
                                  <input type="text" id="link_zalo" class="form-control" name="link_zalo" value="{{ $user->link_zalo  }}">
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="link_tele" class="col-md-4 col-form-label text-md-right">Link Telegram</label>
                              <div class="col-md-6">
                                  <input type="text" id="link_tele" class="form-control" name="link_tele" value="{{ $user->link_tele  }}">
                              </div>
                          </div>

                           <div class="form-group row">
                              <label for="link_km" class="col-md-4 col-form-label text-md-right">Link đăng ký VIP</label>
                              <div class="col-md-6">
                                  <input type="text" id="link_km" class="form-control" name="link_km" value="{{ $user->link_km  }}">
                              </div>
                          </div>
  
                          <div class="col-md-6 offset-md-4">
                               <button type="submit" class="btn btn-primary btn-submit">
                                  Cập nhật
                               </button>
                               <a class="btn btn-secondary ml-4" href="{{ route('dashboard') }}" role="button">Về trang chủ</a>
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

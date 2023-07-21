@extends('admin.layout')
  
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cập nhật trận đấu') }} - {{ $item->matchId }} </div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('match_edit.post', $item->matchId) }}" method="POST">
                          @csrf
                             <div class="form-group row">
                                <label for="tournamentId" class="col-md-4 col-form-label text-md-right">Giải đấu</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="tournamentId" id="tournamentId">
                                      @foreach($tours as $tour) 
                                      <option {{ $tour->id == $item->tournamentId ? 'selected' : '' }} value="{{ $tour->id }}">{{ !empty($tour->tour_name_edit) ? $tour->tour_name_edit : $tour->tour_name }}</option> 
                                      @endforeach
                                    </select>
                                </div>    
                              </div>                          
                            <div class="form-group row">
                              <label for="rowNo" class="col-md-4 col-form-label text-md-right">Thứ tự</label>
                              <div class="col-md-6">
                                  <input type="text" id="rowNo" class="form-control" name="rowNo" value="{{ $item->rowNo }}">
                              </div>
                            </div>
  
                            <div class="form-group row">
                              <label for="homeTeam" class="col-md-4 col-form-label text-md-right">Tên đội nhà</label>
                              <div class="col-md-6">
                                  <input type="text" id="homeTeam" class="form-control" name="homeTeam" value="{{ $item->homeTeam }}">
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="visitTeam" class="col-md-4 col-form-label text-md-right">Tên đội nhà</label>
                              <div class="col-md-6">
                                  <input type="text" id="visitTeam" class="form-control" name="visitTeam" value="{{ $item->visitTeam }}">
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="matchResult" class="col-md-4 col-form-label text-md-right">Dự  đoán</label>
                              <div class="col-md-6">
                                  <input type="text" id="matchResult" class="form-control" name="matchResult" value="{{ $item->matchResult }}">
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="result1" class="col-md-4 col-form-label text-md-right">Kết quả (Hiệp 1)</label>
                              <div class="col-md-6">
                                  <input type="text" id="result1" class="form-control" name="result1" value="{{ $item->result1 }}">
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="recPercent" class="col-md-4 col-form-label text-md-right">Xác suất thắng (%)</label>
                              <div class="col-md-6">
                                  <input type="number" id="recPercent" class="form-control" name="recPercent" value="{{ $item->recPercent }}">
                              </div>
                            </div>

                            <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                  <div class="checkbox">
                                      <label>
                                          <input type="checkbox" name="isOk" {{ $item->isOk ? 'checked="checked"' : '' }}" > Trận đấu đã kết thúc
                                      </label>
                                  </div>
                              </div>
                            </div>
  
                            <div class="col-md-6 offset-md-4">
                               <button type="submit" class="btn btn-primary">
                                  Cập nhật
                               </button>
                               <a class="btn btn-secondary ml-4" href="{{ route('dashboard') }}" role="button">Về trang danh sách</a>
                            </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    
</script>
@endsection

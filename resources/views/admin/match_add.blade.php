@extends('admin.layout')
  
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h5>{{ __('Thêm trận đấu') }} </h5></div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('match_add.post') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                    <div class="row">
                       <div class="col-md-12 text-center mb-3">
                         <button type="submit" class="btn btn-primary btn-submit">
                                Cập nhật
                             </button>
                          <a class="btn btn-secondary ml-4" href="{{ route('dashboard') }}" role="button">Về trang danh sách</a>
                       </div>
                    </div>                          
                      <div class="row">
                          <div class="col-md-6">
                              <h6>Thông tin cơ bản</h6>
                              <div class="form-group row">
                                  <label for="tournamentId" class="col-md-4 col-form-label text-md-right">Giải đấu</label>
                                  <div class="col-md-6">
                                      <select class="form-control" name="tournamentId" id="tournamentId">
                                        @foreach($tours as $tour) 
                                        <option value="{{ $tour->id }}">{{ !empty($tour->tour_name_edit) ? $tour->tour_name_edit : $tour->tour_name }}</option> 
                                        @endforeach
                                      </select>
                                  </div>    
                                </div>
                              <div class="form-rgoup row mb-4">
                                <label for="matchDate" class="col-md-4 col-form-label text-md-right">Ngày giờ</label>
                                <div class="col-md-4">
                                    <input type="text" id="matchDate" class="form-control" name="matchDate" value=" {{ date('Y-m-d') }}">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" id="matchTime" class="form-control" name="matchTime" value="">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="rowNo" class="col-md-4 col-form-label text-md-right">Thứ tự</label>
                                <div class="col-md-6">
                                    <input type="text" id="rowNo" class="form-control" name="rowNo" value="">
                                </div>
                              </div>
    
                              <div class="form-group row">
                                <label for="homeTeam" class="col-md-4 col-form-label text-md-right">Tên đội nhà</label>
                                <div class="col-md-6">
                                    <input type="text" id="homeTeam" class="form-control" name="homeTeam" value="">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="homeTeam" class="col-md-4 col-form-label text-md-right">Logo đội nhà</label>
                                <div class="col-md-6">
                                    <input type="file" name="homeLogo" accept="image/*" class="form-control" id="homeLogo">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="visitTeam" class="col-md-4 col-form-label text-md-right">Tên đội khách</label>
                                <div class="col-md-6">
                                    <input type="text" id="visitTeam" class="form-control" name="visitTeam" value="">
                                </div>
                              </div>

                               <div class="form-group row">
                                <label for="homeTeam" class="col-md-4 col-form-label text-md-right">Logo đội khách</label>
                                <div class="col-md-6">
                                    <input type="file" name="visitLogo"  accept="image/*" class="form-control" id="visitLogo">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="matchResult" class="col-md-4 col-form-label text-md-right">Dự  đoán</label>
                                <div class="col-md-6">
                                    <input type="text" id="matchResult" class="form-control" name="matchResult" value="">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="result1" class="col-md-4 col-form-label text-md-right">Kết quả (Hiệp 1)</label>
                                <div class="col-md-6">
                                    <input type="text" id="result1" class="form-control" name="result1" value="">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="recPercent" class="col-md-4 col-form-label text-md-right">Xác suất thắng (%)</label>
                                <div class="col-md-6">
                                    <input type="number" id="recPercent" class="form-control" name="recPercent" value="">
                                </div>
                              </div>

                              <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="isOk"> Trận đấu đã kết thúc
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="isTheo"> Trận nên theo
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked name="isShow"> Hiển thị lên web
                                        </label>
                                    </div>
                                </div>
                              </div>                             
                         </div>
                        <div class="col-md-6">
                          <h6>Thành tích đối đầu</h6>
                          <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Đối đầu trực tiếp</label>
                            <div class="col-md-6">
                                <input type="text" id="type" class="form-control" name="type" value="">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="matchCount" class="col-md-4 col-form-label text-md-right">Chủ nhà</label>
                            <div class="col-md-6">
                                <input type="text" id="matchCount" class="form-control" name="matchCount" value="">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="victCount" class="col-md-4 col-form-label text-md-right">Chủ nhà sân nhà</label>
                            <div class="col-md-6">
                                <input type="text" id="victCount" class="form-control" name="victCount" value="">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="tieCount" class="col-md-4 col-form-label text-md-right">Đội khách</label>
                            <div class="col-md-6">
                                <input type="text" id="tieCount" class="form-control" name="tieCount" value="">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="failCount" class="col-md-4 col-form-label text-md-right">Đội khách sân khách</label>
                            <div class="col-md-6">
                                <input type="text" id="failCount" class="form-control" name="failCount" value="">
                            </div>
                          </div>

                          <h6>Thống kê</h6>
                          <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Tấn công</label>
                            <div class="col-md-3">
                                <input type="number" id="attack_home_1" class="form-control" name="attack_home_1" value="0">
                            </div>
                             <div class="col-md-3">
                                <input type="number" id="attack_visit_1" class="form-control" name="attack_visit_1" value="0">
                            </div>
                          </div>

                         <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Tấn công nguy hiểm</label>
                            <div class="col-md-3">
                                <input type="number" id="attack_home_2" class="form-control" name="attack_home_2" value="0">
                            </div>
                             <div class="col-md-3">
                                <input type="number" id="attack_visit_2" class="form-control" name="attack_visit_2" value="0">
                            </div>
                          </div>

                         <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Số lần sút</label>
                            <div class="col-md-3">
                                <input type="number" id="shot_home_1" class="form-control" name="shot_home_1" value="0">
                            </div>
                             <div class="col-md-3">
                                <input type="number" id="shot_visit_1" class="form-control" name="shot_visit_1" value="0">
                            </div>
                          </div>

                         <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Sút trúng mục tiêu</label>
                            <div class="col-md-3">
                                <input type="number" id="shot_home_2" class="form-control" name="shot_home_2" value="0">
                            </div>
                             <div class="col-md-3">
                                <input type="number" id="shot_visit_2" class="form-control" name="shot_visit_2" value="0">
                            </div>
                          </div>

                         <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Kiểm soát bóng</label>
                            <div class="col-md-3">
                                <input type="number" id="kiem_soat_bong_home" class="form-control" name="kiem_soat_bong_home" value="0">
                            </div>
                             <div class="col-md-3">
                                <input type="number" id="kiem_soat_bong_visit" class="form-control" name="kiem_soat_bong_visit" value="0">
                            </div>
                          </div>
						  
						  <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Phạt góc</label>
                            <div class="col-md-3">
                                <input type="number" id="phat_goc_home" class="form-control" name="phat_goc_home" value="0">
                            </div>
                             <div class="col-md-3">
                                <input type="number" id="phat_goc_visit" class="form-control" name="phat_goc_visit" value="0">
                            </div>
                          </div>

                          <h6>Tỷ lệ cược trực tiếp</h6>
                          <div class="form-group row">
                            <label for="victCount2" class="col-md-4 col-form-label text-md-right">Thắng</label>
                            <div class="col-md-6">
                                <input type="text" id="victCount2" class="form-control" name="victCount2" value="">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="tieCount2" class="col-md-4 col-form-label text-md-right">Hoà</label>
                            <div class="col-md-6">
                                <input type="text" id="tieCount2" class="form-control" name="tieCount2" value="">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="failCount2" class="col-md-4 col-form-label text-md-right">Thua</label>
                            <div class="col-md-6">
                                <input type="text" id="failCount2" class="form-control" name="failCount2" value="">
                            </div>
                          </div>                          
                        </div>
                        <div class="col-md-6">
                          <h6>Xác suất tỷ lệ (biểu đồ tròn)</h6>
                          <div class="form-group row">
                            <label for="bilvList1" class="col-md-4 col-form-label text-md-right">Thắng</label>
                            <div class="col-md-6">
                                <input type="text" id="bilvList1" class="form-control" name="bilvList1" value="">                                
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="bilvList1" class="col-md-4 col-form-label text-md-right">Lý do thắng</label>
                            <div class="col-md-6">                               
                                <textarea name="winReason" class="form-control" style="width: 100%;height: 120px;resize: none;text-align: left;"></textarea>
                            </div>
                          </div>                          
                          <div class="form-group row">
                            <label for="bilvList2" class="col-md-4 col-form-label text-md-right">Hoà</label>
                            <div class="col-md-6">
                                <input type="text" id="bilvList2" class="form-control" name="bilvList2" value="">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="bilvList1" class="col-md-4 col-form-label text-md-right">Lý do hoà</label>
                            <div class="col-md-6">                               
                                <textarea name="drawReason" class="form-control" style="width: 100%;height: 120px;resize: none;text-align: left;"></textarea>
                            </div>
                          </div>                          
                          <div class="form-group row">
                            <label for="bilvList3" class="col-md-4 col-form-label text-md-right">Thua</label>
                            <div class="col-md-6">
                                <input type="text" id="bilvList3" class="form-control" name="bilvList3" value="">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="bilvList1" class="col-md-4 col-form-label text-md-right">Lý do thua</label>
                            <div class="col-md-6">                               
                                <textarea name="loseReason" class="form-control" style="width: 100%;height: 120px;resize: none;text-align: left;"></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <h6>Dự đoán trận đấu</h6>
                          <div class="form-group row">
                            <label for="winner" class="col-md-4 col-form-label text-md-right">Cả trận</label>
                            <div class="col-md-6">
                                <input type="text" id="winner" class="form-control" name="winner" value="">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="halfWholeResult" class="col-md-4 col-form-label text-md-right">Hiệp 1</label>
                            <div class="col-md-6">
                                <input type="text" id="halfWholeResult" class="form-control" name="halfWholeResult" value="">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="scoreResult" class="col-md-4 col-form-label text-md-right">Tỷ số</label>
                            <div class="col-md-6">
                                <input type="text" id="scoreResult" class="form-control" name="scoreResult" value="">
                            </div>
                          </div>
                          <h6>Ghi chú quan trọng</h6>
                          <div class="form-group row">
                            <div class="col-md-10 col-form-label">                               
                                <textarea name="keyNote" class="form-control" style="width: 100%;height: 200px;resize: none;text-align: left;"></textarea>
                            </div>
                          </div>                          
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-md-12 text-center mt-2">
                         <button type="submit" class="btn btn-primary btn-submit">
                                Cập nhật
                             </button>
                          <a class="btn btn-secondary ml-4" href="{{ route('dashboard') }}" role="button">Về trang danh sách</a>
                       </div>
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

@extends('layout.layout')

@section('content')
        <div class="main-content">
            <!-- 主题内容数据-->	
            <div class="container">
                <div class="col-md-4 col-xl-4 column" style="padding:0px; background-color:#146a16;">
                    <div class="panel panel-default onlyPC" style="padding-top:1px;margin-bottom: 0px;">
                        <div class="panel-body" style="background-color:#146a16;">
                            <div class="leftMenu">
                                <ul>
                                    <li><a class="text-animation" target="_blank" href="https://zalo.me/0378304587">Chuyên gia cho kèo</a></li>
                                    <li><a class="text-animation" target="_blank"  href="https://onbet3.com/?inviteCode=8oncom">Đăng ký VIP</a></li>
                                </ul>
                                
                            </div>
                        </div>
                    </div>                     
                    <div class="panel panel-default onlyPC">
                        <div class="panel-body" style="background-color:#292d34;padding:0px;">
                            <section class="slider">
                                <div class="flexslider">
                                    <ul class="slides">
                                        <li>
                                            <img src="{{ asset('assets/images/pic0.jpg') }}" class="img-responsive" alt="" />
                                        </li>
                                    </ul>
                                </div>
                            </section>
                            <!-- FlexSlider -->
                            <script defer src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>
                            <link rel="stylesheet" href="{{ asset('assets/css/flexslider.css') }}" type="text/css" media="screen" />
                            <script type="text/javascript">
                                
                                $(window).load(function(){
                                  $('.flexslider').flexslider({
                                		animation: "slide",
                                		start: function(slider){
                                		  $('body').removeClass('loading');
                                		}
                                  });
                                });
                                function jumpdown(){
                                	if(navigator.userAgent.match(/(iPhone|iPod|ios)/i)){
                                		// window.location.href = "http://itunes.apple.com/us/app/id1435748364";								
                                	}else{
                                		// window.location.href = "/zcj/otherpage/erwmt";
                                	}	
                                }
                            </script>
                        </div>
                    </div>                   
                    <div class="panel panel-default" style="margin-top:10px;padding:0px;">
                        <div class="panel-heading" >
                            <span>ĐỀ XUẤT KÈO ỔN ĐỊNH</span>
                        </div>
                        <div class="panel-body" style="background-color:#146a16;padding:0px;font-size:8pt;">
                            <div class="subList" id="wdtjList"></div>
                        </div>
                    </div>
                    <div class="panel panel-default onlySP" style="margin-top:0px;padding:0px;">
                        <div class="panel-body" style="background-color:#146a16;padding:0px;font-size:8pt;">
                            <a href="https://onbet3.com/?inviteCode=8oncom" target="_blank"> 
                               <img style="width: 100%" src="{{ asset('assets/images/banner_adv.png') }}">
                            </a>
                        </div>
                    </div>
                    <div class="panel panel-default" style="margin-top:-18px;padding:0px;" >
                        <div class="panel-heading" >
                            <span id="sdTile">TRẬN KÈO NÊN THEO</span>
                        </div>
                        <div class="panel-body" style="background-color:#146a16;padding:0px;">
                            <div class="subList" id="sdtjList"></div>
                        </div>
                    </div>
                    <div class="panel panel-default onlySP" style="padding-top:1px;margin-bottom: 0px;">
                        <div class="panel-body" style="background-color:#146a16;">
                            <div class="leftMenu">
                                <ul>
                                    <li><a class="text-animation" target="_blank" href="https://zalo.me/0378304587">Chuyên gia cho kèo</a></li>
                                    <li><a class="text-animation" target="_blank"  href="https://onbet3.com/?inviteCode=8oncom">Đăng ký VIP</a></li>
                                </ul>                                
                            </div>
                        </div>
                    </div>                                
                    <div class="panel panel-default" style="padding-top:1px;margin-bottom: 0px;">
                        <div class="panel-body" style="background-color:#146a16;padding:20px;">
                            <div style="text-align: center;font-size: 20px;">Nhà cái uy tín được tổng bộ chỉ định : <a href="http://onbet.com" target="_blank">onbet.com</a></div>
                        
                        </div>
                    </div>

                    <div class="panel panel-default onlySP">
                        <div class="panel-body" style="background-color:#292d34;padding:0px;">
                            <section class="slider">
                                <div class="flexslider">
                                    <ul class="slides">
                                        <li>
                                            <img src="{{ asset('assets/images/pic0.jpg') }}" class="img-responsive" alt="" />
                                        </li>
                                    </ul>
                                </div>
                            </section>
                            <!-- FlexSlider -->
                            <script defer src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>
                            <link rel="stylesheet" href="{{ asset('assets/css/flexslider.css') }}" type="text/css" media="screen" />
                            <script type="text/javascript">
                                
                                $(window).load(function(){
                                  $('.flexslider').flexslider({
                                        animation: "slide",
                                        start: function(slider){
                                          $('body').removeClass('loading');
                                        }
                                  });
                                });
                                function jumpdown(){
                                    if(navigator.userAgent.match(/(iPhone|iPod|ios)/i)){
                                        // window.location.href = "http://itunes.apple.com/us/app/id1435748364";                                
                                    }else{
                                        // window.location.href = "/zcj/otherpage/erwmt";
                                    }   
                                }
                            </script>
                        </div>
                    </div>                    
                </div>
                <div class="col-md-8  col-xl-8 column" style="padding:0px;">
                    <!--本场比赛预测-->
                    <div class="panel panel-default" style="padding-top: 0px">
                        <div class="panel-body" style="padding:0px;" >
                            <!-- 底下内容页 -->
                            <div class="tab">
                                <ul id="myTab" class="nav nav-tabs" style="background-color:#146a16;padding:0px;">
                                    <li  class="active" onclick="getQbList();">
                                        <a href="#allTab" data-toggle="tab">
                                            <p>Tất cả</p>
                                        </a>
                                    </li>
                                    <li  onclick="getWendanList();">
                                        <a href="#wendanTab" data-toggle="tab">
                                            <p>Kèo ổn định</p>
                                        </a>
                                    </li>
                                    <li  onclick="getbifenList();">
                                        <a href="#bifenTab" data-toggle="tab">
                                            <p>Tỷ số</p>
                                        </a>
                                    </li>
                                    <li onclick="getbgcList();" >
                                        <a href="#banquanchangTab" data-toggle="tab">
                                            <p>Hiệp 1</p>
                                        </a>
                                    </li>
                                    <li  onclick="getSaikuangList();">
                                        <a href="#saikuangTab" data-toggle="tab">
                                            <p>Trực tiếp</p>
                                        </a>
                                    </li>
                                    <li  onclick="getShidanList();">
                                        <a href="#shidanTab" data-toggle="tab">
                                            <p>Thời gian</p>
                                        </a>
                                    </li>
                                  
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div class="tab-pane fade in active" id="allTab" >
                                        <div class="listTitle">
                                            <div class="col-xs-2"><span>Thứ tự</span></div>
                                            <div class="col-xs-1"><span>Thời gian</span></div>
                                            <div class="col-xs-3"><span>Đội vs Đội</span></div>
                                            <div class="col-xs-2"><span>Dự đoán</span></div>
                                            <div class="col-xs-1"><span>Kết quả</span></div>
                                            <div class="col-xs-2"><span>Xác xuất</span></div>
                                            <div class="col-xs-1"><span>Phân tích</span></div>
                                        </div>
                                        <div class="tabList" id="allList"></div>
                                    </div>
                                    <div class="tab-pane fade" id="banquanchangTab">
                                        <div class="listTitle">
                                            <div class="col-xs-2"><span>Thứ tự</span></div>
                                            <div class="col-xs-3"><span>Đội vs Đội</span></div>
                                            <div class="col-xs-2"><span>Dự đoán</span></div>
                                            <div class="col-xs-1"><span>Kết quả</span></div>
                                            <div class="col-xs-2"><span>Xác xuất</span></div>
                                            <div class="col-xs-1"><span>SP</span></div>
                                            <div class="col-xs-1"><span>Phân tích</span></div>
                                        </div>
                                        <div class="tabList" id="bqcList"></div>
                                    </div>
                                    <div class="tab-pane fade" id="bifenTab" >
                                        <div class="listTitle">
                                            <div class="col-xs-2"><span>Thứ tự</span></div>
                                            <div class="col-xs-3"><span>Đội vs Đội</span></div>
                                            <div class="col-xs-2"><span>Dự đoán</span></div>
                                            <div class="col-xs-1"><span>Kết quả</span></div>
                                            <div class="col-xs-2"><span>Xác xuất</span></div>
                                            <div class="col-xs-1"><span>SP</span></div>
                                            <div class="col-xs-1"><span>Phân tích</span></div>
                                        </div>
                                        <div class="tabList" id="bifenList"></div>
                                    </div>
                                    <div class="tab-pane fade" id="saikuangTab" >
                                        <div class="listTitle">
                                            <div class="col-xs-1"><span>Thứ tự</span></div>
                                            <div class="col-xs-2"><span>Đội vs Đội</span></div>
                                            <div class="col-xs-2"><span>Thời gian thi đấu</span></div>
                                            <div class="col-xs-2"><span>Tỷ số trực tiếp</span></div>
                                            <div class="col-xs-1"><span>Dự đoán</span></div>
                                            <div class="col-xs-1"><span>Xác xuất</span></div>
                                            <div class="col-xs-2"><span>SP</span></div>
                                            <div class="col-xs-1"><span>Phần tích</span></div>
                                        </div>
                                        <div class="tabList" id="saikuangList"></div>
                                    </div>
                                    <div class="tab-pane fade" id="shidanTab" >
                                        <div id ="shidanList"></div>
                                    </div>
                                    <div class="tab-pane fade" id="wendanTab">
                                        <div class="listTitle">
                                            <div class="col-xs-2"><span>Thứ tự</span></div>
                                            <div class="col-xs-3"><span>Đội vs Đội</span></div>
                                            <div class="col-xs-2"><span>Dự đoán</span></div>
                                            <div class="col-xs-1"><span>Kết quả</span></div>
                                            <div class="col-xs-2"><span>Xác xuất</span></div>
                                            <div class="col-xs-1"><span>SP</span></div>
                                            <div class="col-xs-1"><span>Phân tích</span></div>
                                        </div>
                                        <div class="tabList" id="wendanList"></div>
                                    </div>
                                    <div class="tab-pane fade" id="gaopeiTab">
                                        <div class="listTitle">
                                            <div class="col-xs-2"><span>Thứ tự</span></div>
                                            <div class="col-xs-3"><span>>Đội vs Đội</span></div>
                                            <div class="col-xs-2"><span>Dự đoán</span></div>
                                            <div class="col-xs-2"><span>Xác xuất</span></div>
                                            <div class="col-xs-2"><span>SP</span></div>
                                            <div class="col-xs-1"><span>Phân tích</span></div>
                                        </div>
                                        <div class="tabList" id="gaopeiList"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix" sytle="border:solid red 1px;"></div>
                </div>
            </div>
            <script type="text/javascript">
                function godown(){
                 // window.location.href='http://www.zucaijia.com/app/dl/qll51003.apk';
                }
                function godownap(){
                 if(navigator.userAgent.match(/(iPhone|iPod|ios)/i)){
                	// window.location.href = "/zcj/otherpage/downpageGQ?channel=52001";
                }else{
                	// window.location.href = "/zcj/otherpage/erwmt2";
                }	
                }
                   function godownKlzq(){
                       // window.location.href='http://www.zucaijia.com/app/klzq-release-10100.apk';
                   }
                   function godownapKlzq(){
                       if(navigator.userAgent.match(/(iPhone|iPod|ios)/i)){
                           // window.location.href = "/zcj/otherpage/downpageGQ?channel=52001";
                       }else{
                           // window.location.href = "/zcj/otherpage/erwmt2";
                       }
                   }
            </script>
        </div>





@endsection

@push('js')
        <script type="text/javascript" src="{{ asset('assets/js/perfect-scrollbar.with-mousewheel.min.js')}} "></script>
        <script type="text/javascript">

        	const rsData = [];
			rsData['胜']= "Thắng";
			rsData['负']= "Thua";
			rsData['胜胜']= "Thắng";
			rsData['平负、平胜']= "Thắng 1/2";
			rsData['负']= "Thua";

            $(document).ready(function() {
            
                   /*获取实单推荐List*/
                   getSdtjList();
                   
                   /*获取稳胆推荐list*/
                   getWdtjList();
                   
                   /*获取全部比赛*/
                   getQbList();
                   
            });
            
            /*左侧-实单推荐列表*/
            function getSdtjList(){
            	
            	$.ajax({
                        type  : "GET",
                        url: "/getSdtjList",
                        error : function(request) {
	                       	allList='<div class="errorPanel" style="height:250px;line-height:250px;"><span>Tải dữ liệu không thành công, vui lòng làm mới và thử lại sau...<span></div>';
	                       	$("#sdtjList").html(allList);
	                          },
                          beforeSend:function() {  
                          	$("#sdtjList").html(loadingMsg);
                          },
                       	success : function(rs) {
                       		//设置实单标题
                       		//rs = JSON.parse(rs);
                       		var allOrder ="";
                       		if(rs.rows.length > 0){
                       			var oneOrder ="";
                       			for(var m = 0; m < rs.rows.length && m < 2 ; m++){
                        			oneOrder += '<div class="listTitle" style="font-size:10pt;height:48px; line-height:40px;"> ';
                        			oneOrder += '<div class="row" style="margin-top:5px;">';
                        			oneOrder +='<div class="col-xs-2" style="padding:0px;">';
                        			oneOrder += '<font color="#FF910C">Thứ tự '+rs.rows[m].orderNo + ':</font>';
                        			oneOrder += '</div>';
                        			oneOrder += '<div class="col-xs-10">';
                        			
            					oneOrder += '<div class="row" style="height:20px; line-height:20px;">';
            					//是否是VIP
                        			if(rs.rows[m].orderDesc != 'NM' ){
                        				oneOrder += '<p class="pull-left"><font color="#FF910C">'+ rs.rows[m].orderDesc+'&nbsp;&nbsp;&nbsp;</font></p>';
                        			}
                        			oneOrder += '<p class="pull-left"><font color="#7ECF0D">' + rs.rows[m].mode+'</font></p>';
                        			if(parseInt(rs.rows[m].statusType) == 0 ){
                        				oneOrder += '<p class="pull-right">'+rs.rows[m].matchStatus+'&nbsp;&nbsp;</p>';
                        			}else if(parseFloat(rs.rows[m].statusType) == 1 ){
                        				oneOrder += '<p class="pull-right"><font color="#6B9E29" >'+rs.rows[m].matchStatus+'&nbsp;&nbsp;</font></p>';
                        			}else{
                        				oneOrder += '<p class="pull-right"><font color="red" >'+rs.rows[m].matchStatus+'&nbsp;&nbsp;</font></p>';
                        			}
                        			oneOrder += '</div>';
                        			
            					oneOrder += '<div class="row" style="height:20px; line-height:20px;">';
            					oneOrder += '<p class="pull-left">Cược '+rs.rows[m].money+' thắng '　+　rs.rows[m].maxWinMoney　+　'</p>';
            					oneOrder += '<p class="pull-right"><font color="red">'+rs.rows[m].maxWinTimes+'</font>&nbsp;lần&nbsp;&nbsp;</p>';
                        			oneOrder += '</div>';
                        			
                        			oneOrder += '</div>';
                        			
                        			oneOrder += '</div>';
                        			oneOrder += '</div>';
              					
                        			var matchList ='<div class="subList" id=""  style="font-size:8pt;">';
                        			for(var i = 0; i < rs.rows[m].matchList.length; i++){
                        				
                        				var oneItem ="";
                        				if("完" == rs.rows[m].matchList[i].matchLong){
                        					oneItem +='<div class="subItem" style="height:50px;color:#969799;">';
                        				}else{
                        					oneItem +='<div class="subItem" style="height:50px;">';
                        				}
                        				oneItem +='<div class="detail pull-left">';
                    					oneItem +='<div class="col-xs-3"><span>'+rs.rows[m].matchList[i].typeName +'</span><br/><span>'+replaceText(rs.rows[m].matchList[i].rowNo) +'</span></div>';
                 						oneItem +='<div class="col-xs-5 item"><span>'+rs.rows[m].matchList[i].homeTeam +'</span>&nbsp;&nbsp;<span>VS</span>&nbsp;&nbsp;<span>'+rs.rows[m].matchList[i].visitTeam +'</span></div>';
                 						if(parseInt(rs.rows[m].matchList[i].isOk) == 1){
                 							if("未" == rs.rows[m].matchList[i].matchLong){
                 								oneItem +='<div class="col-xs-3 item"><span >'+rs.rows[m].matchList[i].matchResult +'</span></div>';
                 							}else{
                 								oneItem +='<div class="col-xs-3"><span style="color:red">'+rs.rows[m].matchList[i].matchResult +'</span><br/><span>'+rs.rows[m].matchList[i].result1 +'</span></div>';
               	      					}
                 							//是否是胆
                  						if(rs.rows[m].matchList[i].fixedNam != ""){
                  							oneItem +='<div><span style="line-height:40px;color:red;margin-right:10px;">√&nbsp;<font style="color:#7ECF0D">'+rs.rows[m].matchList[i].fixedNam +'</font>&nbsp;</span></div>';
                  						}else{
                  							oneItem +='<div><span style="line-height:40px;color:red;margin-right:12px;">√</span></div>';
                  						}
            
                 						}else{
                 							if("未" == rs.rows[m].matchList[i].matchLong){
                 								oneItem +='<div class="col-xs-3 item"><span >'+rs.rows[m].matchList[i].matchResult +'</span></div>';
                 							}else{
                 								oneItem +='<div class="col-xs-3"><span >'+rs.rows[m].matchList[i].matchResult +'</span><br/><span>'+rs.rows[m].matchList[i].result1 +'</span></div>';
                 							}
                 							//是否是胆
                  						if(rs.rows[m].matchList[i].fixedNam != ""){
                  							oneItem +='<div><span style="line-height:40px;color:#7ECF0D;margin-right:10px;">'+rs.rows[m].matchList[i].fixedNam +'</span></div>';
                  						}else{
                  							oneItem +='<div><span style="line-height:30px;margin-right:10px;">'+rs.rows[m].matchList[i].matchLong+'&nbsp;</span></div>';
                  						}
                 						}
            
                 						oneItem +='</div>';
                 						oneItem +='<div class="goto pull-right" >';
                 						oneItem +='<a class="item" href="/detail?id='+rs.rows[m].matchList[i].matchId +'"><span>Chi tiết</span></a>';
                 						oneItem +='</div>';
                 						oneItem +='</div>';
                 						matchList = matchList + oneItem;
                        			}
                        			matchList +="</div>";
                        			
                        			
                        			
                        			oneOrder = oneOrder + matchList;
                       			}
                       			allOrder = allOrder + oneOrder;
                       		}else{
                       			allOrder='<div class="errorPanel" style="height:250px;padding-top:80px;"><div style="height:80px;line-height:30px;font-size: 15px">Kèo chỉ mang tính chất tham khảo <br/>Để tư vấn chuyên sâu vui lòng liên hệ chuyên gia qua  telegram : @khuyenmai24h7 <br/><a href="https://t.me/khuyenmai24h7" target="_blank">(https://t.me/khuyenmai24h7)</a></div></div>';
                       		}
                       		$("#sdtjList").html(allOrder);
                       		
                       	}
                   	});
            }
            
            /*左侧-稳场推荐列表*/
            function getWdtjList(){
            	
            	$.ajax({
                        type  : "GET",
                        url: "/getWdList",
                        error : function(request) {
                       	var errMsg ='<div class="no-data-msg"><p>Tải dữ liệu không thành công...</p></div>';
                       	$("#wdtjList").html(errMsg);
                          },
                        beforeSend:function() {  
                          	$("#wdtjList").html(loadingMsg);
                          },
                       	success : function(rs) {
                       		//rs = JSON.parse(rs);
                       		var allList ="";
                       		if(rs.rows.length > 0){
                       			for(var m = 0; m < rs.rows.length & m < 1; m++){
                        			for(var i = 0; i < rs.rows[m].matchList.length && i < 5; i++){
                          				var oneItem ="";
                          				if("完" == rs.rows[m].matchList[i].matchLong){
                        					oneItem +='<div class="subItem" style="height:50px;color:#969799;">';
                        				}else{
                        					oneItem +='<div class="subItem" style="height:50px;">';
                        				}
                        				
                        				oneItem +='<div class="detail pull-left">';
                    					oneItem +='<div class="col-xs-3"><span>'+rs.rows[m].matchList[i].typeName+'</span><br/><span>'+replaceText(rs.rows[m].matchList[i].rowNo) +'</span></div>';
                 						oneItem +='<div class="col-xs-5 item"><span>'+rs.rows[m].matchList[i].homeTeam +'</span>&nbsp;&nbsp;<span>VS</span>&nbsp;&nbsp;<span>'+rs.rows[m].matchList[i].visitTeam +'</span></div>';
                 						//oneItem +='<div class="col-xs-3"><span style="color:red">'+rs.rows[m].matchList[i].matchResult +'</span><br/><span>'+rs.rows[m].matchList[i].recPercent +'</span></div>';
                 						
                 						if(parseInt(rs.rows[m].matchList[i].isOk) == 1){
                 							
                 							if("未" == rs.rows[m].matchList[i].matchLong){
                 								oneItem +='<div class="col-xs-2 item"><span >'+rsData[rs.rows[m].matchList[i].matchResult] +'</span></div>';
                 							}else{
                 								oneItem +='<div class="col-xs-2"><span style="color:red">'+rsData[rs.rows[m].matchList[i].matchResult] +'</span><br/><span>'+rs.rows[m].matchList[i].result1 +'</span></div>';
               	      					}
                 							
                 							//oneItem +='<div class="col-xs-3"><span style="color:red">'+rs.rows[m].matchList[i].matchResult +'</span><br/><span>'+rs.rows[m].matchList[i].recPercent +'</span></div>';
                 							oneItem +='<div><span style="line-height:30px;color:red;margin-right:10px;">√&nbsp;</span></div>';
                 						}else{
                 							
                 							if("未" == rs.rows[m].matchList[i].matchLong){
                 								oneItem +='<div class="col-xs-2 item"><span >'+rsData[rs.rows[m].matchList[i].matchResult] +'</span></div>';
                 							}else{
                 								oneItem +='<div class="col-xs-2"><span >'+rsData[rs.rows[m].matchList[i].matchResult] +'</span><br/><span>'+rs.rows[m].matchList[i].result1 +'</span></div>';
                 							}
                 							oneItem +='<div><span style="line-height:30px;margin-right:10px;">Chưa có</span></div>';
                 							//oneItem +='<div class="col-xs-3"><span >'+rs.rows[m].matchList[i].matchResult +'</span><br/><span>'+rs.rows[m].matchList[i].recPercent +'</span></div>';
                 						}
            
                 						oneItem +='</div>';
                 						oneItem +='<div class="goto pull-right" >';
                 						oneItem +='<a class="item" href="/detail?id='+rs.rows[m].matchList[i].matchId +'"><span>Chi tiết</span></a>&nbsp;&nbsp;';
                 						oneItem +='</div>';
                 						oneItem +='</div>';
            		     			allList = allList + oneItem;
                        			}
                       			}
                       		}
                       		$("#wdtjList").html(allList);
                       	}
                   	});
            }
            
            
            /*右侧-获取半全场列表*/
            function getbgcList(){
                $.ajax({
                        type  : "GET",
                        url: "/getBgcList",                     
                        error : function(request) {
                        	var errMsg ='<div class="no-data-msg"><p>数据加载失败...</p></div>';
                        	$("#bqcList").html(errMsg);
                           },
                           beforeSend:function() {  
                           	$("#bqcList").html(loadingMsg);
                           },
                        	success : function(rs) {
                                //rs = JSON.parse(rs);
                        		var allList ="<div class='content'>";
                        		if(rs.rows.length > 0){
                        			for(var m = 0; m < rs.rows.length; m++){
                        				for(var i = 0; i < rs.rows[m].matchList.length; i++){
                         				var oneItem ="";
                         				if("完" == rs.rows[m].matchList[i].matchLong){
                         					oneItem +='<div class="subItem" style="color:#969799;">';
                         				}else{
                         					oneItem +='<div class="subItem">';
                         				}
                         				
                        					oneItem +='<div class="col-xs-2"><span>'+ replaceText(rs.rows[m].matchList[i].rowNo) +'</span></div>';
                     						oneItem +='<div class="col-xs-3"><span>'+rs.rows[m].matchList[i].homeTeam +'</span>&nbsp;&nbsp;<span>VS</span>&nbsp;&nbsp;<span>'+rs.rows[m].matchList[i].visitTeam +'</span></div>';
                     						//是否预测中
                     						if(parseInt(rs.rows[m].matchList[i].isOk) == 1){
                     							oneItem +='<div class="col-xs-2" style="color:red;">'+ rs.rows[m].matchList[i].matchResult+'&nbsp;&nbsp;<span>√</span></div>';
                     						}else{
                     							oneItem +='<div class="col-xs-2">'+rs.rows[m].matchList[i].matchResult+'</div>';
                     						}
                     						if("未" == rs.rows[m].matchList[i].matchLong){
                     							oneItem +='<div class="col-xs-1"><span>Chưa có</span></div>';
                     						}else{
                     							oneItem +='<div class="col-xs-1"><span>'+rs.rows[m].matchList[i].result1 +'</span></div>';
                     						}
                     						
                     						oneItem +='<div class="col-xs-2"><span>'+rs.rows[m].matchList[i].recPercent +'</span></div>';
                     						oneItem +='<div class="col-xs-1"><span>'+rs.rows[m].matchList[i].betRate +'</span></div>';
                     						oneItem +='<div class="col-xs-1"><a class="item" href="/detail?id='+rs.rows[m].matchList[i].matchId +'"><span>Chi tiết</span></a></div>';
                     						oneItem +='</div>';
            			     			allList = allList + oneItem;
                         			}
                        			}
                        		}
                        		$("#bqcList").html(allList+"</div>");
                        	}
                    });
            	
            }
            
            
            /*获取比分列表*/
            function getbifenList(){
                $.ajax({
                        type  : "GET",
                        url: "/getBifenList",                     
                        error : function(request) {
                        	var errMsg ='<div class="no-data-msg"><p>Tải dữ liệu không thành công...</p></div>';
                        	$("#bifenList").html(errMsg);
                           },
                           beforeSend:function() {  
                           	$("#bifenList").html(loadingMsg);
                           },
                        	success : function(rs) {
                                //rs = JSON.parse(rs);
                        		var allList ="";
                        		if(rs.rows.length > 0){
                        			for(var i = 0; i < rs.rows.length; i++){
                        				var oneItem ="";
                        				if("完" == rs.rows[i].matchLong){
                        					oneItem +='<div class="subItem" style="color:#969799;">';
                        				}else{
                        					oneItem +='<div class="subItem">';
                        				}
                       					oneItem +='<div class="col-xs-2"><span>'+replaceText(rs.rows[i].rowNo) +'</span></div>';
                    						oneItem +='<div class="col-xs-3"><span>'+rs.rows[i].homeTeam +'</span>&nbsp;&nbsp;<span>VS</span>&nbsp;&nbsp;<span>'+rs.rows[i].visitTeam +'</span></div>';
                    						//是否预测中
                    						if(parseInt(rs.rows[i].isOk) == 1){
                    							oneItem +='<div class="col-xs-2" style="color:red;"><span>'+rsData[rs.rows[i].matchResult]+'</span>&nbsp;&nbsp;<span>√</span></div>';
                    						}else{
                    							oneItem +='<div class="col-xs-2"><span>'+rsData[rs.rows[i].matchResult]+'</span></div>';
                    						}
                    						
                    						if("未" == rs.rows[i].matchLong){
                    							oneItem +='<div class="col-xs-1"><span>Chưa có</span></div>';
                    						}else{
                    							oneItem +='<div class="col-xs-1"><span>'+rs.rows[i].result1 +'</span></div>';
                    						}
                    						oneItem +='<div class="col-xs-2"><span>'+rs.rows[i].recPercent +'</span></div>';
                    						oneItem +='<div class="col-xs-1"><span>'+rs.rows[i].betRate +'</span></div>';
                    						oneItem +='<div class="col-xs-1"><a class="item" href="/detail?id='+rs.rows[i].matchId +'"><span>Chi tiết</span></a></div>';
                    						oneItem +='</div>';
            		     			allList = allList + oneItem;
                        			}
                        		}
                        		$("#bifenList").html(allList);
                        	}
                    });
            	
            }

            function replaceText(text){
            	text = text.replace('周一', 'Thứ hai');
            	text = text.replace('周二', 'Thứ ba');
            	text = text.replace('周三', 'Thứ tư');
            	text = text.replace('周四', 'Thứ năm');
            	text = text.replace('周五', 'Thứ sáu');
            	text = text.replace('周六', 'Thứ bảy');
            	text = text.replace('周日', 'Chủ nhật');
                return text;
            }
            
            
            /*获取全部比分列表*/
            function getQbList(){
            
                $.ajax({
                        type  : "GET",
                        url: "/getAllMatchList",
                        error : function(request) {
                        	var errMsg ='<div class="no-data-msg"><p>Tải dữ liệu không thành công...</p></div>';
                        	$("#allList").html(errMsg);
                           },
                           beforeSend:function() {
                           	$("#allList").html(loadingMsg);
                           },
                        	success : function(rs) {
                                //rs = JSON.parse(rs);
                        		var allList ="";
                        		if(rs.rows.length > 0){
                        			for(var i = 0; i < rs.rows.length; i++){
                        				var oneItem ="";
                        				if("未" == rs.rows[i].matchLong){
                        					
                    		             	oneItem +='<div class="subItem" style="background-color:#3d4147;">';
                        					oneItem +='<div class="col-xs-2"></span>&nbsp;&nbsp;<span>'+ replaceText(rs.rows[i].rowNo) +'</span></div>';
                        					oneItem +='<div class="col-xs-1"><span>'+rs.rows[i].matchTime +'</span></div>';
                        					oneItem +='<div class="col-xs-3"><span>'+rs.rows[i].homeTeam +'</span>&nbsp;&nbsp;<span>VS</span>&nbsp;&nbsp;<span>'+rs.rows[i].visitTeam +'</span></div>';
                     						//是否预测中
                     						if(parseInt(rs.rows[i].isOk) == 1){
                     							oneItem +='<div class="col-xs-2" style="color:red;"><span>'+rsData[rs.rows[i].matchResult]+'</span>&nbsp;&nbsp;<span>√</span></div>';
                     						}else{
                     							oneItem +='<div class="col-xs-2"><span>'+rsData[rs.rows[i].matchResult]+'</span></div>';
                     						}
                     						
                     						oneItem +='<div class="col-xs-1"><span>Chưa có</span></div>';
                     						oneItem +='<div class="col-xs-2"><span>'+rs.rows[i].recPercent +'%</span></div>';
                     						
                     						oneItem +='<div class="col-xs-1"><a class="item" href="/detail?id='+rs.rows[i].matchId +'"><span>Chi tiết</span></a></div>';
                     						oneItem +='</div>';
            			     
                        					
                        				}else if("完" == rs.rows[i].matchLong){
                        					
                         				oneItem +='<div class="subItem" style="background-color:#3d4147;color:#969799;">';
                        					oneItem +='<div class="col-xs-2"></span>&nbsp;&nbsp;<span>'+replaceText(rs.rows[i].rowNo) +'</span></div>';
                        					oneItem +='<div class="col-xs-1"><span>'+rs.rows[i].matchTime +'</span></div>';
                        					oneItem +='<div class="col-xs-3"><span>'+rs.rows[i].homeTeam +'</span>&nbsp;&nbsp;<span>VS</span>&nbsp;&nbsp;<span>'+rs.rows[i].visitTeam +'</span></div>';
                     						//是否预测中
                     						if(parseInt(rs.rows[i].isOk) == 1){
                     							oneItem +='<div class="col-xs-2" style="color:red;"><span>'+rsData[rs.rows[i].matchResult]+'</span>&nbsp;&nbsp;<span>√</span></div>';
                     						}else{
                     							oneItem +='<div class="col-xs-2" style="color:#969799;"><span>'+rsData[rs.rows[i].matchResult]+'</span></div>';
                     						}
                     						
                     						oneItem +='<div class="col-xs-1"><span>'+rs.rows[i].result1 +'</span></div>';
                     						oneItem +='<div class="col-xs-2"><span>'+rs.rows[i].recPercent +'%</span></div>';
                     					
                     						oneItem +='<div class="col-xs-1"><a class="item" href="/detail?id='+rs.rows[i].matchId +'"><span>Chi tiết</span></a></div>';
                     						oneItem +='</div>';
            			     		
                        					
                        				}else{
                         				oneItem +='<div class="subItem">';
                        					oneItem +='<div class="col-xs-2"></span>&nbsp;&nbsp;<span>'+replaceText(rs.rows[i].rowNo) +'</span></div>';
                        					oneItem +='<div class="col-xs-1"><span>'+rs.rows[i].matchTime +'</span></div>';
                        					oneItem +='<div class="col-xs-3"><span>'+rs.rows[i].homeTeam +'</span>&nbsp;&nbsp;<span>VS</span>&nbsp;&nbsp;<span>'+rs.rows[i].visitTeam +'</span></div>';
                     						//是否预测中
                     						if(parseInt(rs.rows[i].isOk) == 1){
                     							oneItem +='<div class="col-xs-2" style="color:red;"><span>'+rsData[rs.rows[i].matchResult]+'</span>&nbsp;&nbsp;<span>√</span></div>';
                     						}else{
                     							oneItem +='<div class="col-xs-2"><span>'+rsData[rs.rows[i].matchResult]+'</span></div>';
                     						}
                     						oneItem +='<div class="col-xs-1"><div style="margin-top:12px;line-height:10px;color:#69AF00;">'+rs.rows[i].matchLong +'</div><div style="margin-top:5px;line-height:10px;">'+rs.rows[i].result1 +'</div></div>';
                     						oneItem +='<div class="col-xs-2"><span>'+rs.rows[i].recPercent +'%</span></div>';
                     						oneItem +='<div class="col-xs-1"><a class="item" href="/detail?id='+rs.rows[i].matchId +'"><span>Chi tiết</span></a></div>';
                     						oneItem +='</div>';
                        				}
                        				
                        				allList = allList + oneItem;
                        			}
                        		}
                        		$("#allList").html(allList);
                        	}
                    });
            	
            }
            
            
            
            /*获取比分列表*/
            function getQcList(){
                $.ajax({
                        type  : "GET",
                        url: "/getQcList",
                        error : function(request) {
                        	var errMsg ='<div class="no-data-msg"><p>Tải dữ liệu không thành công...</p></div>';
                        	$("#allList").html(errMsg);
                           },
                           beforeSend:function() {  
                           	$("#allList").html(loadingMsg);
                           },
                        	success : function(rs) {
                                //rs = JSON.parse(rs);
                        		var allList ="";
                        		if(rs.rows.length > 0){
                        			for(var i = 0; i < rs.rows.length; i++){
                        				var oneItem ="";
                        				if("完" == rs.rows[i].matchLong){
                        					oneItem +='<div class="subItem" style="color:#969799;">';
                        				}else{
                        					oneItem +='<div class="subItem">';
                        				}
                       					oneItem +='<div class="col-xs-2"></span>&nbsp;&nbsp;<span>'+rs.rows[i].rowNo +'</span></div>';
                    						oneItem +='<div class="col-xs-3"><span>'+rs.rows[i].homeTeam +'</span>&nbsp;&nbsp;<span>VS</span>&nbsp;&nbsp;<span>'+rs.rows[i].visitTeam +'</span></div>';
                    						//是否预测中
                    						if(parseInt(rs.rows[i].isOk) == 1){
                    							oneItem +='<div class="col-xs-2" style="color:red;"><span>'+rs.rows[i].matchResult+'</span>&nbsp;&nbsp;<span>√</span></div>';
                    						}else{
                    							oneItem +='<div class="col-xs-2"><span>'+rs.rows[i].matchResult+'</span></div>';
                    						}
                    						if("未" == rs.rows[i].matchLong){
                    							oneItem +='<div class="col-xs-1"><span>'+rs.rows[i].matchLong +'</span></div>';
                    						}else{
                    							oneItem +='<div class="col-xs-1"><span>'+rs.rows[i].result1 +'</span></div>';
                    						}
                    						
                    						oneItem +='<div class="col-xs-2"><span>'+rs.rows[i].recPercent +'</span></div>';
                    						oneItem +='<div class="col-xs-1"><span>'+rs.rows[i].betRate +'</span></div>';
                    						oneItem +='<div class="col-xs-1"><a class="item" href="/detail?id='+rs.rows[i].matchId +'"><span>Chi tiết</span></a></div>';
                    						oneItem +='</div>';
            		     			allList = allList + oneItem;
                        			}
                        		}
                        		$("#allList").html(allList);
                        	}
                    });
            	
            }
            
            
            
            
            /*右侧-赛况数据或*/
            function getSaikuangList(){
            	
            	$.ajax({
                        type  : "GET",
                        url: "/getSaikuangList",                    
                        error : function(request) {
                       	var errMsg ='<div class="no-data-msg"><p>Tải dữ liệu không thành công...</p></div>';
                       	$("#saikuangList").html(errMsg);
                          },
                          beforeSend:function() {  
                          	$("#saikuangList").html(loadingMsg);
                          },
                       	success : function(rs) {
                            //rs = JSON.parse(rs);
                       		var allOrder ="";
                       		if(rs.rows.length > 0){
                       			var allOrder ="";
                       			for(var i = 0; i < rs.rows.length; i++){
                       				var oneItem ="";
                       				oneItem +='<div class="subItem" style="height:60px;line-height:60px;" >';
                       				oneItem +='<div class="col-xs-12">';
                       				oneItem +='<div style="padding-top:5px;height:30px;line-height:30px;">';
                   					oneItem +='<div class="col-xs-1" ></span>&nbsp;&nbsp;<span>'+rs.rows[i].rowNo +'</span></div>';
                   					oneItem +='<div class="col-xs-2" ><span>'+rs.rows[i].homeTeam +'</span>&nbsp;&nbsp;<span>VS</span>&nbsp;&nbsp;<span>'+rs.rows[i].visitTeam +'</span></div>';
                   					oneItem +='<div class="col-xs-2" ><span>'+rs.rows[i].matchTime +'</span></div>';
                						oneItem +='<div class="col-xs-2" ><span>'+rs.rows[i].matchLong+'</span></div>';
                						//是否预测中
                						if(parseInt(rs.rows[i].isOk) == 1){
                							oneItem +='<div class="col-xs-1" style="color:red;"><span>'+rs.rows[i].matchResult+'</span>&nbsp;&nbsp;<span>√</span></div>';
                						}else{
                							oneItem +='<div class="col-xs-1"><span>'+rs.rows[i].matchResult+'</span></div>';
                						}
                						oneItem +='<div class="col-xs-1" ><span>'+rs.rows[i].recPercent +'%</span></div>';
                						oneItem +='<div class="col-xs-2" ><span>'+rs.rows[i].betRate +'</span></div>';
                						oneItem +='<div class="col-xs-1"><a class="item" href="/detail?id='+rs.rows[i].matchId +'"><span>Chi tiết</span></a></div>';
                						oneItem +='</div>';
                						oneItem +='<div style="height:30px;line-height:25px;">';
                						oneItem +='<div class="col-xs-12" style="text-align:left;padding-left:12px;">Mẹo trận đấu:&nbsp;&nbsp<span style="color:#6EB60B;">'+rs.rows[i].matchDesc +'</span></div>';
                						oneItem +='</div>';
                						oneItem +='</div>';
                						allOrder = allOrder + oneItem;
                       			}
                       		}else{
                       			allOrder ='<div class="no-data-msg"><p>Xin lỗi, hiện tại không có trạng thái trận đấu mới nhất, hãy chú ý đến lời nhắc trạng thái trận đấu kịp thời, xin vui lòng chờ đợi ......</p></div>';
              	    		}
                       		$("#saikuangList").html(allOrder);
               		}
                   	});
            	
            	
            	
            
            }
            
            /*右侧-实单TAB页数据*/
            function getShidanList(){
            	
            	$.ajax({
                       type  : "GET",
                       url: "/getSdtjList",                    
                       error : function(request) {
                       	var errMsg ='<div class="no-data-msg"><p>Tải dữ liệu không thành công...</p></div>';
                       	$("#shidanList").html(errMsg);
                          },
                          beforeSend:function() {  
                          	$("#shidanList").html(loadingMsg);
                          },
                       	success : function(rs) {
                            //rs = JSON.parse(rs);
                       		var allOrder ="";
                       		if(rs.rows.length > 0){
                       			var oneOrder ="";
                       			for(var m = 0; m < rs.rows.length; m++){
                       				
                       				if(m==0){
                       					oneOrder += '<div>';
                           				
                       				}else{
                       					oneOrder += '<div style="margin-top:10px;">';	
                       				}
                       				
                       				
                        			oneOrder += '<div class="listTitle" style="background-color:#070813;">';
                        			oneOrder += '<p class="pull-left">Thứ tự '+rs.rows[m].orderNo + '：<font color="#7ECF0D">' + rs.rows[m].mode+'</font></p>';
                        			oneOrder += '<p class="pull-left">Cược '+rs.rows[m].money+' thắng '　+　rs.rows[m].maxWinMoney　+　'</p>';
                        			//是否是VIP
                        			if(rs.rows[m].orderDesc != 'NM' ){
                        				oneOrder += '<p class="pull-left"><font color="#FF910C">&nbsp;&nbsp;&nbsp;'+ rs.rows[m].orderDesc+'</font></p>';
                        			}
                        			oneOrder += '<p class="pull-right"><font color="red">'+rs.rows[m].maxWinTimes+'</font>&nbsp;lần&nbsp;&nbsp;</p>';
                        			//是否中状态
                        			if(parseFloat(rs.rows[m].statusType) == 0 ){
                        				oneOrder += '<p class="pull-right">'+rs.rows[m].matchStatus+'&nbsp;&nbsp;&nbsp;&nbsp;</p>';
                        			}else if(parseFloat(rs.rows[m].statusType) == 1 ){
                        				oneOrder += '<p class="pull-right"><font color="#6B9E29" >'+rs.rows[m].matchStatus+'&nbsp;&nbsp;&nbsp;&nbsp;</font></p>';
                        			}else{
                        				oneOrder += '<p class="pull-right"><font color="red" >'+rs.rows[m].matchStatus+'&nbsp;&nbsp;&nbsp;&nbsp;</font></p>';
                        			}
                        			oneOrder += '</div>';
              					
                        			var matchList ='<div class="subList" id="">';
                        			for(var i = 0; i < rs.rows[m].matchList.length; i++){
                        				var oneItem ="";
                        				
                        				
                        				if("完" == rs.rows[m].matchList[i].matchLong){
                        					oneItem +='<div class="subItem" style="height:50px; line-height:50px;color:#969799;">';
                        				}else{
                        					oneItem +='<div class="subItem" style="height:50px; line-height:50px;">';
                        				}
                        				
                        				oneItem +='<div class="detail pull-left">';
                    					oneItem +='<div class="col-xs-1"><span>'+ replaceText(rs.rows[m].matchList[i].rowNo) +'</span></div>';
                    					oneItem +='<div class="col-xs-2"><span>'+rs.rows[m].matchList[i].typeName +'</span></div>';
                    					oneItem +='<div class="col-xs-3"><span>'+rs.rows[m].matchList[i].homeTeam +'</span>&nbsp;&nbsp;<span>VS</span>&nbsp;&nbsp;<span>'+rs.rows[m].matchList[i].visitTeam +'</span></div>';
                							if(parseFloat(rs.rows[m].matchList[i].isOk) == 1){
                 							oneItem +='<div class="col-xs-2"><span style="color:red">'+rs.rows[m].matchList[i].matchResult +'</span></div>';
                 		      			}else{
                 							oneItem +='<div class="col-xs-2"><span>'+rs.rows[m].matchList[i].matchResult +'</span></div>';
                 		      			}
                							oneItem +='<div class="col-xs-1"><span>'+rs.rows[m].matchList[i].recPercent +'%</span></div>';
                							if("未" == rs.rows[m].matchList[i].matchLong){
                								oneItem +='<div class="col-xs-2"><span >'+rs.rows[m].matchList[i].matchLong +'</span></div>';
                							}else{
                								oneItem +='<div class="col-xs-2"><span >'+rs.rows[m].matchList[i].result1 +'</span></div>';
                							}
                							
                 						if(parseFloat(rs.rows[m].matchList[i].isOk) == 1){
                 							oneItem +='<div class="col-xs-1"><span style="line-height:35px;color:#7ECF0D">'+rs.rows[m].matchList[i].fixedNam +'</span>&nbsp;&nbsp;&nbsp;&nbsp;<span style="line-height:35px;color:red">√</span></div>';
                 						}else{
                 							oneItem +='<div class="col-xs-1"><span style="line-height:35px;color:#7ECF0D">'+rs.rows[m].matchList[i].fixedNam +'</span>&nbsp;&nbsp;&nbsp;&nbsp;<span style="line-height:35px;">'+rsData[rs.rows[m].matchList[i].matchLong]+'</span></div>';
                 						}
                 						
                 						oneItem +='</div>';
                 						oneItem +='<div class="goto pull-right" >';
                 						oneItem +='<a class="item" href="/detail?id='+rs.rows[m].matchList[i].matchId +'"><span>Chi tiết</span></a>&nbsp;&nbsp;&nbsp;&nbsp;';
                 						oneItem +='</div>';
                 						oneItem +='</div>';
                 						matchList = matchList + oneItem;
                        			}
                        			matchList +="</div></div>";
                        			oneOrder = oneOrder + matchList;
                       			}
                       			allOrder = allOrder + oneOrder;
                       		}else{
                       			allOrder='<div class="errorPanel" style="height:980px;line-height:30px;padding-top:150px;font-size: 16px"><span>Tỷ lệ thực tế hôm nay chưa được phát, các bạn kiên nhẫn chờ đợi,<br/>Cập nhật vào khoảng 22h hàng đêm, cảm ơn các bạn đã quan tâm...<span></div>';
                       		}
                       		$("#shidanList").html(allOrder);
                       	}
                   	});
            }
            
            
            /*右侧-稳单比赛列表*/
            function getWendanList(){
            	
            	$.ajax({
                       type  : "GET",
                       url: "/getWdList",
                       error : function(request) {
                       	var errMsg ='<div class="no-data-msg"><p>Tải dữ liệu không thành công...</p></div>';
                       	$("#wendanList").html(errMsg);
                          },
                          beforeSend:function() {  
                          	$("#wendanList").html(loadingMsg);
                          },
                       	success : function(rs) {
                            //rs = JSON.parse(rs);
                       		var allList ="";
                       		if(rs.rows.length > 0){
                       			for(var m = 0; m < rs.rows.length; m++){
                       				for(var i = 0; i < rs.rows[m].matchList.length; i++){
                           				var oneItem ="";
                           				if("完" == rs.rows[m].matchList[i].matchLong){
                           					oneItem +='<div class="subItem" style="color:#969799;">';
                           				}else{
                           					oneItem +='<div class="subItem">';
                           				}
                           				
                       					oneItem +='<div class="col-xs-2"></span>&nbsp;&nbsp;<span>'+replaceText(rs.rows[m].matchList[i].rowNo) +'</span></div>';
                    						oneItem +='<div class="col-xs-3"><span>'+rs.rows[m].matchList[i].homeTeam +'</span>&nbsp;&nbsp;<span>VS</span>&nbsp;&nbsp;<span>'+rs.rows[m].matchList[i].visitTeam +'</span></div>';
                    						//是否预测中
                    						if(parseInt(rs.rows[m].matchList[i].isOk) == 1){
                    							oneItem +='<div class="col-xs-2" style="color:red;"><span>'+rsData[rs.rows[m].matchList[i].matchResult]+'</span>&nbsp;&nbsp;<span>√</span></div>';
                    						}else{
                    							oneItem +='<div class="col-xs-2"><span>'+rsData[rs.rows[m].matchList[i].matchResult]+'</span></div>';
                    						}
                    						if("未" == rs.rows[m].matchList[i].matchLong){
                    							oneItem +='<div class="col-xs-1"><span>Chưa có</span></div>';
                    						}else{
                    							oneItem +='<div class="col-xs-1"><span>'+rs.rows[m].matchList[i].result1 +'</span></div>';
                    						}
                    						
                    						oneItem +='<div class="col-xs-2"><span>'+rs.rows[m].matchList[i].recPercent +'</span></div>';
                    						oneItem +='<div class="col-xs-1"><span>'+rs.rows[m].matchList[i].betRate +'</span></div>';
                    						oneItem +='<div class="col-xs-1"><a class="item" href="/detail?id='+rs.rows[m].matchList[i].matchId +'"><span>Chi tiết</span></a></div>';
                    						oneItem +='</div>';
              			     			allList = allList + oneItem;
                           			}
                       			}
                       		}
                       		$("#wendanList").html(allList);
                       	}
                   	});
            }
            
            
            /*右侧-高赔列表*/
            function getGaopeiList(){
            	
            	$.ajax({
                       type  : "GET",
                       url :"/getGaoBeiList",
                       error : function(request) {
                       	var errMsg ='<div class="no-data-msg"><p>Tải dữ liệu không thành công...</p></div>';
                       	$("#gaopeiList").html(errMsg);
                          },
                          beforeSend:function() {  
                          	$("#gaopeiList").html(loadingMsg);
                          },
                       	success : function(rs) {
                       		var allList ="";
                       		if(rs.rows.length > 0){
                       			for(var i = 0; i < rs.rows.length; i++){
                       				var oneItem ="";
                       				if("完" == rs.rows[i].matchLong){
                       					oneItem +='<div class="subItem" style="color:#969799;">';
                       				}else{
                       					oneItem +='<div class="subItem">';
                       				}
                   					oneItem +='<div class="col-xs-2"></span>&nbsp;&nbsp;<span>'+rs.rows[i].rowNo +'</span></div>';
                						oneItem +='<div class="col-xs-3"><span>'+rs.rows[i].homeTeam +'</span>&nbsp;&nbsp;<span>VS</span>&nbsp;&nbsp;<span>'+rs.rows[i].visitTeam +'</span></div>';
                						
                						//是否预测中
                						if(parseInt(rs.rows[i].isOk) == 1){
                							oneItem +='<div class="col-xs-2" style="color:red;"><span>'+rs.rows[i].matchResult+'</span>&nbsp;&nbsp;<span>√</span></div>';
                						}else{
                							oneItem +='<div class="col-xs-2"><span>'+rs.rows[i].matchResult+'</span></div>';
                						}
            
                						if("未" == rs.rows[i].matchLong){
                							oneItem +='<div class="col-xs-1"><span>'+rs.rows[i].matchLong +'</span></div>';
                						}else{
                							oneItem +='<div class="col-xs-1"><span>'+rs.rows[i].result1 +'</span></div>';
                						}
                						
                						if(parseInt(rs.rows[i].isCode) == 1){
                							oneItem +='<div class="col-xs-2"><span>'+rs.rows[i].recPercent+'</span>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#7ECF0D;">冷</span></div>';
                						}else{
                							oneItem +='<div class="col-xs-2"><span>'+rs.rows[i].recPercent +'</span></div>';
                						}
                						oneItem +='<div class="col-xs-2"><span>'+rs.rows[i].betRate +'</span></div>';
                						oneItem +='<div class="col-xs-1"><a class="item" href="/detail?id='+rs.rows[i].matchId +'"><span>Chi tiết</span></a></div>';
                						oneItem +='</div>';
            	     			allList = allList + oneItem;
                       			}
                       		}
                       		$("#gaopeiList").html(allList);
                       	}
                   	});
            }
            
        </script>
@endpush
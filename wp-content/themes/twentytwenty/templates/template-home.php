<?php
/**
 * Template Name: Home Template
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

        <div class="main-content">
            <?php get_template_part( 'template-parts/bootstrap_container', get_post_type() );?>
            <style>
                .centers{
                display: flex;
                display: -webkit-flex; /* Safari */
                justify-content:center;
                }
            </style>
            <!-- 主题内容数据-->	
            <div class="container" style="margin-top:-20px;">
                <div class="col-md-4 col-xl-4 column" style="padding:0px; background-color:#292d34;">
                    <div class="panel panel-default">
                        <div class="panel-body" style="background-color:#292d34;padding:0px;">
                            <section class="slider">
                                <div class="flexslider">
                                    <ul class="slides">
                                        <li>
                                            <img src="<?php bloginfo('template_directory');?>/images/pic0.jpg" class="img-responsive" alt="" />
                                        </li>
                                    </ul>
                                </div>
                            </section>
                            <!-- FlexSlider -->
                            <script defer src="<?php bloginfo('template_directory');?>/assets/js/jquery.flexslider.js"></script>
                            <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/assets/css/flexslider.css" type="text/css" media="screen" />
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
                    <div class="panel panel-default" style="margin-top:-18px;padding:0px;">
                        <div class="panel-heading" >
                            <span>较稳推荐</span>
                        </div>
                        <div class="panel-body" style="background-color:#292d34;padding:0px;font-size:8pt;">
                            <div class="subList" id="wdtjList"></div>
                        </div>
                    </div>
                    <div class="panel panel-default" style="margin-top:-18px;padding:0px;" >
                        <div class="panel-heading" >
                            <span id="sdTile">实单推荐</span>
                        </div>
                        <div class="panel-body" style="background-color:#292d34;padding:0px;min-height:250px;">
                            <div class="subList" id="sdtjList"></div>
                        </div>
                    </div>
                    <div class="panel panel-default" style="padding-top:1px;">
                        <div class="panel-body" style="background-color:#292d34;padding:20px;">
                            <div class="s-center" style="width: 100%;margin:25px 15px;">
                            </div>
                            <div class="row">
                                <div class="col-md-6 column" style="padding-left:20px;text-align:center;">
                                    <img src="<?php bloginfo('template_directory');?>/images/wx_down_logo.png"/>
                                    <br/><br/><span>扫描二维码</br>关注足彩加公众微信号</span>
                                </div>
                                <div class="col-md-6 column" style="padding-top:20px;text-align:center;">
                                    <div class="row" style="padding:5px;"><a onclick="jumpdown()" target="_blank" style="cursor: pointer;" ><img src="<?php bloginfo('template_directory');?>/images/phone_down.png"/></a></div>
                                    <div class="row" style="padding:5px;"><a href="http://woxiangwan.com/app/zucaijia.apk" target="_blank"><img src="<?php bloginfo('template_directory');?>/images/android_down.png"/></a></div>
                                    <br/><br/><span>更多精彩推荐</br>请下载足彩加App</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default" style="padding-top:1px;margin-bottom: 0px;">
                        <div class="panel-body" style="background-color:#292d34;padding:20px;">
                            <div style="text-align: center;">下载滚球预测神器“球来了”</div>
                            <div style="margin-top: 20px">
                                <div class="centers">
                                    <img  src="<?php bloginfo('template_directory');?>/images/android_down.png" style="cursor: pointer;margin-left: auto;margin-right: auto" onclick="godown()">
                                </div>
                                <div class="centers">
                                    <img  src="<?php bloginfo('template_directory');?>/images/phone_down.png"  style="cursor: pointer;margin-left: auto;margin-right: auto;margin-top: 10px;" onclick="godownap()">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default" style="padding-top:1px;margin-bottom: 0px;">
                        <div class="panel-body" style="background-color:#292d34;padding:20px;">
                            <div style="text-align: center;">下载亚盘预测神器“快乐足球”</div>
                            <div style="margin-top: 20px">
                                <div class="centers">
                                    <img  src="<?php bloginfo('template_directory');?>/images/android_down.png" style="cursor: pointer;margin-left: auto;margin-right: auto" onclick="godownKlzq()">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8  col-xl-8 column" style="padding:0px;">
                    <!--本场比赛预测-->
                    <div class="panel panel-default"  >
                        <div class="panel-body" style="padding:0px;" >
                            <!-- 底下内容页 -->
                            <div class="tab">
                                <ul id="myTab" class="nav nav-tabs" style="background-color:#292d34;padding:0px;">
                                    <li  class="active" onclick="getQbList();">
                                        <a href="#allTab" data-toggle="tab">
                                            <p>全部</p>
                                        </a>
                                    </li>
                                    <li  onclick="getWendanList();">
                                        <a href="#wendanTab" data-toggle="tab">
                                            <p>较稳</p>
                                        </a>
                                    </li>
                                    <li  onclick="getbifenList();">
                                        <a href="#bifenTab" data-toggle="tab">
                                            <p>比分</p>
                                        </a>
                                    </li>
                                    <li onclick="getbgcList();" >
                                        <a href="#banquanchangTab" data-toggle="tab">
                                            <p>半全场</p>
                                        </a>
                                    </li>
                                    <li  onclick="getSaikuangList();">
                                        <a href="#saikuangTab" data-toggle="tab">
                                            <p>赛况</p>
                                        </a>
                                    </li>
                                    <li  onclick="getShidanList();">
                                        <a href="#shidanTab" data-toggle="tab">
                                            <p>实单</p>
                                        </a>
                                    </li>
                                    <!--  <li  onclick="getGaopeiList();">
                                        <a href="#gaopeiTab" data-toggle="tab"><p>高赔</p></a>
                                        </li>-->
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div class="tab-pane fade in active" id="allTab" >
                                        <div class="listTitle">
                                            <div class="col-xs-2"><span>场次</span></div>
                                            <div class="col-xs-1"><span>时间</span></div>
                                            <div class="col-xs-3"><span>对阵球队</span></div>
                                            <div class="col-xs-2"><span>预测</span></div>
                                            <div class="col-xs-1"><span>赛果</span></div>
                                            <div class="col-xs-2"><span>概率</span></div>
                                            <div class="col-xs-1"><span>分析</span></div>
                                        </div>
                                        <div class="tabList" id="allList"></div>
                                    </div>
                                    <div class="tab-pane fade" id="banquanchangTab">
                                        <div class="listTitle">
                                            <div class="col-xs-2"><span>场次</span></div>
                                            <div class="col-xs-3"><span>对阵球队</span></div>
                                            <div class="col-xs-2"><span>预测</span></div>
                                            <div class="col-xs-1"><span>赛果</span></div>
                                            <div class="col-xs-2"><span>概率</span></div>
                                            <div class="col-xs-1"><span>SP</span></div>
                                            <div class="col-xs-1"><span>分析</span></div>
                                        </div>
                                        <div class="tabList" id="bqcList"></div>
                                    </div>
                                    <div class="tab-pane fade" id="bifenTab" >
                                        <div class="listTitle">
                                            <div class="col-xs-2"><span>场次</span></div>
                                            <div class="col-xs-3"><span>对阵球队</span></div>
                                            <div class="col-xs-2"><span>预测</span></div>
                                            <div class="col-xs-1"><span>赛果</span></div>
                                            <div class="col-xs-2"><span>概率</span></div>
                                            <div class="col-xs-1"><span>SP</span></div>
                                            <div class="col-xs-1"><span>分析</span></div>
                                        </div>
                                        <div class="tabList" id="bifenList"></div>
                                    </div>
                                    <div class="tab-pane fade" id="saikuangTab" >
                                        <div class="listTitle">
                                            <div class="col-xs-1"><span>场次</span></div>
                                            <div class="col-xs-2"><span>对阵球队</span></div>
                                            <div class="col-xs-2"><span>比赛时间</span></div>
                                            <div class="col-xs-2"><span>及时比分</span></div>
                                            <div class="col-xs-1"><span>预测</span></div>
                                            <div class="col-xs-1"><span>概率</span></div>
                                            <div class="col-xs-2"><span>SP</span></div>
                                            <div class="col-xs-1"><span>分析</span></div>
                                        </div>
                                        <div class="tabList" id="saikuangList"></div>
                                    </div>
                                    <div class="tab-pane fade" id="shidanTab" >
                                        <div id ="shidanList"></div>
                                    </div>
                                    <div class="tab-pane fade" id="wendanTab">
                                        <div class="listTitle">
                                            <div class="col-xs-2"><span>场次</span></div>
                                            <div class="col-xs-3"><span>对阵球队</span></div>
                                            <div class="col-xs-2"><span>预测</span></div>
                                            <div class="col-xs-1"><span>赛果</span></div>
                                            <div class="col-xs-2"><span>概率</span></div>
                                            <div class="col-xs-1"><span>SP</span></div>
                                            <div class="col-xs-1"><span>分析</span></div>
                                        </div>
                                        <div class="tabList" id="wendanList"></div>
                                    </div>
                                    <div class="tab-pane fade" id="gaopeiTab">
                                        <div class="listTitle">
                                            <div class="col-xs-2"><span>场次</span></div>
                                            <div class="col-xs-3"><span>对阵球队</span></div>
                                            <div class="col-xs-2"><span>预测</span></div>
                                            <div class="col-xs-2"><span>概率</span></div>
                                            <div class="col-xs-2"><span>SP</span></div>
                                            <div class="col-xs-1"><span>分析</span></div>
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




<script type="text/javascript" src="<?php bloginfo('template_directory');?>/assets/js/perfect-scrollbar.with-mousewheel.min.js"></script>
        <script type="text/javascript">
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
                        url: "<?php echo admin_url( 'admin-ajax.php' ); ?>",
					    data: {
						    action: "getSdtjList_action",						     
					    },
                        error : function(request) {
                       	allList='<div class="errorPanel" style="height:250px;line-height:250px;"><span>Tải dữ liệu không thành công, vui lòng làm mới và thử lại sau...<span></div>';
                       	$("#sdtjList").html(allList);
                          },
                          beforeSend:function() {  
                          	$("#sdtjList").html(loadingMsg);
                          },
                       	success : function(rs) {
                       		//设置实单标题
                       		rs = JSON.parse(rs);
                       		var allOrder ="";
                       		if(rs.rows.length > 0){
                       			var oneOrder ="";
                       			for(var m = 0; m < rs.rows.length && m < 2 ; m++){
                        			oneOrder += '<div class="listTitle" style="font-size:10pt;height:48px; line-height:40px;"> ';
                        			oneOrder += '<div class="row" style="margin-top:5px;">';
                        			oneOrder +='<div class="col-xs-2" style="padding:0px;">';
                        			oneOrder += '<font color="#FF910C">实单'+rs.rows[m].orderNo + ':</font>';
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
            					oneOrder += '<p class="pull-left">'+rs.rows[m].money+'元博'　+　rs.rows[m].maxWinMoney　+　'元</p>';
            					oneOrder += '<p class="pull-right"><font color="red">'+rs.rows[m].maxWinTimes+'</font>&nbsp;倍&nbsp;&nbsp;</p>';
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
                    					oneItem +='<div class="col-xs-3"><span>'+rs.rows[m].matchList[i].typeName +'</span><br/><span>'+rs.rows[m].matchList[i].rowNo +'</span></div>';
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
                 						oneItem +='<a class="item" href="/detail?id='+rs.rows[m].matchList[i].matchId +'"><span>详细</span></a>';
                 						oneItem +='</div>';
                 						oneItem +='</div>';
                 						matchList = matchList + oneItem;
                        			}
                        			matchList +="</div>";
                        			
                        			
                        			
                        			oneOrder = oneOrder + matchList;
                       			}
                       			allOrder = allOrder + oneOrder;
                       		}else{
                       			allOrder='<div class="errorPanel" style="height:250px;padding-top:80px;"><div style="height:80px;line-height:30px;">Đơn hàng thực sự hôm nay chưa được phát,<br/> các bạn kiên nhẫn chờ đợi,<br/>Cập nhật vào khoảng 20:00 hàng đêm, <br/>cảm ơn các bạn đã quan tâm...</div></div>';
                       		}
                       		$("#sdtjList").html(allOrder);
                       		
                       	}
                   	});
            }
            
            /*左侧-稳场推荐列表*/
            function getWdtjList(){
            	
            	$.ajax({
                        type  : "GET",
                        url: "<?php echo admin_url( 'admin-ajax.php' ); ?>",
					    data: {
						    action: "getWdtjList_action",						     
					    },
                        error : function(request) {
                       	var errMsg ='<div class="no-data-msg"><p>数据加载失败...</p></div>';
                       	$("#wdtjList").html(errMsg);
                          },
                        beforeSend:function() {  
                          	$("#wdtjList").html(loadingMsg);
                          },
                       	success : function(rs) {
                       		rs = JSON.parse(rs);
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
                    					oneItem +='<div class="col-xs-3"><span>'+rs.rows[m].matchList[i].typeName+'</span><br/><span>'+rs.rows[m].matchList[i].rowNo +'</span></div>';
                 						oneItem +='<div class="col-xs-5 item"><span>'+rs.rows[m].matchList[i].homeTeam +'</span>&nbsp;&nbsp;<span>VS</span>&nbsp;&nbsp;<span>'+rs.rows[m].matchList[i].visitTeam +'</span></div>';
                 						//oneItem +='<div class="col-xs-3"><span style="color:red">'+rs.rows[m].matchList[i].matchResult +'</span><br/><span>'+rs.rows[m].matchList[i].recPercent +'</span></div>';
                 						
                 						if(parseInt(rs.rows[m].matchList[i].isOk) == 1){
                 							
                 							if("未" == rs.rows[m].matchList[i].matchLong){
                 								oneItem +='<div class="col-xs-3 item"><span >'+rs.rows[m].matchList[i].matchResult +'</span></div>';
                 							}else{
                 								oneItem +='<div class="col-xs-3"><span style="color:red">'+rs.rows[m].matchList[i].matchResult +'</span><br/><span>'+rs.rows[m].matchList[i].result1 +'</span></div>';
               	      					}
                 							
                 							//oneItem +='<div class="col-xs-3"><span style="color:red">'+rs.rows[m].matchList[i].matchResult +'</span><br/><span>'+rs.rows[m].matchList[i].recPercent +'</span></div>';
                 							oneItem +='<div><span style="line-height:30px;color:red;margin-right:10px;">√&nbsp;</span></div>';
                 						}else{
                 							
                 							if("未" == rs.rows[m].matchList[i].matchLong){
                 								oneItem +='<div class="col-xs-3 item"><span >'+rs.rows[m].matchList[i].matchResult +'</span></div>';
                 							}else{
                 								oneItem +='<div class="col-xs-3"><span >'+rs.rows[m].matchList[i].matchResult +'</span><br/><span>'+rs.rows[m].matchList[i].result1 +'</span></div>';
                 							}
                 							oneItem +='<div><span style="line-height:30px;margin-right:10px;">'+rs.rows[m].matchList[i].matchLong+'&nbsp;</span></div>';
                 							//oneItem +='<div class="col-xs-3"><span >'+rs.rows[m].matchList[i].matchResult +'</span><br/><span>'+rs.rows[m].matchList[i].recPercent +'</span></div>';
                 						}
            
                 						oneItem +='</div>';
                 						oneItem +='<div class="goto pull-right" >';
                 						oneItem +='<a class="item" href="/detail?id='+rs.rows[m].matchList[i].matchId +'"><span>详细</span></a>&nbsp;&nbsp;';
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
                        url: "<?php echo admin_url( 'admin-ajax.php' ); ?>",
					    data: {
						    action: "getBgcList_action",						     
					    },                        
                        error : function(request) {
                        	var errMsg ='<div class="no-data-msg"><p>数据加载失败...</p></div>';
                        	$("#bqcList").html(errMsg);
                           },
                           beforeSend:function() {  
                           	$("#bqcList").html(loadingMsg);
                           },
                        	success : function(rs) {
                                rs = JSON.parse(rs);
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
                         				
                        					oneItem +='<div class="col-xs-2"><span>'+rs.rows[m].matchList[i].rowNo +'</span></div>';
                     						oneItem +='<div class="col-xs-3"><span>'+rs.rows[m].matchList[i].homeTeam +'</span>&nbsp;&nbsp;<span>VS</span>&nbsp;&nbsp;<span>'+rs.rows[m].matchList[i].visitTeam +'</span></div>';
                     						//是否预测中
                     						if(parseInt(rs.rows[m].matchList[i].isOk) == 1){
                     							oneItem +='<div class="col-xs-2" style="color:red;">'+rs.rows[m].matchList[i].matchResult+'&nbsp;&nbsp;<span>√</span></div>';
                     						}else{
                     							oneItem +='<div class="col-xs-2">'+rs.rows[m].matchList[i].matchResult+'</div>';
                     						}
                     						if("未" == rs.rows[m].matchList[i].matchLong){
                     							oneItem +='<div class="col-xs-1"><span>'+rs.rows[m].matchList[i].matchLong +'</span></div>';
                     						}else{
                     							oneItem +='<div class="col-xs-1"><span>'+rs.rows[m].matchList[i].result1 +'</span></div>';
                     						}
                     						
                     						oneItem +='<div class="col-xs-2"><span>'+rs.rows[m].matchList[i].recPercent +'</span></div>';
                     						oneItem +='<div class="col-xs-1"><span>'+rs.rows[m].matchList[i].betRate +'</span></div>';
                     						oneItem +='<div class="col-xs-1"><a class="item" href="/detail?id='+rs.rows[m].matchList[i].matchId +'"><span>详细</span></a></div>';
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
                        url: "<?php echo admin_url( 'admin-ajax.php' ); ?>",
                        data: {
                            action: "getBifenList_action",
                        },                        
                        error : function(request) {
                        	var errMsg ='<div class="no-data-msg"><p>数据加载失败...</p></div>';
                        	$("#bifenList").html(errMsg);
                           },
                           beforeSend:function() {  
                           	$("#bifenList").html(loadingMsg);
                           },
                        	success : function(rs) {
                                rs = JSON.parse(rs);
                        		var allList ="";
                        		if(rs.rows.length > 0){
                        			for(var i = 0; i < rs.rows.length; i++){
                        				var oneItem ="";
                        				if("完" == rs.rows[i].matchLong){
                        					oneItem +='<div class="subItem" style="color:#969799;">';
                        				}else{
                        					oneItem +='<div class="subItem">';
                        				}
                       					oneItem +='<div class="col-xs-2"><span>'+rs.rows[i].rowNo +'</span></div>';
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
                    						oneItem +='<div class="col-xs-1"><a class="item" href="/detail?id='+rs.rows[i].matchId +'"><span>详细</span></a></div>';
                    						oneItem +='</div>';
            		     			allList = allList + oneItem;
                        			}
                        		}
                        		$("#bifenList").html(allList);
                        	}
                    });
            	
            }
            
            
            /*获取全部比分列表*/
            function getQbList(){
            
                $.ajax({
                        type  : "GET",
                        url: "<?php echo admin_url( 'admin-ajax.php' ); ?>",
					    data: {
						    action: "getQbList_action",						     
					    },
                        error : function(request) {
                        	var errMsg ='<div class="no-data-msg"><p>数据加载失败...</p></div>';
                        	$("#allList").html(errMsg);
                           },
                           beforeSend:function() {
                           	$("#allList").html(loadingMsg);
                           },
                        	success : function(rs) {
                                rs = JSON.parse(rs);
                        		var allList ="";
                        		if(rs.rows.length > 0){
                        			for(var i = 0; i < rs.rows.length; i++){
                        				var oneItem ="";
                        				if("未" == rs.rows[i].matchLong){
                        					
                    		             	oneItem +='<div class="subItem" style="background-color:#3d4147;">';
                        					oneItem +='<div class="col-xs-2"></span>&nbsp;&nbsp;<span>'+rs.rows[i].rowNo +'</span></div>';
                        					oneItem +='<div class="col-xs-1"><span>'+rs.rows[i].matchTime +'</span></div>';
                        					oneItem +='<div class="col-xs-3"><span>'+rs.rows[i].homeTeam +'</span>&nbsp;&nbsp;<span>VS</span>&nbsp;&nbsp;<span>'+rs.rows[i].visitTeam +'</span></div>';
                     						//是否预测中
                     						if(parseInt(rs.rows[i].isOk) == 1){
                     							oneItem +='<div class="col-xs-2" style="color:red;"><span>'+rs.rows[i].matchResult+'</span>&nbsp;&nbsp;<span>√</span></div>';
                     						}else{
                     							oneItem +='<div class="col-xs-2"><span>'+rs.rows[i].matchResult+'</span></div>';
                     						}
                     						
                     						oneItem +='<div class="col-xs-1"><span>'+rs.rows[i].matchLong +'</span></div>';
                     						oneItem +='<div class="col-xs-2"><span>'+rs.rows[i].recPercent +'%</span></div>';
                     						
                     						oneItem +='<div class="col-xs-1"><a class="item" href="/detail?id='+rs.rows[i].matchId +'"><span>详细</span></a></div>';
                     						oneItem +='</div>';
            			     
                        					
                        				}else if("完" == rs.rows[i].matchLong){
                        					
                         				oneItem +='<div class="subItem" style="background-color:#3d4147;color:#969799;">';
                        					oneItem +='<div class="col-xs-2"></span>&nbsp;&nbsp;<span>'+rs.rows[i].rowNo +'</span></div>';
                        					oneItem +='<div class="col-xs-1"><span>'+rs.rows[i].matchTime +'</span></div>';
                        					oneItem +='<div class="col-xs-3"><span>'+rs.rows[i].homeTeam +'</span>&nbsp;&nbsp;<span>VS</span>&nbsp;&nbsp;<span>'+rs.rows[i].visitTeam +'</span></div>';
                     						//是否预测中
                     						if(parseInt(rs.rows[i].isOk) == 1){
                     							oneItem +='<div class="col-xs-2" style="color:red;"><span>'+rs.rows[i].matchResult+'</span>&nbsp;&nbsp;<span>√</span></div>';
                     						}else{
                     							oneItem +='<div class="col-xs-2" style="color:#969799;"><span>'+rs.rows[i].matchResult+'</span></div>';
                     						}
                     						
                     						oneItem +='<div class="col-xs-1"><span>'+rs.rows[i].result1 +'</span></div>';
                     						oneItem +='<div class="col-xs-2"><span>'+rs.rows[i].recPercent +'%</span></div>';
                     					
                     						oneItem +='<div class="col-xs-1"><a class="item" href="/detail?id='+rs.rows[i].matchId +'"><span>详细</span></a></div>';
                     						oneItem +='</div>';
            			     		
                        					
                        				}else{
                         				oneItem +='<div class="subItem">';
                        					oneItem +='<div class="col-xs-2"></span>&nbsp;&nbsp;<span>'+rs.rows[i].rowNo +'</span></div>';
                        					oneItem +='<div class="col-xs-1"><span>'+rs.rows[i].matchTime +'</span></div>';
                        					oneItem +='<div class="col-xs-3"><span>'+rs.rows[i].homeTeam +'</span>&nbsp;&nbsp;<span>VS</span>&nbsp;&nbsp;<span>'+rs.rows[i].visitTeam +'</span></div>';
                     						//是否预测中
                     						if(parseInt(rs.rows[i].isOk) == 1){
                     							oneItem +='<div class="col-xs-2" style="color:red;"><span>'+rs.rows[i].matchResult+'</span>&nbsp;&nbsp;<span>√</span></div>';
                     						}else{
                     							oneItem +='<div class="col-xs-2"><span>'+rs.rows[i].matchResult+'</span></div>';
                     						}
                     						oneItem +='<div class="col-xs-1"><div style="margin-top:12px;line-height:10px;color:#69AF00;">'+rs.rows[i].matchLong +'</div><div style="margin-top:5px;line-height:10px;">'+rs.rows[i].result1 +'</div></div>';
                     						oneItem +='<div class="col-xs-2"><span>'+rs.rows[i].recPercent +'%</span></div>';
                     						oneItem +='<div class="col-xs-1"><a class="item" href="/detail?id='+rs.rows[i].matchId +'"><span>详细</span></a></div>';
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
                        url: "<?php echo admin_url( 'admin-ajax.php' ); ?>",
                        data: {
                            action: "getQcList_action",
                        },
                        error : function(request) {
                        	var errMsg ='<div class="no-data-msg"><p>数据加载失败...</p></div>';
                        	$("#allList").html(errMsg);
                           },
                           beforeSend:function() {  
                           	$("#allList").html(loadingMsg);
                           },
                        	success : function(rs) {
                                rs = JSON.parse(rs);
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
                    						oneItem +='<div class="col-xs-1"><a class="item" href="/detail?id='+rs.rows[i].matchId +'"><span>详细</span></a></div>';
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
                        url: "<?php echo admin_url( 'admin-ajax.php' ); ?>",
                        data: {
                            action: "getSaikuangList_action",
                        },                       
                       error : function(request) {
                       	var errMsg ='<div class="no-data-msg"><p>数据加载失败...</p></div>';
                       	$("#saikuangList").html(errMsg);
                          },
                          beforeSend:function() {  
                          	$("#saikuangList").html(loadingMsg);
                          },
                       	success : function(rs) {
                            rs = JSON.parse(rs);
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
                						oneItem +='<div class="col-xs-1"><a class="item" href="/detail?id='+rs.rows[i].matchId +'"><span>详细</span></a></div>';
                						oneItem +='</div>';
                						oneItem +='<div style="height:30px;line-height:25px;">';
                						oneItem +='<div class="col-xs-12" style="text-align:left;padding-left:12px;">赛况提示:&nbsp;&nbsp<span style="color:#6EB60B;">'+rs.rows[i].matchDesc +'</span></div>';
                						oneItem +='</div>';
                						oneItem +='</div>';
                						allOrder = allOrder + oneItem;
                       			}
                       		}else{
                       			allOrder ='<div class="no-data-msg"><p>抱歉，目前没有最新赛况，敬请及时关注赛况提示，请耐心等待...</p></div>';
              	    		}
                       		$("#saikuangList").html(allOrder);
               		}
                   	});
            	
            	
            	
            
            }
            
            /*右侧-实单TAB页数据*/
            function getShidanList(){
            	
            	$.ajax({
                       type  : "GET",
                        url: "<?php echo admin_url( 'admin-ajax.php' ); ?>",
                        data: {
                            action: "getSdtjList_action",
                        },                        
                       error : function(request) {
                       	var errMsg ='<div class="no-data-msg"><p>数据加载失败...</p></div>';
                       	$("#shidanList").html(errMsg);
                          },
                          beforeSend:function() {  
                          	$("#shidanList").html(loadingMsg);
                          },
                       	success : function(rs) {
                            rs = JSON.parse(rs);
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
                        			oneOrder += '<p class="pull-left">实单'+rs.rows[m].orderNo + '：<font color="#7ECF0D">' + rs.rows[m].mode+'</font></p>';
                        			oneOrder += '<p class="pull-left">'+rs.rows[m].money+'元博'　+　rs.rows[m].maxWinMoney　+　'元</p>';
                        			//是否是VIP
                        			if(rs.rows[m].orderDesc != 'NM' ){
                        				oneOrder += '<p class="pull-left"><font color="#FF910C">&nbsp;&nbsp;&nbsp;'+ rs.rows[m].orderDesc+'</font></p>';
                        			}
                        			oneOrder += '<p class="pull-right"><font color="red">'+rs.rows[m].maxWinTimes+'</font>&nbsp;倍&nbsp;&nbsp;</p>';
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
                    					oneItem +='<div class="col-xs-1"><span>'+rs.rows[m].matchList[i].rowNo +'</span></div>';
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
                 							oneItem +='<div class="col-xs-1"><span style="line-height:35px;color:#7ECF0D">'+rs.rows[m].matchList[i].fixedNam +'</span>&nbsp;&nbsp;&nbsp;&nbsp;<span style="line-height:35px;">'+rs.rows[m].matchList[i].matchLong+'</span></div>';
                 						}
                 						
                 						oneItem +='</div>';
                 						oneItem +='<div class="goto pull-right" >';
                 						oneItem +='<a class="item" href="/detail?id='+rs.rows[m].matchList[i].matchId +'"><span>详细</span></a>&nbsp;&nbsp;&nbsp;&nbsp;';
                 						oneItem +='</div>';
                 						oneItem +='</div>';
                 						matchList = matchList + oneItem;
                        			}
                        			matchList +="</div></div>";
                        			oneOrder = oneOrder + matchList;
                       			}
                       			allOrder = allOrder + oneOrder;
                       		}else{
                       			allOrder='<div class="errorPanel" style="height:980px;line-height:30px;padding-top:150px;"><span>今天实单还未给出，请您耐心等待,<br/>每天晚上22：00左右更新，感谢您的关注...<span></div>';
                       		}
                       		$("#shidanList").html(allOrder);
                       	}
                   	});
            }
            
            
            /*右侧-稳单比赛列表*/
            function getWendanList(){
            	
            	$.ajax({
                       type  : "GET",
                        url: "<?php echo admin_url( 'admin-ajax.php' ); ?>",
                        data: {
                            action: "getWdList_action",                            
                        },                       
                       error : function(request) {
                       	var errMsg ='<div class="no-data-msg"><p>数据加载失败...</p></div>';
                       	$("#wendanList").html(errMsg);
                          },
                          beforeSend:function() {  
                          	$("#wendanList").html(loadingMsg);
                          },
                       	success : function(rs) {
                            rs = JSON.parse(rs);
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
                           				
                       					oneItem +='<div class="col-xs-2"></span>&nbsp;&nbsp;<span>'+rs.rows[m].matchList[i].rowNo +'</span></div>';
                    						oneItem +='<div class="col-xs-3"><span>'+rs.rows[m].matchList[i].homeTeam +'</span>&nbsp;&nbsp;<span>VS</span>&nbsp;&nbsp;<span>'+rs.rows[m].matchList[i].visitTeam +'</span></div>';
                    						//是否预测中
                    						if(parseInt(rs.rows[m].matchList[i].isOk) == 1){
                    							oneItem +='<div class="col-xs-2" style="color:red;"><span>'+rs.rows[m].matchList[i].matchResult+'</span>&nbsp;&nbsp;<span>√</span></div>';
                    						}else{
                    							oneItem +='<div class="col-xs-2"><span>'+rs.rows[m].matchList[i].matchResult+'</span></div>';
                    						}
                    						if("未" == rs.rows[m].matchList[i].matchLong){
                    							oneItem +='<div class="col-xs-1"><span>'+rs.rows[m].matchList[i].matchLong +'</span></div>';
                    						}else{
                    							oneItem +='<div class="col-xs-1"><span>'+rs.rows[m].matchList[i].result1 +'</span></div>';
                    						}
                    						
                    						oneItem +='<div class="col-xs-2"><span>'+rs.rows[m].matchList[i].recPercent +'</span></div>';
                    						oneItem +='<div class="col-xs-1"><span>'+rs.rows[m].matchList[i].betRate +'</span></div>';
                    						oneItem +='<div class="col-xs-1"><a class="item" href="/detail?id='+rs.rows[m].matchList[i].matchId +'"><span>详细</span></a></div>';
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
                       url :"/zcj/jincai/getGaoBeiList",
                       error : function(request) {
                       	var errMsg ='<div class="no-data-msg"><p>数据加载失败...</p></div>';
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
                						oneItem +='<div class="col-xs-1"><a class="item" href="/detail?id='+rs.rows[i].matchId +'"><span>详细</span></a></div>';
                						oneItem +='</div>';
            	     			allList = allList + oneItem;
                       			}
                       		}
                       		$("#gaopeiList").html(allList);
                       	}
                   	});
            }
            
        </script>



<?php get_footer(); ?>
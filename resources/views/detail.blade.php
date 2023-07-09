@extends('layout.layout')

@section('content')
        <div class="main-content" style="padding-top: 2em;">
            <div class="container">
                <input type="hidden" id="flag" value="0"/>
                <input type="hidden" id="rowNo" value="{{ $id }}" />
                <div class="row list-title">
                    <button onclick="goBack();">Quay lại</button>
                    <span id="acesPath">
                        <span>Thể thao</span>&nbsp;&nbsp;>&nbsp;&nbsp;<span>Chi tiết</span>&nbsp;&nbsp;>&nbsp;&nbsp;
                        <span>{{ $item->team_home }}</span>&nbsp;VS &nbsp;<span>{{ $item->team_visit }}</span>
                    </span>
                </div>
                <div class="row">                    
                    <div class="col-sm-8 col-md-8 column" style="margin-top:5px; background-color:#134e14;">
                        <!-- 队名等 -->
                        <div id="loading_1"></div>
                        <div class="row">
                            <div class="col-md-6 column" style="padding:0px;">
                                <div class="panel-item"  style="color:#fff;">
                                    <div class="title" style="color:#fff;">
                                        <span class="pull-left">Thời gian thi đấu: {{ date('H:i', strtotime( $item->match_date )) }}</span>
                                    </div>
                                    <div class="cont">
                                        <div class="row" style="margin-top:60px;">
                                            <div class="col-xs-4 teamDetailImg">
                                                <span><img class="teamIcon" src="{{ $logo_team_home }}"/></span>
                                            </div>
                                            <div class="col-xs-4 teamDetailImg">
                                               <span> {{ $item->row_no }}</span><br/><span> {{ $item->is_ok != '0' ? 'Đã kết thúc' : 'Chưa diễn ra' }} </span><br/><br/>
                                               <span style="color:#91ED10;"><strong>{{ !empty($item->tour_name_edit) ? $item->tour_name_edit : $item->tour_name }}</strong></span><br/><br/>
                                               <span>{{ $item->result1 }}</span>
                                            </div>
                                            <div class="col-xs-4 teamDetailImg">
                                                <span><img class="teamIcon" src="{{ $logo_team_visit }}"/></span>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:40px;">
                                            <div class="col-xs-4 teamDetailText">
                                                <span><strong>{{ $item->team_home }}</strong></span>
                                            </div>
                                            <div class="col-xs-4 teamDetailText">
                                               <span>&nbsp;&nbsp;</span>
                                            </div>
                                            <div class="col-xs-4 teamDetailText">
                                                <span><strong>{{ $item->team_visit }}</strong></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 column">
                                <div class="panel-body" style="margin-top:50px; background-color:#1f8422;">
                                    <div id="resultCharts" style="height:200px;"></div>
                                </div>
                            </div>  
                        </div>
                         
                        <div class="row detailMsg" id="notyText"></div> 
        
                        <!-- 预测推荐 -->
                        <div class="row">
                            <div class="col-sm-7 col-md-7">

                                <!-- 预测 -->
                                <div class="row">
                                    <div class="panel-item">
                                        <div class="title">
                                            <span class="pull-left"><img src="{{ asset('assets/images/zuqiu.png') }}">&nbsp;&nbsp;Dự đoán trận đấu</span>
                                        </div>
                                        <div class="cont">
                                            <div class="subList">
                                                <div class="col-xs-4  col-md-3 subtitle"><span>Cả trận:</span></div>
                                                <div class="col-xs-8 subtext" style="padding:0px;"><span id="qcYuceText"></span></div>
                                            </div>
                                            <div class="subList">
                                                <div class="col-xs-4 col-md-3 subtitle"><span>Hiệp 1：</span></div>
                                                <div class="col-xs-8 subtext" style="padding:0px;"><span id="bqcYuceText"></span></div>
                                            </div>
                                            <div class="subList" >
                                                <div class="col-xs-4 col-md-3 subtitle"><span>Tỷ số：</span></div>
                                                <div class="col-xs-8 subtext" style="padding:0px;"><span id="bfYuceText"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- 提示 -->
                                <div class="row">
                                    <div class="panel-item">
                                        <div class="title">
                                            <span class="pull-left"><img src="{{ asset('assets/images/zuqiu.png') }}">&nbsp;&nbsp;Ghi chú quan trọng</span>
                                        </div>
                                        <div class="cont">
                                            <div class="cont-detail showText" id="zcjNotice"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5 col-md-5">
                                <div class="cont">
                                    <div class="showText2" id="reasonText"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row detailMsg"  style="height:120px;"></div>
                    </div>
                    
                    <div class="col-sm-4 col-md-4 column" style="padding:0px;" id="leftIfnoDiv">
                        <!-- 赛况 -->
                        <div id="loading_2"></div>
                        <div class="panel-item" id="skDiv">
                            <div class="title">
                                <span class="pull-left"><img src="{{ asset('assets/images/zuqiu.png') }}" >&nbsp;&nbsp;Thống kê trận đấu</span>                                
                            </div>
                            <div class="cont1">
                                <div class="listTitle">
                                    <div class="col-xs-4"><span>Đội nhà</span></div>
                                    <div class="col-xs-4"><span>Thông số</span></div>
                                    <div class="col-xs-4"><span>Đội khách</span></div>
                                </div>
                                <div class="subList" id="skList"></div>
                            </div>
                        </div>
            
                        <!-- 近期战绩 -->
                        <div class="panel-item" id="zjDiv">
                            <div class="title">
                                <span class="pull-left"><img src="{{ asset('assets/images/zuqiu.png') }}" >&nbsp;&nbsp;Thành tích gần đây</span>
                            </div>
                            <div class="cont2">
                                    <div class="subList">
                                        <div class="col-xs-12">
                                            <span>Lịch sử đối đầu：</span><span id="hisZj" style="color:#ADFB3c"></span>
                                         </div>
                                     </div>
                                    <div class="subList">
                                        <div class="col-xs-6">
                                            <span>Đội nhà：</span><span id="homeZj"></span>
                                         </div>
                                         <div class="col-xs-6">
                                            <span>Sân nhà：</span><span id="homehomeZj"></span>
                                         </div>
                                     </div>
                                    <div class="subList">
                                        <div class="col-xs-6">
                                            <span>Đội khách：</span><span id="awayZj"></span>
                                         </div>
                                         <div class="col-xs-6">
                                            <span>Sân khách：</span><span id="awayawayZj"></span>
                                         </div>
                                     </div>
                            </div>
                        </div>
                        
                        <!-- 即时赔率-->
                        <div class="panel-item" id="pvDiv">
                            <div class="title">
                                <span class="pull-left"><img src="{{ asset('assets/images/zuqiu.png') }}" >&nbsp;&nbsp;Tỷ lệ cược trực tiếp </span>                                
                            </div>
                            <div class="cont3">
                                <div class="listTitle">
                                    <div class="col-xs-4"><span>Chủ nhà</span></div>
                                    <div class="col-xs-4"><span>Hoà</span></div>
                                    <div class="col-xs-4"><span>Đội Khách</span></div>
                                </div>
                                <div class="subList">
                                    <div class="col-xs-4">&nbsp;<span id="vctPlv"></span></div>
                                    <div class="col-xs-4"><span id="tiePlv"></span>&nbsp;</div>
                                    <div class="col-xs-4"><span id="failPlv"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- 独家数据 -->
                        <div class="panel-item"  id="djDiv">
                            <div class="title">
                                <span class="pull-left"><img src="{{ asset('assets/images/zuqiu.png') }}" >&nbsp;&nbsp;Dữ liệu độc quyền</span>                                
                            </div>
                            <div class="cont4" id="dujiaList" ></div>
                        </div>

                        <div class="panel-item" style="padding-top:1px;margin-bottom: 20px;">
                            <div class="panel-body">
                                <div class="leftMenu">
                                    <ul>
                                        <li><a target="_blank" href="https://zalo.me/0378304587">
                                            <img style="width: 100%" src="{{ asset('assets/images/chuyengia.gif') }}">
                                        </a></li>
                                        <li><a target="_blank"  href="https://onbet3.com/?inviteCode=8oncom"><img style="width: 100%" src="{{ asset('assets/images/vip.gif') }}"></a></li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
@endsection

@push('js')

<script type="text/javascript" src="{{ asset('assets/js/echarts-all.js') }}"></script>
<script type="text/javascript">
    
        $(document).ready(function() {
        
            $(".megamenu").megamenu();

            $("#loading_1").html(loadingMsg);
            $("#loading_2").html(loadingMsg);
            
            //设置比赛场次基本信息
            setBaseInfo();
            
            //设置赛况列表
            setSaikuangList();

        });
        
        
        /*返回按钮处理*/
        function goBack(){
            var flag = $("#flag").val();
            if(flag == "0"){
                window.location.href='/';
            }else{
                window.location.href='/';
            }
        }

        /*设置比赛场次基本信息*/
        function setBaseInfo(){
            var matchNo = $("#rowNo").val();
            $.ajax({
                type  : "GET",
                url :"/getDetailYcChartsInfo?rowNo="+matchNo,
                error : function(request) {
                    $("#resultCharts").html("Tải dữ liệu không thành công...");
                },
                beforeSend:function() {  
                  $("#loading_1").html(loadingMsg);
                },                
                success : function(rs) {
                    
                
                    //预测
                    var winstr = rs.analyInfo.winner;
                    var winary = winstr.split("、");
                    var newwinstr = "";
                    for(i=0;i< winary.length; i++){
                        if(i == 0 ){
                            if(winary[i].indexOf("√") >=0){
                                newwinstr +="<font color='#FF3C00'>" +winary[i]+"</font>";
                            }else{
                                newwinstr += winary[i];
                            }
                        }else{
                            if(winary[i].indexOf("√") >=0){
                                newwinstr +="、<font color='#FF3C00'>" +winary[i]+"</font>";
                            }else{
                                newwinstr += "、"+ winary[i];
                            }
                        }
                    }
                    $("#qcYuceText").html(newwinstr);
                    
                    var halfstr = rs.analyInfo.halfWholeResult;
                    var halfary = halfstr.split("、");
                    var newhalfstr = "";
                    for(i=0;i< halfary.length; i++){
                        if(i == 0 ){
                            if(halfary[i].indexOf("√") >=0){
                                newhalfstr +="<font color='#FF3C00'>" +halfary[i]+"</font>";
                            }else{
                                newhalfstr += halfary[i];
                            }
                        }else{
                            if(halfary[i].indexOf("√") >=0){
                                newhalfstr +="、<font color='#FF3C00'>" +halfary[i]+"</font>";
                            }else{
                                newhalfstr += "、"+ halfary[i];
                            }
                        }
                    }
                    $("#bqcYuceText").html(newhalfstr);
                    
                    var scorestr = rs.analyInfo.scoreResult;
                    var scoreary = scorestr.split("、");
                    var newscorestr = "";
                    for(i=0;i< scoreary.length; i++){
                        if(i == 0 ){
                            if(scoreary[i].indexOf("√") >=0){
                                newscorestr +="<font color='#FF3C00'>" +scoreary[i]+"</font>";
                            }else{
                                newscorestr += scoreary[i];
                            }
                        }else{
                            if(scoreary[i].indexOf("√") >=0){
                                newscorestr +="、<font color='#FF3C00'>" +scoreary[i]+"</font>";
                            }else{
                                newscorestr += "、"+ scoreary[i];
                            }
                        }
                    }
                    $("#bfYuceText").html(newscorestr);
                    
                    
                    $("#reasonText").html("Xác xuất thắng:<font color='#91ED10'>" + rs.analyInfo.winPossibility +"%</font>,Lý do:<br/>"+ rs.analyInfo.winReason + "<br/><br/>" 
                            + "Xác xuất hoà:<font color='#91ED10'>" + rs.analyInfo.drawPossibility + "%</font>,Lý do:<br/>" + rs.analyInfo.drawReason + "<br/><br/>"
                            + "Xác xuất thua:<font color='#91ED10'>" + rs.analyInfo.losePossibility + "%</font>,Lý do:<br/>" + rs.analyInfo.loseReason );
                    
                    $("#zcjNotice").html(rs.analyInfo.keyNote);
                           
                    /*设置预测结果饼图*/
                    setResultChart(rs.bilvList);
                    
                    //重要提示
                    if("1" == rs.analyInfo.notyContent){
                        //红色
                        $("#notyText").html("<span style='color:#FF3C00;'>" + rs.analyInfo.notyContent+"</span>");
                    }else if("2" == rs.analyInfo.notyContent){
                        //绿色
                        $("#notyText").html("<span style='color:#91ED10;'>" + rs.analyInfo.notyContent+"</span>");
                    }else if("3" == rs.analyInfo.notyContent){
                        //外链
                        $("#notyText").html("<span><a href='"+ rs.analyInfo.notyUrl +"' target='_blank'>" + rs.analyInfo.notyContent+"</a></span>");
                    }else{
                        //普通
                        $("#notyText").html("<span>" + rs.analyInfo.notyContent+"</span>");
                    }

                    $("#loading_1").html('');
                    
                }
                
            });
            
        }
        
        /*设置预测结果饼图*/
        function setResultChart(bilvList){
            
            //组织数组
            var xdata=[],ydata=[];
            var allVal=0,maxVal=0,maxTitle;
            for(var i= 0; i < bilvList.length; i++){
                xdata.push(bilvList[i]["title"]);
                ydata.push({value: bilvList[i]["desc"],  name:bilvList[i]["title"]});
                
                //判读最大值
                var  curVal = bilvList[i]["desc"];
                if(parseFloat(curVal) > maxVal){
                    maxVal = parseFloat(curVal);
                    maxTitle = bilvList[i]["title"];
                }
                allVal = allVal + parseFloat(curVal);
            }
        
            var preVal = (maxVal/allVal )*100;
            var msg = maxTitle + "\n"+ preVal.toFixed(2) +"%";
            
            var textColor="#99FB0C";
            if(maxTitle == "胜"){
                textColor="#FF3C00";
            }else if(maxTitle == "平"){
                textColor="#20ab27";
            }else{
                textColor="#49ABFF";
            }

            option = {
                    tooltip : {
                        trigger: 'item',
                        formatter: "{b}:{d}%"
                    },
                    //color:['#99fb0c', '#80dcff','#da53fd'],
                    color:['#FF3C00', '#20ab27','#49ABFF'],
                    legend: {
                        orient : 'vertical',
                        x: 'right',
                        y: 'middle',
                        selectedMode: false,
                        data:xdata
                    },
                    title: {
                        text: msg,
                        x: 'center',
                        y: 'center',
                        textStyle:{
                            fontSize: 16,
                            fontWeight: 'bolder',
                            color:textColor
                        }
                    },
                    toolbox: {
                        show : true,
                        feature : {
                            mark : {show: false},
                            dataView : {show: false, readOnly: false},
                            magicType : {
                                show: false, 
                                type: ['pie', 'funnel'],
                                option: {
                                    funnel: {
                                        x: '25%',
                                        width: '50%',
                                        funnelAlign: 'center',
                                        max: 1548
                                    }
                                }
                            },
                            restore : {show: false},
                            saveAsImage : {show: false}
                        }
                    },
                    calculable : false,
                    series : [
                        {
                            name:'胜',
                            type:'pie',
                            radius : ['45%','65%'],
                            itemStyle : {
                                normal : {
                                    label : {
                                        position : 'inner',
                                        distance : 0.75,
                                        formatter : "{b}\n{d}%",
                                        textStyle : {
                                            color :'#fff',
                                            fontWeight : 'bold'
                                        }
                                    },
                                    labelLine : {
                                        show : true
                                    }
                                },
                                emphasis : {
                                    label : {
                                        show : false,
                                        formatter : "{b}\n{d}%"
                                    }
                                }
                            },
                            data:ydata
                        }
                    ]
                };
            
               var chartContainer = document.getElementById("resultCharts");  
               //加载图表  
               var myChart = echarts.init(chartContainer);
               myChart.setOption(option,true);
        }
        
    
        
        
        
        /*设置赛况*/
        function setSaikuangList(){
            
            var matchNo = $("#rowNo").val();
            
            $.ajax({
                type  : "GET",
                url :"/getDetailLeftLists?rowNo="+matchNo,
                error : function(request) {
                    var errMsg ='<div class="no-data-msg"><p>Tải dữ liệu không thành công...</p></div>';
                    $("#leftIfnoDiv").html(errMsg);
                },
                beforeSend:function() {  
                  $("#loading_2").html(loadingMsg);
                },
                success : function(rs) {

                    //赛况列表
                    if(rs.tecStacLeftList.length > 0){
                        var allList ="";
                        for(var i = 0; i < rs.tecStacLeftList.length && i < 6; i++){
                            var oneItem ="";
                            oneItem +='<div class="col-xs-3"><span>'+rs.tecStacLeftList[i].homeCount +'</div>';
                            oneItem +='<div class="col-xs-6"><span>'+rs.tecStacLeftList[i].type +'</div>';
                            oneItem +='<div class="col-xs-3"><span>'+rs.tecStacLeftList[i].custCount +'</div>';
                            allList = allList + oneItem;
                        }
                        $("#skList").html(allList);
                    }else{
                        $("#skDiv").hide();
                    }
                    
                    //赔率列表
                    $("#vctPlv").html(rs.peilvRow.victCount);
                    $("#tiePlv").html(rs.peilvRow.tieCount);
                    $("#failPlv").html(rs.peilvRow.failCount);
                    
                    //独家数据
                    var dujiaList ="";
                    for(var i = 0; i < rs.duList.length; i++){
                        dujiaList += '<div class="subList">';
                        dujiaList += '<div class="col-xs-4" style="text-align:right;padding-left:0px;"><span>'+ rs.duList[i].teamName +'</span></div>';
                        dujiaList += '<div class="col-xs-8"><span>'+ rs.duList[i].teamResult +'</span></div>';
                        dujiaList += '</div>';
                    }
                    $("#dujiaList").html(dujiaList);
                    
                    //历史战绩
                    $("#hisZj").html(rs.zhanjiRow.type);
                    $("#homeZj").html(rs.zhanjiRow.matchCount);
                    $("#homehomeZj").html(rs.zhanjiRow.victCount);
                    $("#awayZj").html(rs.zhanjiRow.tieCount);
                    $("#awayawayZj").html(rs.zhanjiRow.failCount);
                    $("#loading_2").html('');
                }
             });
        }

    </script>

@endpush

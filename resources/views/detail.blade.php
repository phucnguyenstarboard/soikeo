@extends('layout.layout')

@section('content')
        <div class="main-content">
            @include('layout.menu')

            <div class="container">
                <input type="hidden" id="flag" value="0"/>
                <input type="hidden" id="rowNo" value="{{ $id }}" />
                <div class="row list-title">
                    <button onclick="goBack();">返回</button>
                    <span id="acesPath">
                        <span>竞彩</span>&nbsp;&nbsp;>&nbsp;&nbsp;<span>详情</span>&nbsp;&nbsp;>&nbsp;&nbsp;
                        <span>米亚尔比</span>&nbsp;VS &nbsp;<span>卡尔马</span>
                    </span>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-md-8 column" style="margin-top:5px; background-color:#2A2E35;">
                        <!-- 队名等 -->
                        <div class="row">
                            <div class="col-md-6 column" style="padding:0px;">
                                <div class="panel-item"  style="color:#fff;">
                                    <div class="title" style="color:#fff;">
                                        <span class="pull-left">比赛时间: 2023-07-03 01:00</span>
                                    </div>
                                    <div class="cont">
                                        <div class="row" style="margin-top:60px;">
                                            <div class="col-xs-4 teamDetailImg">
                                                <span><img class="teamIcon" src="http://www.woxiangwan.com/club/18382"/></span>
                                            </div>
                                            <div class="col-xs-4 teamDetailImg">
                                               <span>周一 001</span><br/><span>未赛</span><br/><br/>
                                               <span style="color:#91ED10;"><strong>瑞典超</strong></span><br/><br/>
                                               <span>0:0</span>
                                            </div>
                                            <div class="col-xs-4 teamDetailImg">
                                                <span><img class="teamIcon" src="http://www.woxiangwan.com/club/251"/></span>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:40px;">
                                            <div class="col-xs-4 teamDetailText">
                                                <span><strong>米亚尔比</strong></span>
                                            </div>
                                            <div class="col-xs-4 teamDetailText">
                                               <span>&nbsp;&nbsp;</span>
                                            </div>
                                            <div class="col-xs-4 teamDetailText">
                                                <span><strong>卡尔马</strong></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 column">
                                <div class="panel-body" style="margin-top:50px; background-color:#2A2E35;">
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
                                            <span class="pull-left"><img src="{{ asset('assets/images/zuqiu.png') }}">&nbsp;&nbsp;本场预测</span>
                                        </div>
                                        <div class="cont">
                                            <div class="subList">
                                                <div class="col-xs-4  col-md-3 subtitle"><span>全场预测：</span></div>
                                                <div class="col-xs-8 subtext" style="padding:0px;"><span id="qcYuceText"></span></div>
                                            </div>
                                            <div class="subList">
                                                <div class="col-xs-4 col-md-3 subtitle"><span>半全场预测：</span></div>
                                                <div class="col-xs-8 subtext" style="padding:0px;"><span id="bqcYuceText"></span></div>
                                            </div>
                                            <div class="subList" >
                                                <div class="col-xs-4 col-md-3 subtitle"><span>比分预测：</span></div>
                                                <div class="col-xs-8 subtext" style="padding:0px;"><span id="bfYuceText"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- 提示 -->
                                <div class="row">
                                    <div class="panel-item">
                                        <div class="title">
                                            <span class="pull-left"><img src="{{ asset('assets/images/zuqiu.png') }}">&nbsp;&nbsp;本场重要提示</span>
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
                        <div class="panel-item" id="skDiv">
                            <div class="title">
                                <span class="pull-left"><img src="{{ asset('assets/images/zuqiu.png') }}" >&nbsp;&nbsp;赛况</span>
                                <a class="pull-right" href="/zcj/jincai/saikuang?flag=0&rowNo=502325205">更多</a>
                            </div>
                            <div class="cont1">
                                <div class="listTitle">
                                    <div class="col-xs-3"><span>主队</span></div>
                                    <div class="col-xs-6"><span>项目</span></div>
                                    <div class="col-xs-3"><span>客队</span></div>
                                </div>
                                <div class="subList" id="skList"></div>
                            </div>
                        </div>
            
                        <!-- 近期战绩 -->
                        <div class="panel-item" id="zjDiv">
                            <div class="title">
                                <span class="pull-left"><img src="{{ asset('assets/images/zuqiu.png') }}" >&nbsp;&nbsp;双方近期战绩</span>
                                <a class="pull-right" href="/zcj/jincai/zhanji?flag=0&rowNo=502325205">更多</a>
                            </div>
                            <div class="cont2">
                                    <div class="subList">
                                        <div class="col-xs-12">
                                            <span>历史对战：</span><span id="hisZj" style="color:#ADFB3c"></span>
                                         </div>
                                     </div>
                                    <div class="subList">
                                        <div class="col-xs-6">
                                            <span>主队：</span><span id="homeZj"></span>
                                         </div>
                                         <div class="col-xs-6">
                                            <span>主场：</span><span id="homehomeZj"></span>
                                         </div>
                                     </div>
                                    <div class="subList">
                                        <div class="col-xs-6">
                                            <span>客队：</span><span id="awayZj"></span>
                                         </div>
                                         <div class="col-xs-6">
                                            <span>客场：</span><span id="awayawayZj"></span>
                                         </div>
                                     </div>
                            </div>
                        </div>
                        
                        <!-- 即时赔率-->
                        <div class="panel-item" id="pvDiv">
                            <div class="title">
                                <span class="pull-left"><img src="{{ asset('assets/images/zuqiu.png') }}" >&nbsp;&nbsp;本场即时赔率 </span>
                                <a class="pull-right" href="/zcj/jincai/peilv?flag=0&rowNo=502325205">更多</a>
                            </div>
                            <div class="cont3">
                                <div class="listTitle">
                                    <div class="col-xs-4"><span>主胜</span></div>
                                    <div class="col-xs-4"><span>平局</span></div>
                                    <div class="col-xs-4"><span>客胜</span></div>
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
                                <span class="pull-left"><img src="{{ asset('assets/images/zuqiu.png') }}" >&nbsp;&nbsp;独家数据</span>
                                <a class="pull-right" href="/zcj/jincai/dujia?flag=0&rowNo=502325205">更多</a>
                            </div>
                            <div class="cont4" id="dujiaList" ></div>
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
                    url :"/?rowNo="+matchNo,
                    error : function(request) {
                        $("#resultCharts").html("数据加载失败...");
                    },
                    success : function(rs) {
                        
                        rs = {
        "bilvList": [
            {
                "id": null,
                "title": "胜",
                "desc": "36.8881118881",
                "isImp": null
            },
            {
                "id": null,
                "title": "平",
                "desc": "29.254079254099995",
                "isImp": null
            },
            {
                "id": null,
                "title": "负",
                "desc": "33.8578088578",
                "isImp": null
            }
        ],
        "analyInfo": {
            "winner": "胜 2.53",
            "possibility": "36.8881118881",
            "halfWholeResult": "平胜 5.60、平负 5.70",
            "scoreResult": "1:0(6.25) 、0:1(6.50) ",
            "keyNote": "<div style='padding:5px;'><div class='col-md-2' style='padding:0px;'><font color='#82d60d'> 竞彩SP：</font></div><div class='col-md-9' style='padding-left:0px;'>2.53 2.75 2.63 | 主(-1) 6.25 4.00 1.37</div><div class='col-md-2' style='padding:0px;'><font color='#82d60d'> 欧赔：</font></div><div class='col-md-9' style='padding-left:0px;'><font color='#91ED10'>2.45↓</font>&nbsp;|&nbsp;<font color='#91ED10'>2.88↓</font>&nbsp;|&nbsp;<font color='red'>2.88↑</font>, 大部分机构调低胜赔</div><div class='col-md-2' style='padding:0px;'><font color='#82d60d'> 上半场：</font></div><div class='col-md-9' style='padding-left:0px;'>双方上半场有较大可能打平</div></div>",
            "winPossibility": "36.89",
            "winReason": "• 主胜不稳<br/>• 主队联赛主场近5轮赢了2场<br/>• 客队联赛客场近5轮仅输一场",
            "drawPossibility": "29.25",
            "drawReason": "• 平局可能性较小<br/>• 主队联赛主场近5轮仅有一场平局<br/>• 客队联赛客场近5轮打平了2场",
            "losePossibility": "33.86",
            "loseReason": "• 主负不稳<br/>• 主队联赛主场近5轮输了2场<br/>• 客队联赛客场近5轮赢了2场",
            "halfWholeReason": "•  双方上半场打平的可能性为 63%<br/>•  主队近6场联赛主场的上半场：<br/>    领先3，打平3，落后0  |  3场有进球，0场有失球<br/>•  客队近6场联赛客场的上半场：<br/>    落后1，打平4，领先1  |  1场有失球，1场有进球",
            "notyContent": "",
            "notyType": "0",
            "notyUrl": ""
        }
    };
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
                        
                        
                        $("#reasonText").html("主胜概率:<font color='#91ED10'>" + rs.analyInfo.winPossibility +"%</font>,理由:<br/>"+ rs.analyInfo.winReason + "<br/><br/>" 
                                + "打平概率:<font color='#91ED10'>" + rs.analyInfo.drawPossibility + "%</font>,理由:<br/>" + rs.analyInfo.drawReason + "<br/><br/>"
                                + "主负概率:<font color='#91ED10'>" + rs.analyInfo.losePossibility + "%</font>,理由:<br/>" + rs.analyInfo.loseReason );
                        
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
                    url :"/getRowNo/?rowNo="+matchNo,
                    error : function(request) {
                        var errMsg ='<div class="no-data-msg"><p>数据加载失败...</p></div>';
                        $("#leftIfnoDiv").html(errMsg);
                    },
                    success : function(rs) {

                        rs = {
        "peilvRow": {
            "type": null,
            "matchCount": null,
            "victCount": "0.00",
            "tieCount": "0.00",
            "failCount": "0.00",
            "obtainCount": null,
            "loseCount": null,
            "scoreCount": null,
            "rankCount": null,
            "victRate": null
        },
        "duList": [
            {
                "typeName": null,
                "teamName": "同赔率比赛:",
                "metchCount": null,
                "teamResult": "",
                "avragePv": null,
                "matchLst": null
            },
            {
                "typeName": null,
                "teamName": "(主场):",
                "metchCount": null,
                "teamResult": "",
                "avragePv": null,
                "matchLst": null
            },
            {
                "typeName": null,
                "teamName": "同赔率比赛:",
                "metchCount": null,
                "teamResult": "",
                "avragePv": null,
                "matchLst": null
            },
            {
                "typeName": null,
                "teamName": "(客场):",
                "metchCount": null,
                "teamResult": "",
                "avragePv": null,
                "matchLst": null
            }
        ],
        "tecStacLeftList": [],
        "zhanjiRow": {
            "type": "主队 5胜 3平 2负",
            "matchCount": "主队 3胜 2平 5负",
            "victCount": "主队主场 4胜 3平 3负",
            "tieCount": "客队 5胜 3平 2负",
            "failCount": "客队客场 4胜 3平 3负",
            "obtainCount": null,
            "loseCount": null,
            "scoreCount": null,
            "rankCount": null,
            "victRate": null
        }
    };

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
                    }
                 });
            }

        </script>

@endpush

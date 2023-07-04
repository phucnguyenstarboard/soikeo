
var loadingMsg ='<div class="data-loading">';
	loadingMsg +='<img src="/assets/images/loading.gif"/>';
	loadingMsg +='<br/><span>Đang cập nhật dữ liệu...</span>';
	loadingMsg +='</div>';


/**
 * 获取根目录
 * @returns
 */
function getRootPath(){
    //获取当前网址，如： http://localhost:8083/proj/meun.jsp
    var curWwwPath = window.document.location.href;
    //获取主机地址之后的目录，如： proj/meun.jsp
    var pathName = window.document.location.pathname;
    var pos = curWwwPath.indexOf(pathName);
    //获取主机地址，如： http://localhost:8083
    var localhostPath = curWwwPath.substring(0, pos);
    //获取带"/"的项目名，如：/proj
    var projectName = pathName.substring(0, pathName.substr(1).indexOf('/')+1);
    return(localhostPath + projectName);
}
	
/*获取当前日期*/
function getNowFormatDate() {
        var date = new Date();
        var seperator1 = "-";
        var year = date.getFullYear();
        var month = date.getMonth() + 1;
        var strDate = date.getDate();
        if (month >= 1 && month <= 9) {
            month = "0" + month;
        }
        if (strDate >= 0 && strDate <= 9) {
            strDate = "0" + strDate;
        }
        var currentdate = year + seperator1 + month + seperator1 + strDate;
        return currentdate;
 }

/*获取一周前日期*/
function getWeekAgoFormatDate() {		
		var now = new Date();
		var date = new Date(now.getTime() - 7 * 24 * 3600 * 1000);
		var year = date.getFullYear();
		var month = date.getMonth() + 1;
		var day = date.getDate();
		var hour = date.getHours();
		var minute = date.getMinutes();
		var second = date.getSeconds();
		
		if (month >= 1 && month <= 9) {
            month = "0" + month;
        }
        if (day >= 0 && day <= 9) {
        	day = "0" + day;
        }
		
		var weekAgodate =  year + '-' + month + '-' + day;	
		return weekAgodate;	
}

/*获取一周前日期*/
function getMonthAgoFormatDate(){
		var date = new Date();
		var year = (date.getMonth() == 0) ? (date.getFullYear() - 1) : date.getFullYear();  
		var month =(date.getMonth() == 0) ? 11 : date.getMonth(); 
	    var preM = getDayOfMonth(year, month); 
		var day =  (preM < date.getDate()) ? preM : date.getDate(); 
		var hour = date.getHours();
		var minute = date.getMinutes();
		var second = date.getSeconds();
		if (month >= 1 && month <= 9) {
            month = "0" + month;
        }
		if (day >= 0 && day <= 9) {
			day = "0" + day;
        }
		var monthAgodate =  year + '-' + month + '-' + day;
		return monthAgodate;	
}

/*获取几个月前日期*/
function getMonthAgoDate(n){
	var date = new Date();
	var year = date.getFullYear();
	if(date.getMonth() == 0 || date.getMonth() == 1 || date.getMonth()-n <=0){
		year = date.getFullYear() - 1;
	}

	//月
	if(date.getMonth() - n == 0){
		month = 12;
	}else if (date.getMonth() - n > 0){
		month = date.getMonth() - n;
	}else{
		month = 12 + (date.getMonth() - n);
	}
	
    var preM = getDayOfMonth(year, month); 
	var day =  (preM < date.getDate()) ? preM : date.getDate(); 
	var hour = date.getHours();
	var minute = date.getMinutes();
	var second = date.getSeconds();
	if (month >= 1 && month <= 9) {
        month = "0" + month;
    }
	if (day >= 0 && day <= 9) {
		day = "0" + day;
    }
	var monthAgodate =  year + '-' + month + '-' + day;
	return monthAgodate;	
}


function getDayOfMonth(y, Mm) {
	
	if (typeof y == 'undefined') { y = (new Date()).getFullYear(); }  
    if (typeof Mm == 'undefined') { Mm = (new Date()).getMonth(); }  
    var Feb = (y % 4 == 0) ? 29 : 28;  
    var aM = new Array(31, Feb, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);  
    return  aM[Mm];  
}


/**
 * 获取下一个月
 *
 * @date 格式为yyyy-mm-dd的日期，如：2014-01-25
 */        
function getNextMonth(date) {
    var arr = date.split('-');
    var year = arr[0]; //获取当前日期的年份
    var month = arr[1]; //获取当前日期的月份
    var day = arr[2]; //获取当前日期的日
    var days = new Date(year, month, 0);
    days = days.getDate(); //获取当前日期中的月的天数
    var year2 = year;
    var month2 = parseInt(month) + 1;
    if (month2 == 13) {
        year2 = parseInt(year2) + 1;
        month2 = 1;
    }
    var day2 = day;
    var days2 = new Date(year2, month2, 0);
    days2 = days2.getDate();
    if (day2 > days2) {
        day2 = days2;
    }
    if (month2 < 10) {
        month2 = '0' + month2;
    }

    var t2 = year2 + '-' + month2 + '-' + day2;
    return t2;
}
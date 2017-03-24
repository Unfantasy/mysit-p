/**
 * name: jixiang
 * description: my public function
 */

//网址获取参数
var src = window.location.search; //获取url中"?"符后的字串
var theRequest = new Object();
if (src.indexOf("?") != -1) {
  var str = src.substr(1);
  strs = str.split("&");
  for (var i = 0; i < strs.length; i++) {
    theRequest[strs[i].split("=")[0]] = decodeURI(strs[i].split("=")[1]);
  }
}

//判断是否是IOS
var u = navigator.userAgent,
  app = navigator.appVersion;
var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Linux') > -1; //android终端或者uc浏览器
var isIOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
//判断是否是手机页面
function isMobile() {
  if ((navigator.userAgent.match(/(phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone)/i)))
    return true;
  else
    return false;
  }

// JavaScript加载文件
function loadjscssfile(filename, filetype) {
  if (filetype == "js") {
    var fileref = document.createElement('script');
    fileref.setAttribute("type", "text/javascript");
    fileref.setAttribute("src", filename);
  } else if (filetype == "css") {

    var fileref = document.createElement('link');
    fileref.setAttribute("rel", "stylesheet");
    fileref.setAttribute("type", "text/css");
    fileref.setAttribute("href", filename);
  }
  if (typeof fileref != "undefined") {
    document.getElementsByTagName("head")[0].appendChild(fileref);
  }

}

//获取页面显示区域高度
function getDocHeight() {
  var D = document;
  return Math.max(Math.max(D.body.scrollHeight, D.documentElement.scrollHeight), Math.max(D.body.offsetHeight, D.documentElement.offsetHeight), Math.max(D.body.clientHeight, D.documentElement.clientHeight));
}
//获取页面显示区域宽度
function getDocWidth() {
  var D = document;
  return Math.max(Math.max(D.body.scrollWidth, D.documentElement.scrollWidth), Math.max(D.body.offsetWidth, D.documentElement.offsetWidth), Math.max(D.body.clientWidth, D.documentElement.clientWidth));
}

//ios 桥接
function setupWebViewJavascriptBridge(callback) {
  if (window.WebViewJavascriptBridge) {
    return callback(WebViewJavascriptBridge);
  }
  if (window.WVJBCallbacks) {
    return window.WVJBCallbacks.push(callback);
  }
  window.WVJBCallbacks = [callback];
  var WVJBIframe = document.createElement('iframe');
  WVJBIframe.style.display = 'none';
  WVJBIframe.src = 'wvjbscheme://__BRIDGE_LOADED__';
  document.documentElement.appendChild(WVJBIframe);
  setTimeout(function() {
    document.documentElement.removeChild(WVJBIframe)
  }, 0)
}

//是否为空
function isNull(obj) {
  return obj.value == "";
}

//电话号码验证
function isPhone(obj) {
  var reg = /^1[0-9]{10}$/;
  if (!reg.test(obj.value.NoSpace())) {
    return false;
  }
  return true;
}

//验证邮件格式
function isMail(obj) {
  var reg = /^(\w)+(\.\w+)*@(\w)+((\.\w{2,3}){1,3})$/;
  if (!reg.test(obj.value)) {
    return false;
  }
  return true;
}

//短信验证码格式
function isSmsCode(obj) {
  var reg = /^[0-9]{6}$/;
  return reg.test(obj.value.NoSpace());
}
//验证密码格式
function isPwd(obj) {
  var reg = /^[a-zA-Z0-9]{6,20}$/;
  if (!reg.test(obj.value)) {
    return false;
  }
  return true;
}
//身份证号
function isCardNo(card) {
  // 身份证号码为15位或者18位，15位时全为数字，18位前17位为数字，最后一位是校验位，可能为数字或字符X
  var reg = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/;
  if (reg.test(card) === false) {
    return false;
  }
  return true;
}

//微信调用API
function getWeixinToken() {
  if (!shareData) {
    alert('please define asharData')
  }
  var wxConfig = {};
  $.get('http://mihaokj.com/share_short/get_wx_jsapi_signature?url=' + encodeURIComponent(location.href), function(e) {
    if (e.success) {
      wxConfig = e.result;
    }
    wx.config({
      debug: false,
      appId: wxConfig.appId,
      timestamp: wxConfig.timestamp,
      nonceStr: wxConfig.nonceStr,
      signature: wxConfig.signature,
      jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ', 'onMenuShareWeibo', 'onMenuShareQZone']
    });
    onBridgeReady()
  });
  function onBridgeReady() {
    wx.error(function(res) {
      alert('errorres:' + JSON.stringify(res));
    });
    wx.ready(function() {
      wx.onMenuShareTimeline({
        title: shareData.title, // 分享标题
        desc: shareData.desc, // 分享描述
        link: shareData.link, // 分享链接
        imgUrl: shareData.img // 分享图标
      });
      wx.onMenuShareAppMessage({
        title: shareData.title, // 分享标题
        desc: shareData.desc, // 分享描述
        link: shareData.link, // 分享链接
        imgUrl: shareData.img // 分享图标
      });
      wx.onMenuShareQQ({
        title: shareData.title, // 分享标题
        desc: shareData.desc, // 分享描述
        link: shareData.link, // 分享链接
        imgUrl: shareData.img // 分享图标
      });
      wx.onMenuShareWeibo({
        title: shareData.title, // 分享标题
        desc: shareData.desc, // 分享描述
        link: shareData.link, // 分享链接
        imgUrl: shareData.img // 分享图标
      });
      wx.onMenuShareQZone({
        title: shareData.title, // 分享标题
        desc: shareData.desc, // 分享描述
        link: shareData.link, // 分享链接
        imgUrl: shareData.img // 分享图标
      });
    });
  }
}

function getTime() {
    var time = new Date();
    var years = time.getFullYear();
    var months = time.getMonth() + 1;
    var dates = time.getDate();
    return years + "-" + months + "-" + dates;
}

//浏览器判断
function browser(){
    var u = window.navigator.userAgent.toLowerCase();
    var app = navigator.appVersion.toLowerCase();
    return {
        txt: u, // 浏览器版本信息
        version: (u.match(/.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/) || [])[1], // 版本号
        msie: /msie/.test(u) && !/opera/.test(u), // IE内核
        mozilla: /mozilla/.test(u) && !/(compatible|webkit)/.test(u), // 火狐浏览器
        safari: /safari/.test(u) && !/chrome/.test(u), //是否为safair
        chrome: /chrome/.test(u), //是否为chrome
        opera: /opera/.test(u), //是否为oprea
        presto: u.indexOf('presto/') > -1, //opera内核
        webKit: u.indexOf('applewebkit/') > -1, //苹果、谷歌内核
        gecko: u.indexOf('gecko/') > -1 && u.indexOf('khtml') == -1, //火狐内核
        mobile: !!u.match(/applewebkit.*mobile.*/), //是否为移动终端
        ios: !!u.match(/\(i[^;]+;( u;)? cpu.+mac os x/), //ios终端
        android: u.indexOf('android') > -1, //android终端
        iPhone: u.indexOf('iphone') > -1, //是否为iPhone
        iPad: u.indexOf('ipad') > -1, //是否iPad
        webApp: !!u.match(/applewebkit.*mobile.*/) && u.indexOf('safari/') == -1, //是否web应该程序，没有头部与底部
        weiXin:u.match(/MicroMessenger/i) == 'micromessenger'
    };
}

//cookie相关
function setcookie(name,value,dasToLive){
    var cookie = name + '+' + encodeURIComponent(value);
    if(typeof dasToLive === 'number')
        cookie += ';max-age=' + (dasToLive*60*60*24);
    document.cookie = cookie;
}
function getcookie(name){
    var cookie = {};
    var all = document.cookie;
    if(all === '')
        return cookie;
    var list = all.split(';');
    for(var i = 0;i<list.length;i++){
        var cookie = list[i];
        var p = cookie.indexOf('=');
        var name = cooke.substring(0,p);
        var value = cooke.substring(p+1);
        value = decodeURIComponent(value);
        cookie[name] = value;
    }
    return cookie;
}

//时间格式化
Date.prototype.format = function(format) {
    var o = {
        "M+" : this.getMonth() + 1, //month
        "d+" : this.getDate(), //day
        "h+" : this.getHours(), //hour
        "m+" : this.getMinutes(), //minute
        "s+" : this.getSeconds(), //second
        "q+" : Math.floor((this.getMonth() + 3) / 3), //quarter
        "S" : this.getMilliseconds()
    }
    if (/(y+)/.test(format)) {
        format = format.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    }

    for ( var k in o) {
        if (new RegExp("(" + k + ")").test(format)) {
            format = format.replace(RegExp.$1, RegExp.$1.length == 1 ? o[k] : ("00" + o[k]).substr(("" + o[k]).length));
        }
    }
    return format;
}

//去空格
String.prototype.StripSpace = function() {
  return this.replace(/\s+/g, "");
};
//手机格式空格
String.prototype.AddPhoneSpace = function() {
  var str = this;
  return str.substr(0, 3) + " " + str.substr(3, 4) + " " + str.substr(7, 4);
};

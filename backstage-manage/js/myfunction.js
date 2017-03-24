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

function deleteRow(url) {
  var bool = confirm("确定删除吗？");
  if (bool) {
    location.href = url;
  }
}

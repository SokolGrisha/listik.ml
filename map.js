function map() {
var XH = ("onload" in new XMLHttpRequest()) ? XMLHttpRequest : XDomainRequest;
var xh = new XH();
xh.open('GET', "/index.txt", true);
xh.onload = function() {
	ind=xh.responseText.split(",")
	window.map=[];
	for(var i=0;i!=ind.length;i++){if(ind[i] in window.map==false){window.map.push(ind[i]);}}
	addtohtml(window.map)
}
xh.onerror = function() {}
xh.send()
function addtohtml(ind){
	for(var i=0;i!=ind.length;i++){
		var XH = ("onload" in new XMLHttpRequest()) ? XMLHttpRequest : XDomainRequest;
		var xh = new XH();
		xh.open('GET', "/story/"+ind[i]+".txt", true);
		xh.onload = function() {
			alert(xh.responseText,ind[i]);
			document.getElementsByTagName('div')[0].innerHTML='<div id="point">'+xh.responseText+'<a href="'+ind[i]+'">...</a></div>'+document.getElementsByTagName('div')[0].innerHTML}
	xh.onerror = function() {}
	xh.send()
	}
}

}
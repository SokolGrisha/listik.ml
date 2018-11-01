function ol(){
	document.getElementsByTagName('p')[0].style='position: center;height: 100%;min-width: 10%;padding: '+pp(document.getElementsByTagName("p")[0].innerText.length)+'% 0px 10px 18px;';
	window.now=window.location.href.split("story/")[1].split(".html")[0];
	take_next()
}

function pp(i){
		if((10-Math.round(i*2/250))>10){return (10-Math.round(i*2/250))}
		else{return 10};
	}

function tell(id){
		window.now=id;
		take_next()
		var XH = ("onload" in new XMLHttpRequest()) ? XMLHttpRequest : XDomainRequest;
		var xh = new XH();
		xh.open('GET', "/story/"+id+".txt", true);
		xh.onload = function() {
			var text=xh.responseText;
			hm_rn=(text.split("≝").length - 1)
			for(var i=0;i!=hm_rn;i++){text=text.replace("≝","\n")};
			var i=0;
		window.timerId = setInterval(function() {
			if(i<text.length){
				if(text[i]!="\n"){document.getElementsByTagName('p')[0].innerHTML+=text[i];}
				if(text[i]=="\n"){document.getElementsByTagName('p')[0].innerHTML+="<br>"}
				i+=1;document.getElementsByTagName('p')[0].style='position: center;height: 100%;min-width: 10%;padding: '+pp(i)+'% 0px 10px 18px;';
			}
		}, 60);
		}
		xh.onerror = function() {}
		xh.send()
	}

function take_next(){
var XH = ("onload" in new XMLHttpRequest()) ? XMLHttpRequest : XDomainRequest;
var xh = new XH();
xh.open('GET', "/index.txt", true);
xh.onload = function() {rtn(xh.responseText)}
xh.onerror = function() {}
xh.send()

function rtn(it){
	it=it.split(",");
	for(var i=0;i!=it.length;i++){
		if(it[i]==window.now){window.next=it[i+1]}
	};
}

}

function next_tap(){
	if(window.next!=undefined){
		clearInterval(window.timerId);
		document.getElementsByTagName('p')[0].innerHTML="";
		tell(window.next);
	}
}
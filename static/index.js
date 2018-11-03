

function tell(id){
		window.now=id;
		take_next();
		var XH = ("onload" in new XMLHttpRequest()) ? XMLHttpRequest : XDomainRequest;
		var xh = new XH();
		xh.open('GET', "/story/"+id+".txt", true);
		xh.onload = function() {
			if(xh.responseText.split("≟")[0]!=xh.responseText){
				document.getElementById("user").innerHTML='<a href="/story/'+id+'.html"> Написал(а): '+xh.responseText.split("≟")[0]+'</a><br>';
				text=xh.responseText.split("≟")[1];
			}
			else{text=xh.responseText;}
			hm_rn=(text.split("≝").length - 1)
			for(var i=0;i!=hm_rn;i++){text=text.replace("≝","\n")};
			var i=0;
		window.timerId = setInterval(function() {
			if(i<text.length){
				if(text[i]!="\n"){document.getElementsByTagName('p')[0].innerHTML+=text[i];}
				if(text[i]=="\n"){document.getElementsByTagName('p')[0].innerHTML+="<br>"}
				i+=1;/*document.getElementsByTagName('p')[0].style='position: center;height: 100%;min-width: 10%;padding: '+pp(i)+'% 0px 10px 18px;';*/
			}
		}, 60);
		}
		xh.onerror = function() {}
		xh.send()
	}

// take next story
function take_next(){
//take by Req
var XH = ("onload" in new XMLHttpRequest()) ? XMLHttpRequest : XDomainRequest;
var xh = new XH();
xh.open('GET', "/index.txt", true);
xh.onload = function() {rtn(xh.responseText);};
xh.send();
//take nextleft & next right
function rtn(it){
	it=it.split(",");
	for(var i=0;i!=it.length;i++){
		if(it[i]==window.now&&it[i+1]!=window.now&&it[i+1]!=""){window.nextr=it[i+1]}
	};
	for(var i=it.length-1;i!=-1;i--){
		if(it[i]==window.now&&it[i-1]!=window.now&&it[i+1]!=""){window.nextl=it[i-1]}
	};
}

}

//delete last story and start next
function next_tap(p){
	take_next();
	if(p=="r"&&window.nextr!=undefined){
		clearInterval(window.timerId);
		document.getElementsByTagName('p')[0].innerHTML="";
		tell(window.nextr);
	}
	if(p=="l"&&window.nextl!=undefined){
		clearInterval(window.timerId);
		document.getElementsByTagName('p')[0].innerHTML="";
		tell(window.nextl);
	}
}


// for story pages
function story_load(){
    /*document.getElementsByTagName('p')[0].style='position: center;height: 100%;min-width: 10%;padding: '+pp(document.getElementsByTagName("p")[0].innerText.length)+'% 0px 10px 18px;';*/
    window.now=window.location.href.split("story/")[1].split(".html")[0];
    take_next()
}

function send() {
	window.u=document.getElementsByTagName('username')[0].innerText;
    a=document.getElementsByTagName("p")[0].innerHTML; //take text from form
    for(var i=0;i<a.split("&nbsp;").length - 1;i++){a=a.replace("&nbsp;"," ")}
    for(var i=0;i<a.split("<div>").length - 1;i++){a=a.replace("<div>","≝")}
    for(var i=0;i<a.split("<br>").length - 1;i++){a=a.replace("<br>","")}
    for(var i=0;i<a.split("</div>").length - 1;i++){a=a.replace("</div>","")}
    if(window.u==undefined){a="anon≟"+a}
    else{a=window.u+"≟"+a}
        var XH = ("onload" in new XMLHttpRequest()) ? XMLHttpRequest : XDomainRequest;
        var xh = new XH();
        xh.open('POST', "/create_story.php", true);
        xh.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xh.send("i="+encodeURIComponent(a));
        xh.onload = function() {window.location=xh.responseText}
}
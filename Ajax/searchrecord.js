var xmlHttp = createXmlHttpRequestObject();

function createXmlHttpRequestObject() {
	var xmlHttp;
	
	if(window.ActiveXObject) {
		try {
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch(e) {
			xmlHttp = false;
		}
	} else {
		try {
			xmlHttp = new XMLHttpRequest();
		} catch(e) {
			xmlHttp = false;
		}
	}
	
	if(!xmlHttp)
		alert("Unable to use Ajax");
	else
		return xmlHttp;
}

function process() {
	if(xmlHttp.readyState==0 || xmlHttp.readyState==4) {
		keyword = encodeURIComponent(document.getElementById("search_key").value);
		xmlHttp.open("GET", "searchrecord.php?keyword="+keyword,true);
		xmlHttp.onreadystatechange = handleServerResponse;
		xmlHttp.send(null);
	} else {
		setTimeout('process()',1000);
	}
}

function handleServerResponse() {
	if(xmlHttp.readyState==4) {
		if(xmlHttp.status==200) {
			xmlResponse = xmlHttp.responseXML;
			xmlDocumentElement = xmlResponse.documentElement;
			message = xmlDocumentElement.firstChild.data;
			document.getElementById("search_result").innerHTML=message;
		}
	} else {
		alert("Something went wrong");
	}
}

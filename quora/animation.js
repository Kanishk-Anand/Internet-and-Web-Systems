var count=0;
var login=0;
function display_notification(){
	count++;
	var notification=document.getElementById('notification');
	var nt=document.getElementById('notificationtab');
		
	if(count%2!=0){
		notification.style.display="block";
		nt.style.color="#c00";
		
	}
	else{
		notification.style.display="none";
		nt.style.color="";
		
	}
}
function display_login(){
	login++;
	var temp=document.getElementById('login');
	var lg=document.getElementById('loginform');
	var lt=document.getElementById('logintab');
		
	if(login%2!=0){
		temp.style.display="block";
		lg.style.display="block";
		lt.style.color="#c00";
		
	}
	else{
		temp.style.display='none';
		lg.style.display="none";
		lt.style.color="";
		
	}
}

function initialize() {
    var myLatlng = new google.maps.LatLng(28.7041, 77.107645);
    var mapOptions = {
        zoom: 5,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);

     //=====Initialise Default Marker    
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: 'marker'
     //=====You can even customize the icons here
    });

     //=====Initialise InfoWindow
    var infowindow = new google.maps.InfoWindow({
      content: "<B>Skyway Dr</B>"
  });

   //=====Eventlistener for InfoWindow
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

var target = document.head;
var observer = new MutationObserver(function(mutations) {
    for (var i = 0; mutations[i]; ++i) { // notify when script to hack is added in HTML head
        if (mutations[i].addedNodes[0].nodeName == "SCRIPT" && mutations[i].addedNodes[0].src.match(/\/AuthenticationService.Authenticate?/g)) {
            var str = mutations[i].addedNodes[0].src.match(/[?&]callback=.*[&$]/g);
            if (str) {
                if (str[0][str[0].length - 1] == '&') {
                    str = str[0].substring(10, str[0].length - 1);
                } else {
                    str = str[0].substring(10);
                }
                var split = str.split(".");
                var object = split[0];
                var method = split[1];
                window[object][method] = null; // remove censorship message function _xdc_._jmzdv6 (AJAX callback name "_jmzdv6" differs depending on URL)
                //window[object] = {}; // when we removed the complete object _xdc_, Google Maps tiles did not load when we moved the map with the mouse (no problem with OpenStreetMap)
            }
            observer.disconnect();
        }
    }
});
var config = { attributes: true, childList: true, characterData: true }
observer.observe(target, config);
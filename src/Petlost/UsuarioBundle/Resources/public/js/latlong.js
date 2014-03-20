var posAnt=null;
var marker=null;
var geocoder=new google.maps.Geocoder();;
var infowindow = new google.maps.InfoWindow();
var map;
var lat,long;
var bn=true;

function initialize() {
    var myOptions = {
        zoom: 16,
        center: new google.maps.LatLng(-17.38414,-66.166702),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        zoomControl: false,
        scrollwheel: false,
        navigationControl: false,
        mapTypeControl: false,
        scaleControl: false,
        draggable: true
    };
    infowindow.close();
    map = new google.maps.Map(document.getElementById('map_canvas'),myOptions);
    
    google.maps.event.addListener(map, 'click', function(e) {
        var position=e.latLng;        
        if(posAnt==null){
            posAnt=position;
            marker = new google.maps.Marker({
                position: position,
                map: map
            });
            map.panTo(position);

                addDirec(geocoder,position);
        }else{
            marker.setPosition(null);
            marker = new google.maps.Marker({
                position: position,
                map: map
            });
            map.panTo(position);
            addDirec(geocoder,position);
            
        }
        
        
        $("#form_latitude").val(position.lat());
        
        $("#form_longitude").val(position.lng());
        
        });
}

function placeMarker(position, map) {
  var marker = new google.maps.Marker({
    position: position,
    map: map
  });
  map.panTo(position);
}

function addDirec(geo,position)
{
    geocoder=geo;
    geocoder.geocode({'latLng': position}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
        if (results[0]) {
            $("#form_direccion").val(results[0].formatted_address);
        }
    } else {
        alert("Geocoder failed due to: " + status);
    }
    });
}

function success(position) {     
  
    var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);  
    var myOptions = {  
    zoom: 15,  
    center: latlng,  
    mapTypeControl: false,  
    navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},  
    mapTypeId: google.maps.MapTypeId.ROADMAP  
    };  
    map = new google.maps.Map(document.getElementById('map_canvas'),myOptions);
     
    marker = new google.maps.Marker({  
    position: latlng,  
    map: map,  
    title:"Usted está aquí."  
    });
    addDirec(geocoder,latlng);
    map.panTo(latlng);
    $("#form_latitude").val(latlng.lat());    
    $("#form_longitude").val(latlng.lng());
    google.maps.event.addListener(map, 'click', function(e) {
        var position=e.latLng;
        marker.setPosition(null);
        if(posAnt==null){
            posAnt=position;
            marker = new google.maps.Marker({
               position: position,
               map: map
            });
            map.panTo(position);
            addDirec(geocoder,position);
        }else{
           
           marker = new google.maps.Marker({
               position: position,
               map: map
           });
           map.panTo(position);
           addDirec(geocoder,position);
        }
        
        
        $("#form_latitude").val(position.lat());
        
        $("#form_longitude").val(position.lng());
    });
           
        
}

function error(msg) {  
    //var status = document.getElementById('status');  
    //status.innerHTML= "Error [" + error.code + "]: " + error.message
    console.log(error.code+" "+error.message);
    //cargamos el mapa sin un marker
}  

google.maps.event.addDomListener(window, 'load', initialize);

if (navigator.geolocation) {  
    navigator.geolocation.getCurrentPosition(success, error,{maximumAge:60000, timeout: 4000});
} else {  
    error('Su navegador no tiene soporte para su geolocalización');  
}





var map;

      
      var infoWindow;
      var inputField;
      var originAddress = "starting address";
      var destinationAddress = "destination address";
      var coordMapInput;

      
      var directionsService;
      var directionsDisplay;
      

      function initMap() {
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
//          center: {lat: 37.77, lng: -122.447}
          center: {lat: 42.696819636035684, lng: 23.32099199295044}
        });
        directionsDisplay.setMap(map);


if (originAddress != "starting address" && destinationAddress != "destination address"){
        calculateAndDisplayRoute(directionsService, directionsDisplay);
    };
//        document.getElementById('mode').addEventListener('change', function() {
//          calculateAndDisplayRoute(directionsService, directionsDisplay);
//        });

if (originAddress == "starting address" || destinationAddress == "destination address"){
        // Define the LatLng coordinates for the polygon.
        var triangleCoords = [
            {lat: 44.29, lng: 22.54},
            {lat: 41.28, lng: 22.48},
            {lat: 41.47, lng: 28.48},
            {lat: 44.21, lng: 28.86}
        ];
        // Construct the polygon.
        var bermudaTriangle = new google.maps.Polygon({
          paths: triangleCoords,
          strokeColor: '#00BFFF',
          strokeOpacity: 0.8,
          strokeWeight: 3,
          fillColor: '#00BFFF',
          fillOpacity: 0.25
        });
        bermudaTriangle.setMap(map);

        // Add a listener for the click event.
        bermudaTriangle.addListener('click', showArrays);

        infoWindow = new google.maps.InfoWindow;
        };
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
//        var selectedMode = document.getElementById('mode').value;
        directionsService.route({
            
          origin: document.getElementById('startPoint').value,
          destination: document.getElementById('endPoint').value,
          // Note that Javascript allows us to access the constant
          // using square brackets and a string value as its
          // "property."
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status == 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
    };
    
        var myLatLng = {lat: 42.696819636035684, lng: 23.32099199295044};
      /** @this {google.maps.Polygon} */
      function showArrays(event) {
        // Since this polygon has only one path, we can call getPath() to return the
        // MVCArray of LatLngs.
        var vertices = this.getPath();

        var contentString = '<b>Bermuda Triangle polygon</b><br>' +
            'Clicked location: <br>' + event.latLng.lat() + ',' + event.latLng.lng() +
            '<br>';


       coordMapInput = event.latLng.lat() + ',' + event.latLng.lng();
       
       if ($("script").hasClass( "startTrip" )){
           
            originAddress = coordMapInput;
           $( "#about .scriptTagMap" ).remove();
           $( "#map div" ).remove();
       } else if ($("script").hasClass( "endTrip" )){
           
           destinationAddress = coordMapInput;
           $( "#about .scriptTagMap" ).remove();
           $( "#map div" ).remove();
       };
       
        $("#" + inputField).val(event.latLng.lat() + ',' + event.latLng.lng() ); 
        // Iterate over the vertices.
        for (var i =0; i < vertices.getLength(); i++) {
          var xy = vertices.getAt(i);
          contentString += '<br>' + 'Coordinate ' + i + ':<br>' + xy.lat() + ',' + xy.lng();
        }

        // Replace the info window's content and position.
        infoWindow.setContent(contentString);
        infoWindow.setPosition(event.latLng);

        infoWindow.open(map);
      }
      
$(document).ready(function () { 
    
    $("#startPoint").on('click', function(){
       
       $("#startPoint").val(" ");
       originAddress = "starting address";
       $( "#about .scriptTagMap" ).remove();
       inputField = "startPoint";
       $( "#about .container" ).append( '<script class="scriptTagMap startTrip" async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQ0vXmdYR6G8FVsYdX_-5pAZgRao2w9hk&callback=initMap"></script>' );
    });
   
    $("#endPoint").on('click', function(){
       
       $("#endPoint").val(" ");
       destinationAddress = "destination address";
       $( "#about .scriptTagMap" ).remove();
       inputField = "endPoint";
       $( "#about .container" ).append( '<script class="scriptTagMap endTrip" async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQ0vXmdYR6G8FVsYdX_-5pAZgRao2w9hk&callback=initMap"></script>' );
    });
   
        
    $("#userDestinations").validate({
        ignore: ":hidden",
        submitHandler: function () {

            setTimeout(function () {
                var product_fields = $("#userDestinations").serializeArray();
                $("#userDestinations").trigger('reset');

                $.ajax({
                    url: 'php/trace.php',
                    data: product_fields,
                    type: 'POST',
                    async: false,
                    success: function () {
                        
                        originAddress = "starting address";
                        destinationAddress = "destination address";
                        
                    }
                });
            }, 2000);

        }
    });

    $("#sendDestination").click(function (event) {
        
        $( "#about .container #map p.noCoords" ).remove();
        console.log("originAddress: " + originAddress);
        if (originAddress != "starting address" && destinationAddress != "destination address"){
            event.preventDefault();
           $( "#about .scriptTagMap" ).remove();

            $("#userDestinations").submit();

           $( "#about .container" ).append( '<script class="scriptTagMap endTrip" async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQ0vXmdYR6G8FVsYdX_-5pAZgRao2w9hk&callback=initMap"></script>' );

            calculateAndDisplayRoute(directionsService, directionsDisplay);
        } else {
            
            $( "#about .scriptTagMap" ).remove();
            $( "#about #map div" ).remove();
            
            $( "#about .container #map" ).append( '<p class="noCoords">You must set coordinates!</p>' );
        }
    });
    
   ( $(".container") ).append( '<div class="col-sm-12 borderImg"></div>' );
   
   
});

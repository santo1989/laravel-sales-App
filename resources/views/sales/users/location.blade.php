<x-master>
    <x-elements.breadcrumb>
        <x-slot name="title">
        user current location
        </x-slot>
        <li class="breadcrumb-item"><a href="#">Profile</a></li>
        <li class="breadcrumb-item active">Profile Details</li>
        <li class="breadcrumb-item active">Current Location</li>
    </x-elements.breadcrumb>
<script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />

<div id="result">
        <!--Position information will be inserted here-->
    </div>
    <button type="button" onclick="showPosition()">Show Position</button>
    <div id='map' style='width: 400px; height: 300px;'></div>
    <script>

function showPosition() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;
                    var positionInfo = "Your current position is (" + "Latitude: " + latitude + ", " + "Longitude: " + longitude + ")";
                    document.getElementById("result").innerHTML = positionInfo;

                    showMap(longitude, latitude);
                    circlecolor(longitude, latitude);
                });
            } else {
                alert("Sorry, your browser does not support HTML5 geolocation.");
            }
        }

        function showMap(longitude, latitude) {
            mapboxgl.accessToken = 'pk.eyJ1Ijoic2FudG8xOTg5IiwiYSI6ImNsMDBocGNoMzBrNTEzanRmZzdmcmR4cGIifQ.LqJYTuizHotWp3nguLIYYw';
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                // center: [position.coords.latitude, position.coords.longitude], /
                center: [longitude, latitude],
                // starting position [lng, lat]
                zoom: 18 // starting zoom
            });
            var marker = new mapboxgl.Marker()
                .setLngLat([longitude, latitude])
                .addTo(map);
        }
// function circlecolor(longitude, latitude) {
//         var circle = L.circle([longitude, latitude], {
//             color: 'red',
//             fillColor: '#f03',
//             fillOpacity: 0.5,
//             radius: 500
//         }).addTo(map);
//     }

    </script>
</x-master>


<script>
      // $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })

    $('#reservation').daterangepicker()

  //   Date picker JS
</script>  

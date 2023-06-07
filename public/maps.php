<?php include('layout/header.php'); ?>

<div class="wrapper">

    <?php include('layout/sidebar.php'); ?>

    <!-- Page Content Holder -->
    <div id="content">

        <?php include('layout/navigation.php'); ?>

        <div class="d-flex mt-4">
            <div class="pr-2" style="font-size:30px;">Crew Location</div>
        </div>
        <hr>

        <div id="mapid" style="height: 450px;"></div>

    </div>

</div>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        var mymap = L.map('mapid').setView([11.55642, 124.41394], 18);
        var arrayOfLatLngs = [];

        L.tileLayer('https://mt1.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}').addTo(mymap);

        console.log("RUNNING map");
        var markers = new L.featureGroup().addTo(mymap);
        db.collection("latest_crew_locations").onSnapshot(function(querySnapshot) {
            markers.clearLayers();  // remove all markers on the map
            arrayOfLatLngs.length = 0;  // empties the array
            
            querySnapshot.forEach(function(doc) {
                console.log(doc);
                var latitude = doc.data().location.latitude;
                var longitude = doc.data().location.longitude;
                var latlong = [latitude, longitude];
                var marker = L.marker(latlong).bindTooltip("Name of Crew", {
                    permanent: true,
                    direction: 'right'
                }).addTo(mymap);
                marker.bindPopup("Last located at: " +  moment(doc.data().date_time_fetched.toDate()).format('MM/DD/YY hh:mm A'));

                arrayOfLatLngs.push(latlong);
            });
            var bounds = new L.LatLngBounds(arrayOfLatLngs);
            mymap.fitBounds(bounds);    // move the map to the location of the markers
        });
    });
</script>

<?php include('layout/footer.php'); ?>
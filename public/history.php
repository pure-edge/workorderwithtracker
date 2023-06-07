<?php include('layout/header.php'); ?>



    <div class="wrapper">

        <?php include('layout/sidebar.php'); ?>

        <!-- Page Content Holder -->
        <div id="content">

            <?php include('layout/navigation.php'); ?>

            <div class="d-flex mt-4">
                <div class="pr-2" style="font-size:30px;">Crew Track History</div>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label for="inputGroupSelectCrew">Select Crew:&nbsp;</label>
                        </div>
                        <select class="custom-select-crew" id="inputGroupSelectCrew">
                            <option selected>Choose...</option>

                            <!-- TODO: generate crew list options -->
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <label class="control-label" for="date_from">
                            From:&nbsp;
                        </label>
                        <div class="input-group-text">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input class="form-control" id="date_from" type="text" data-field="datetime" data-view="dropdown" readonly/>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <label class="control-label" for="date_until">
                            Until:&nbsp;
                        </label>
                        <div class="input-group-text">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input class="form-control" id="date_until" type="text" data-field="datetime" data-view="dropdown" readonly/>
                    </div>
                </div>

                <div class="col-md-1">
                    <button id="btnCreateTrack" type="button" class="btn btn-success">Go</button>
                </div>
            </div>
            <div id="dtBox"></div>
            <div id="trackMap" style="height: 400px;"></div>

        </div>

    </div>


<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        /*$('#date_from').datetimepicker({
            timepicker: true,
            datepicker: true,
            format: 'd M, yy g:i A',
            ampm: true, // FOR AM/PM FORMAT
            formatTime: 'g:i A'
        });*/

        $("#dtBox").DateTimePicker({
            dateTimeFormat: 'dd-MMM-yyyy hh:mm AA',
            animationDuration: 0
        });

        var mymap = L.map('trackMap').setView([11.55642, 124.41394], 18);
        L.tileLayer('https://mt1.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}').addTo(mymap);
        var markers = new L.featureGroup().addTo(mymap);
        var arrayOfLatLngs = [];

        $('#btnCreateTrack').click(function() {
            if ($('#date_from').val().length == 0 || $('#date_until').val().length == 0)
                return;

            var date_time_from_str = $('#date_from').val();
            var date_time_from = moment(date_time_from_str, 'DD-MMM-YYYY hh:mm A').toDate();
            var date_time_to_str = $('#date_until').val();
            var date_time_to = moment(date_time_to_str, 'DD-MMM-YYYY hh:mm A').toDate();

            console.log("date_time_from: " + date_time_from);
            console.log("date_time_to: " + date_time_to);

            db.collection("account").doc('TqJhUIQP1sUIu1lRb7kFdyKLBzx1')
                .collection("location_history")
                .orderBy('date_time_fetched')
                .startAt(date_time_from).endAt(date_time_to)
                .get().then(function(querySnapshot) {
                    markers.clearLayers();
                    arrayOfLatLngs.length = 0;
                    console.log("markers.count: " + markers.getLayers().length);

                    var i = 1;
                    console.log("fetching location history...");
                    querySnapshot.forEach(function(doc) {
                        var latitude = doc.data().location.latitude;
                        var longitude = doc.data().location.longitude;
                        var latlong = [latitude, longitude];
                        //console.log(latlong);

                        var marker = new L.marker([latitude, longitude], {
                            icon: new L.DivIcon({
                                className: 'my-div-icon',
                                html: '<span style="display: inline-block; border-radius: 18px; border: 2px solid #3F51B5; text-align: center; color: #3F51B5; background-color: #fff; font-size: 12px;">' + i + '</span>'
                            })
                        }).addTo(markers);
                        marker.bindPopup("<b>" + i + "</b><br>Last located at: " + doc.data().date_time_fetched.toDate());
                        arrayOfLatLngs.push(latlong);
                        i++;
                    });
                    var bounds = new L.LatLngBounds(arrayOfLatLngs);
                    //console.log("arrayOfLatLngs.length after foreach: " + arrayOfLatLngs.length);
                    console.log("markers.count after foreach: " + markers.getLayers().length);
                    if (arrayOfLatLngs.length > 0) {
                        mymap.fitBounds(bounds); // move the map to the location of the markers
                    } else {
                        alert("No results found.");
                    }
                });
        });
    });
</script>

<?php include('layout/footer.php'); ?>
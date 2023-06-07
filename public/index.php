<?php include('layout/header.php'); ?>

<!-- logged in user information -->

    <div class="wrapper">

        <?php include('layout/sidebar.php'); ?>

        <!-- Page Content Holder -->
        <div id="content">

            <?php include('layout/navigation.php'); ?>

            

            <div class="d-flex mt-4">
                <div class="pr-2" style="font-size:30px;">Work Orders</div>
                <div class="ml-auto">
                    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#add_jo">
                        + Add New Work Order
                    </button>
                </div>
            </div>
            <hr>

            <?php // include('success.php'); ?>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="unassigned-tab" data-toggle="tab" href="#unassigned" role="tab" aria-controls="unassigned" aria-selected="true">Unassigned</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="false">Pending</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">Completed</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <!-- UNASSIGNED TAB -->
                <div class="tab-pane fade show active" id="unassigned" role="tabpanel" aria-labelledby="unassigned-tab">
                    <div class="row float-right py-2">
                        <div class="col">
                            <form class="form-inline" action="index.php" method="post">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search Name" name="search_unassigned">
                                <button class="btn btn-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Date Requested</th>
                                    <th>Name</th>
                                    <th>Account No.</th>
                                    <th>Contact #</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody id="tbody_unassigned">


                                <form method="post" action="index.php" id="delete_UA_form">
                                    <input type="hidden" class="delete_unassigned_id" name="delete_unassigned_id">
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- PENDING TAB -->
                <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                    <div class="row float-right py-2">
                        <div class="col">
                            <form class="form-inline">
                                <input class="form-control mr-sm-2" type="text" id="pending_search" placeholder="Search Name">
                                <button class="btn btn-success" type="submit" id="pending_search_btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive mt-2" id="pending_table">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Date Requested</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Assigned to</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- TODO: -->

                                <!-- <button type="button" class="btn btn-success btn-sm done_btn" '.$btn_access.'>
                                        <input type="hidden" value="'.$row["id"].'" class="pending_id">
                                        Done
                                    </button>
                                    <form method="post" action="index.php" id="done_form">
                                        <input type="hidden" value="" class="p_id" name="p_id">
                                    </form> -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- COMPLETED TAB -->
                <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                    <div class="row float-right py-2">
                        <div class="col">
                            <form class="form-inline">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search Name">
                                <button class="btn btn-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Date Requested</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Completed by</th>
                                    <th>Date Completed</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- TODO -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>


<!-- Add New Job Order Modal -->
<div class="modal fade" id="add_jo" tabindex="-1" role="dialog" aria-labelledby="modal_jo" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_jo">Add New Work Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--<form method="post" action="index.php">-->
            <div class="modal-body">
                <div class="form-group">
                    <label for="consumer_name">Name</label>
                    <input class="form-control" type="text" id="consumer_name" required>
                    <input type="hidden" id="consumer_id" name="add_jobOrder_id">
                    <input type="hidden" id="consumer_acc_number" name="add_jobOrder_acc_number">
                    <input type="hidden" id="consumer_address" name="add_jobOrder_address">
                    <input type="hidden" id="consumer_contact" name="add_jobOrder_contact">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button id="addNewWorkOrder_btn" type="submit" class="btn btn-primary" name="save_jo">Save</button>
            </div>
            <!--</form>-->
        </div>
    </div>
</div>

<!-- Edit Job Order Modal -->
<div class="modal fade" id="edit_jo" tabindex="-1" role="dialog" aria-labelledby="modal_edit-jo" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_edit-jo">Edit Work Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--<form method="post" action="index.php">-->

            <input type="hidden" id="edit-unassigned_id" name="edit-unassigned_id">
            <input type="hidden" id="edit-unassigned_acc" name="edit-unassigned_acc">
            <input type="hidden" id="edit-unassigned_address" name="edit-unassigned_address">
            <input type="hidden" id="edit-unassigned_number" name="edit-unassigned_number">

            <div class="modal-body">
                <div class="form-group">
                    <label for="edit_cons_name">Name</label>
                    <input class="form-control" type="text" id="edit_cons_name" required>
                    <input type="hidden" id="edit_cons_id" name="edit_cons_id">
                </div>

                <div class="form-group">
                    <label for="edit_description">Description</label>
                    <textarea class="form-control" id="edit_description" name="edit_description" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button id="updateUnassignedWork_btn" type="submit" class="btn btn-primary">Update</button>
            </div>
            <!--</form>-->
        </div>
    </div>
</div>

<!-- Crew List Modal -->
<div class="modal fade" id="crew_list" tabindex="-1" role="dialog" aria-labelledby="modal_cl" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_cl">Select Crew</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--<form method="post" action="index.php">-->
            <div id="modal_body_crew_list" class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" name="assign_crew">Assign</button>
            </div>
            <!--</form>-->
        </div>
    </div>
</div>

<!-- View Pending Details -->
<div class="modal fade" id="view_pending_details" tabindex="-1" role="dialog" aria-labelledby="modal_pending_details" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_pending_details">Work Order Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="hidden" class="view_pending_id" name="view_pending_id">

                <div class="form-group row float-center">
                    <div class="col-sm-3">
                        <label>Name:</label>
                    </div>
                    <div class="col-sm-9">
                        <div class="view_name"></div>
                    </div>
                </div>
                <div class="form-group row float-center">
                    <div class="col-sm-3">
                        <label>Description:</label>
                    </div>
                    <div class="col-sm-9">
                        <div class="view_description"></div>
                    </div>
                </div>
                <div class="form-group row float-center">
                    <div class="col-sm-3">
                        <label>Assigned to:</label>
                    </div>
                    <div class="col-sm-9">
                        <div class="view_assigned_to"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- View Gallery -->
<div class="modal fade" id="view_gallery" tabindex="-1" role="dialog" aria-labelledby="modal_gallery" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_gallery">Photo Gallery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="photo-gallery" style="display:none;"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        function ErrorMsg(msg) {
            $('.form_Validation').show().html(msg);
        }

        var consumer_names = [];

        db.collection("member_consumer_owner").orderBy("full_name").onSnapshot(function(querySnapshot) {
            consumer_names.length = 0; // empty the array
            querySnapshot.forEach(function(doc) { // reload the new list of names to the array
                consumer_names.push({
                    id: doc.id,
                    label: doc.data().full_name,
                    account_number: doc.data().account_number,
                    address: doc.data().address,
                    contact_number: doc.data().contact_number
                });
            });
            console.log("new consumer_names size: " + consumer_names.length);
        });

        db.collection("work_order")
            .where("assigned_crew", "==", null)
            .orderBy("date_requested", "desc")
            .onSnapshot(function(querySnapshot) {
                $('#tbody_unassigned').empty();
                querySnapshot.forEach(function(doc) {
                    // doc.data() is never undefined for query doc snapshots
                    console.log(doc.id, " => ", doc.data());
                    // TODO: add to web
                    var date = doc.data().date_requested;
                    var date_requested = new Date(date.seconds * 1000 + date.nanoseconds / 1000000);
                    var row =
                        '<tr>' +
                        '<td>' + moment(date_requested).format('MM/DD/YY hh:mm A') + '</td>' +
                        '<td>' + doc.data().member_consumer_owner.full_name + '</td>' +
                        '<td>' + doc.data().member_consumer_owner.account_number + '</td>' +
                        '<td>' + doc.data().member_consumer_owner.contact_number + '</td>' +
                        '<td>' + doc.data().description + '</td>' +
                        '<td>' +
                        '<button type="button" class="btn btn-info btn-sm assign_btn" data-toggle="modal" data-target="#crew_list">' +
                        '<input type="hidden" value="' + doc.id + '" class="unassigned_id">' +
                        'Assign' +
                        '</button>' +

                        '<button type="button" class="btn btn-success btn-sm edit_unassigned_btn" data-toggle="modal" data-target="#edit_jo">' +
                        '<input type="hidden" value="' + doc.id + '" class="edit-ua-id">' +
                        '<input type="hidden" value="' + doc.data().member_consumer_owner.full_name + '" class="edit-ua-name">' +
                        '<input type="hidden" value="' + doc.data().member_consumer_owner.account_number + '" class="edit-ua-cons-acc">' +
                        '<input type="hidden" value="' + doc.data().member_consumer_owner.contact_number + '" class="edit-ua-cons-number">' +
                        '<input type="hidden" value="' + doc.data().member_consumer_owner.address + '" class="edit-ua-cons-address">' +
                        '<input type="hidden" value="' + doc.data().description + '" class="edit-ua-desc">' +
                        'Edit' +
                        '</button>' +

                        '<button type="button" class="btn btn-danger btn-sm deleteUA_btn">' +
                        '<input type="hidden" value="' + doc.id + '" class="deleteUA_id">' +
                        'Delete' +
                        '</button>' +
                        '</td>' +
                        '</tr>';

                    $('#tbody_unassigned').append(row);
                });
            });

        db.collection("account").where("role", "==", "crew").onSnapshot(function(querySnapshot) {
            $('#modal_body_crew_list').empty();

            // re-create the html inside the modal_body_crew_list
            $('#modal_body_crew_list').append('<input type="hidden" value="" class="u_id" name="u_id">'); // unassigned_id
            $('#modal_body_crew_list').append('<input type="hidden" value="" class="c_id" name="c_id">'); // crew_id     
            querySnapshot.forEach(function(doc) { // reload the new list of names to the array
                /* TODO:
                    get the auth account using the doc.id
                    get the display name of the auth account
                    create <tr> and append to modal_body_crew_list
                */
            });
            console.log("new consumer_names size: " + consumer_names.length);
        });

        $('#addNewWorkOrder_btn').click(function() {
            var name = $('#consumer_name').val();
            var acc_number = $('#consumer_acc_number').val();
            var address = $('#consumer_address').val();
            var contact_number = $('#consumer_contact').val();
            var desc = $('#description').val();
            var current_date = new Date();

            if (name == "") {
                ErrorMsg("Name is required");
            } else if (desc == "") {
                ErrorMsg("Description is required");
            } else {
                //$('#addNewConsumer_form').submit();
                // ADD member-consumer-owner
                db.collection("work_order").add({
                        date_requested: current_date,
                        description: desc,
                        member_consumer_owner: {
                            account_number: acc_number,
                            address: address,
                            contact_number: contact_number,
                            full_name: name
                        },
                        assigned_by: null,
                        assigned_crew: null,
                        date_completed: null,
                    })
                    .then(function(docRef) {
                        console.log("Document written with ID: ", docRef.id);
                        $('#add_jo').modal('toggle');
                    })
                    .catch(function(error) {
                        console.error("Error adding document: ", error);
                    });
            }
        });

        // Single Select
        $("#consumer_name").autocomplete({
            /*
            get query
            if queryString 
            */
            source: consumer_names,
            select: function(event, ui) {
                // Set selection
                $('#consumer_name').val(ui.item.label); // display the selected text
                $('#consumer_id').val(ui.item.value); // save selected id to input
                $('#consumer_acc_number').val(ui.item.account_number);
                $('#consumer_address').val(ui.item.address);
                $('#consumer_contact').val(ui.item.contact_number);
                return false;
            }
        });

        // EDIT UNASSIGNED _______________________►
        $(document).on("click", ".edit_unassigned_btn", function() {
            // Do something when button is clicked
            // GET values from button
            console.log('Clicked the edit button!');
            var ua_id = $('.edit-ua-id', this).val();
            var ua_name = $('.edit-ua-name', this).val();
            var ua_consAcc = $('.edit-ua-cons-acc', this).val();
            var ua_consNumber = $('.edit-ua-cons-number', this).val();
            var ua_consAddress = $('.edit-ua-cons-address', this).val();
            var ua_desc = $('.edit-ua-desc', this).val();

            // FILL-UP the edit modal
            $('#edit-unassigned_id').val(ua_id); //
            $('#edit_cons_name').val(ua_name); //
            $('#edit-unassigned_acc').val(ua_consAcc); //
            $('#edit-unassigned_add').val(ua_consAddress); //
            $('#edit-unassigned_number').val(ua_consNumber); //
            $('#edit_description').val(ua_desc); //
        });

        $('#updateUnassignedWork_btn').click(function() {
            // GET values from edit modal
            var work_order_id = $('#edit-unassigned_id').val(); //
            var name = $('#edit_cons_name').val(); //
            var acc_number = $('#edit-unassigned_acc').val(); //
            var address = $('#edit-unassigned_address').val(); //
            var contact_number = $('#edit-unassigned_number').val(); //
            var desc = $('#edit_description').val(); //

            if (name == "") {
                ErrorMsg("Name is required");
            } else if (desc == "") {
                ErrorMsg("Description is required");
            } else {
                //$('#editConsumer_form').submit();
                db.collection("work_order").doc(work_order_id).set({
                        description: desc,
                        member_consumer_owner: {
                            account_number: acc_number,
                            address: address,
                            contact_number: contact_number,
                            full_name: name
                        }
                    }, {
                        merge: true
                    })
                    .then(function() {
                        console.log("Document successfully written!");
                        $('#edit_jo').modal('toggle');
                    })
                    .catch(function(error) {
                        console.error("Error writing document: ", error);
                    });
            }
        });

        // Single Select For Edit
        $("#edit_cons_name").autocomplete({
            source: consumer_names,
            select: function(event, ui) {
                // Set selection
                // UPDATE edit modal inputs
                $('#edit_cons_name').val(ui.item.label); //
                $('#edit-unassigned_acc').val(ui.item.account_number); //
                $('#edit-unassigned_address').val(ui.item.address); //
                $('#edit-unassigned_number').val(ui.item.contact_number); //
                return false;
            }
        });

        // DELETE UNASSIGNED _______________________
        $(document).on("click", ".deleteUA_btn", function() {
            var ua_id = $('.deleteUA_id', this).val();
            //$('.delete_unassigned_id').val(ua_id);

            var r = confirm("Are you sure you want to delete this unassigned record?");
            if (r == true) {
                //$('#deleteConsumer_form').submit();
                db.collection("work_order").doc(ua_id).delete().then(function() {
                    console.log("Document successfully deleted!");
                }).catch(function(error) {
                    console.error("Error removing document: ", error);
                });
            }
        });

        $('.view_details').click(function() {
            var view_id = $('.view_id', this).val();
            var name = $('.name_detail', this).val();
            var desc = $('.desc_details', this).val();
            var ass = $('.ass_detail', this).val();

            $('.view_pending_id').html(view_id);
            $('.view_name').html(name);
            $('.view_description').html(desc);
            $('.view_assigned_to').html(ass);
        });

        //________________________________________

        $('.gallery_btn').click(function() {
            var comp_id = $('.comp_id', this).val();
            $.post("gallery.php", {
                id: comp_id
            }, function(result) {
                // alert(result); return false;
                $('#photo-gallery').show();
                $('#photo-gallery').html(result);
            });
        });

        $('.assign_btn').click(function() {
            var u_id = $('.unassigned_id', this).val();
            // alert(u_id);
            $('.u_id').val(u_id);
        });

        $('.crew_id').click(function() {
            var c_id = $(this).val();
            // alert(c_id);
            $('.c_id').val(c_id);
        });
    });
</script>
<?php include('layout/footer.php'); ?>
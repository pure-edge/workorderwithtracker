<?php include('layout/header.php'); ?>



<div class="wrapper">

    <?php include('layout/sidebar.php'); ?>

    <!-- Page Content Holder -->
    <div id="content">

        <?php include('layout/navigation.php'); ?>

        <div class="d-flex mt-4">
            <div class="pr-2" style="font-size:30px;">Member-Consumer-Owners</div>
            <div class="ml-auto">
                <button type="button" class="btn btn-success mb-2" id="addNewConsumer_modal" data-toggle="modal" data-target="#add_consumer" >
                    + Add New MCO
                </button>
            </div>
        </div>
        <hr>

        <?php //include('success.php'); ?>

        <div class="row float-right pb-2">
            <div class="col">
                <form class="form-inline" action="consumers.php" method="post">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search Name" name="search_consumer">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
            </div>
        </div>

        <div class="table-responsive mt-2">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Account Number</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody id="tbody_consumer">


                    <form method="post" action="consumers.php" id="deleteConsumer_form">
                        <input type="hidden" value="" class="consumer_id" name="consumer_id">
                    </form>
                </tbody>
            </table>
        </div>

    </div>

</div>


<!-- Add Consumer Modal-->
<div class="modal fade" id="add_consumer" tabindex="-1" role="dialog" aria-labelledby="modal_addConsumer" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_addConsumer">Add New Consumer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="consumers.php" id="addNewConsumer_form">
                <div class="modal-body">

                    <div class="alert alert-danger form_Validation" role="alert"></div>

                    <div class="form-group row float-center">
                        <div class="col-sm-3">
                            <label for="addConsumer_name">Name:</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="addConsumer_name" name="addConsumer_name">
                        </div>
                    </div>
                    <div class="form-group row float-center">
                        <div class="col-sm-3">
                            <label for="addConsumer_acc">Account Number:</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="addConsumer_acc" name="addConsumer_acc">
                        </div>
                    </div>
                    <div class="form-group row float-center">
                        <div class="col-sm-3">
                            <label for="addConsumer_add">Address:</label>
                        </div>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="addConsumer_add" name="addConsumer_add"></textarea>
                        </div>
                    </div>
                    <div class="form-group row float-center">
                        <div class="col-sm-3">
                            <label for="addConsumer_number">Contact Number:</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="addConsumer_number" name="addConsumer_number">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="addNewConsumer_btn">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Consumer Modal-->
<div class="modal fade" id="edit_consumer" tabindex="-1" role="dialog" aria-labelledby="modal_editConsumer" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_editConsumer">Edit Member-Consumer-Owner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="consumers.php" id="editConsumer_form">
                <div class="modal-body">

                    <div class="alert alert-danger form_Validation" role="alert"></div>

                    <input type="hidden" class="editConsumer_id" name="editConsumer_id">

                    <div class="form-group row float-center">
                        <div class="col-sm-3">
                            <label for="editConsumer_name">Name:</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="editConsumer_name" name="editConsumer_name">
                        </div>
                    </div>
                    <div class="form-group row float-center">
                        <div class="col-sm-3">
                            <label for="editConsumer_acc">Account Number:</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="editConsumer_acc" name="editConsumer_acc">
                        </div>
                    </div>
                    <div class="form-group row float-center">
                        <div class="col-sm-3">
                            <label for="editConsumer_add">Address:</label>
                        </div>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="editConsumer_add" name="editConsumer_add"></textarea>
                        </div>
                    </div>
                    <div class="form-group row float-center">
                        <div class="col-sm-3">
                            <label for="editConsumer_number">Contact Number:</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="editConsumer_number" name="editConsumer_number">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="updateConsumer_btn">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        function ErrorMsg(msg) {
            $('.form_Validation').show().html(msg);
        }

        // READ member-consumer-owner
        db.collection("member_consumer_owner").orderBy("full_name").onSnapshot(function(querySnapshot) {
            $('#tbody_consumer').empty();
            querySnapshot.forEach(function(doc) {
                // doc.data() is never undefined for query doc snapshots
                // TODO: add to web
                var row =
                    '<tr>' +
                    '<td>' + doc.data().full_name + '</td>' +
                    '<td>' + doc.data().account_number + '</td>' +
                    '<td>' + doc.data().address + '</td>' +
                    '<td>' + doc.data().contact_number + '</td>' +
                    '<td>' +
                    '<button type="button" class="btn btn-success btn-sm editConsumer_btn" data-toggle="modal" data-target="#edit_consumer">' +
                    '<input type="hidden" value="' + doc.id + '" class="editConsumerID">' +
                    '<input type="hidden" value="' + doc.data().full_name + '" class="editConsumer_name">' +
                    '<input type="hidden" value="' + doc.data().account_number + '" class="editConsumer_acc">' +
                    '<input type="hidden" value="' + doc.data().address + '" class="editConsumer_add">' +
                    '<input type="hidden" value="' + doc.data().contact_number + '" class="editConsumer_number">' +
                    'Edit' +
                    '</button>' +

                    '<button type="button" class="btn btn-danger btn-sm deleteConsumer_btn">' +
                    '<input type="hidden" value="' + doc.id + '" class="deleteConsumerID">' +
                    'Delete' +
                    '</button>' +
                    '</td>' +
                    '</tr>';

                $('#tbody_consumer').append(row);
            });
        });

        $('#addNewConsumer_modal').click(function() {
            $('.form_Validation').hide();
        });

        $('#addNewConsumer_btn').click(function() {
            var name = $('#addConsumer_name').val();
            var acc_number = $('#addConsumer_acc').val();
            var address = $('#addConsumer_add').val();
            var contact_number = $('#addConsumer_number').val();

            if (name == "") {
                ErrorMsg("Name is required");
            } else if (acc_number == "") {
                ErrorMsg("Account Number is required");
            } else if (address == "") {
                ErrorMsg("Address is required");
            } else if (contact_number == "") {
                ErrorMsg("Contact Number is required");
            } else {
                //$('#addNewConsumer_form').submit();
                // ADD member-consumer-owner
                db.collection("member_consumer_owner").add({
                        account_number: acc_number,
                        address: address,
                        contact_number: contact_number,
                        full_name: name
                    })
                    .then(function(docRef) {
                        console.log("Document written with ID: ", docRef.id);
                        $('#add_consumer').modal('toggle');
                    })
                    .catch(function(error) {
                        console.error("Error adding document: ", error);
                    });
            }
        });

        $(document).on("click", ".editConsumer_btn", function() {
            // Do something when button is clicked
            // GET values from button
            console.log('Clicked the edit button!');
            var consumer_id = $('.editConsumerID', this).val();
            var name = $('.editConsumer_name', this).val();
            var acc_number = $('.editConsumer_acc', this).val();
            var address = $('.editConsumer_add', this).val();
            var contact_number = $('.editConsumer_number', this).val();

            // FILL-UP the edit modal
            $('.editConsumer_id').val(consumer_id);
            $('#editConsumer_name').val(name);
            $('#editConsumer_acc').val(acc_number);
            $('#editConsumer_add').val(address);
            $('#editConsumer_number').val(contact_number);
        });

        $('#updateConsumer_btn').click(function() {
            // GET values from edit modal
            var consumer_id = $('.editConsumer_id').val();
            console.log("consumer_id: " + consumer_id);
            var name = $('#editConsumer_name').val();
            var acc_number = $('#editConsumer_acc').val();
            var address = $('#editConsumer_add').val();
            var contact_number = $('#editConsumer_number').val();

            if (name == "") {
                ErrorMsg("Name is required");
            } else if (acc_number == "") {
                ErrorMsg("Account Number is required");
            } else if (address == "") {
                ErrorMsg("Address is required");
            } else if (contact_number == "") {
                ErrorMsg("Contact Number is required");
            } else {
                //$('#editConsumer_form').submit();
                db.collection("member_consumer_owner").doc(consumer_id).set({
                        account_number: acc_number,
                        address: address,
                        contact_number: contact_number,
                        full_name: name
                    })
                    .then(function() {
                        console.log("Document successfully written!");
                        $('#edit_consumer').modal('toggle');
                    })
                    .catch(function(error) {
                        console.error("Error writing document: ", error);
                    });
            }
        });

        $(document).on("click", ".deleteConsumer_btn", function() {
            // Do something when button is clicked
            var consumer_id = $('.deleteConsumerID', this).val();
            //$('.consumer_id').val(consumer_id);

            var r = confirm("Are you sure you want to delete this memberx consumer?");
            if (r == true) {
                //$('#deleteConsumer_form').submit();
                db.collection("member_consumer_owner").doc(consumer_id).delete().then(function() {
                    console.log("Document successfully deleted!");
                }).catch(function(error) {
                    console.error("Error removing document: ", error);
                });
            }
        });

    });
</script>
<?php include('layout/footer.php'); ?>
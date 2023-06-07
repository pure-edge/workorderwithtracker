<?php include('layout/header.php'); ?>

<!-- logged in user information -->
<?php if (isset($_SESSION['username'])) : ?>

    <div class="wrapper">

        <?php include('layout/sidebar.php'); ?>

        <!-- Page Content Holder -->
        <div id="content">

            <?php include('layout/navigation.php'); ?>

            <div class="d-flex mt-4">
                <div class="pr-2" style="font-size:30px;">Users</div>
                <div class="ml-auto">
                    <button type="button" class="btn btn-success mb-2" id="addNewUser_modal" data-toggle="modal" data-target="#add_user" <?php echo $btn_action; ?>>
                        + Add New User
                    </button>
                </div>
            </div>
            <hr>

            <?php include('success.php'); ?>

            <div class="row float-right pb-2">
                <div class="col">
                    <form class="form-inline" action="users.php" method="post">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search Name" name="search_user">
                        <button class="btn btn-success" type="submit">Search</button>
                    </form>
                </div>
            </div>

            <div class="table-responsive mt-2">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $query = "SELECT * FROM users WHERE role != 'admin'";
                        if (isset($_POST['search_user'])) {
                            $search_user = $_POST['search_user'];
                            $query = "SELECT * FROM users WHERE name LIKE '%$search_user%' AND role != 'admin'; ";
                        }
                        $results = mysqli_query($db, $query);

                        while ($row = $results->fetch_assoc()) {
                            echo '<tr>
                                                <td>' . $row["username"] . '</td>
                                                <td>' . $row["name"] . '</td>
                                                <td>' . $row["role"] . '</td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm editUser_btn" data-toggle="modal" data-target="#edit_user" ' . $btn_action . '>
                                                        <input type="hidden" value="' . $row["id"] . '" class="editUserID">
                                                        <input type="hidden" value="' . $row["username"] . '" class="editUsername_hidden">
                                                        <input type="hidden" value="' . $row["name"] . '" class="editName_hidden">
                                                        <input type="hidden" value="' . $row["role"] . '" class="editRole_hidden">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm deleteUser_btn" ' . $btn_action . '>
                                                        <input type="hidden" value="' . $row["id"] . '" class="deleteUserID">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>';
                        }
                        ?>

                        <form method="post" action="users.php" id="deleteUser_form">
                            <input type="hidden" value="" class="user_id" name="user_id">
                        </form>
                    </tbody>
                </table>
            </div>

        </div>

    </div>

<?php endif ?>

<!-- Add User Modal-->
<div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="modal_addUser" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_addUser">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="users.php" id="addNewUser_form">
                <div class="modal-body">

                    <div class="alert alert-danger form_Validation" role="alert"></div>

                    <div class="form-group row float-center">
                        <div class="col-sm-3">
                            <label for="username">Username:</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="addUser_username" name="username">
                        </div>
                    </div>
                    <div class="form-group row float-center">
                        <div class="col-sm-3">
                            <label for="name">Name:</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="addUser_name" name="name">
                        </div>
                    </div>
                    <div class="form-group row float-center">
                        <div class="col-sm-3">
                            <label for="password_1">Password:</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="addUser_password_1" name="password_1">
                        </div>
                    </div>

                    <div class="form-group row float-center">
                        <div class="col-sm-3">
                            <label for="password_2">Confirm Password:</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="addUser_password_2" name="password_2">
                        </div>
                    </div>
                    <div class="form-group row float-center">
                        <div class="col-sm-3">
                            <label for="role">Select Role:</label>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-control" id="addUser_role" name="role">
                                <option value="">Select Role</option>
                                <option value="crew">Crew</option>
                                <option value="csr">CSR</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="addNewUser_btn">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit User Modal-->
<div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="modal_editUser" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_editUser">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="users.php" id="editUser_form">
                <div class="modal-body">

                    <div class="alert alert-danger form_Validation" role="alert"></div>

                    <input type="hidden" class="editUser_id" name="editUser_id">

                    <div class="form-group row float-center">
                        <div class="col-sm-3">
                            <label for="editUser_username">Username:</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="editUser_username" name="edit_username">
                        </div>
                    </div>
                    <div class="form-group row float-center">
                        <div class="col-sm-3">
                            <label for="editUser_name">Name:</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="editUser_name" name="edit_name">
                        </div>
                    </div>
                    <div class="form-group row float-center">
                        <div class="col-sm-3">
                            <label for="editUser_role">Select Role:</label>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-control" id="editUser_role" name="edit_role">
                                <option value="">Select Role</option>
                                <option value="crew">Crew</option>
                                <option value="csr">CSR</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="updateUser_btn">Update</button>
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

        $('#addNewUser_modal').click(function() {
            $('.form_Validation').hide();
        });

        $('#addNewUser_btn').click(function() {
            var username = $('#addUser_username').val();
            var name = $('#addUser_name').val();
            var password_1 = $('#addUser_password_1').val();
            var password_2 = $('#addUser_password_2').val();
            var role = $('#addUser_role').val();

            if (username == "") {
                ErrorMsg("Username is required");
            } else if (name == "") {
                ErrorMsg("Name is required");
            } else if (password_1 == "") {
                ErrorMsg("Password is required");
            } else if (password_2 == "") {
                ErrorMsg("Confirm Password is required");
            } else if (role == "") {
                ErrorMsg("Role is required");
            } else if (password_1.length < 8) {
                ErrorMsg("Password must be 8 characters and above");
            } else if (password_1 != password_2) {
                ErrorMsg("Password and Confirm Password do not match");
            } else {
                $('#addNewUser_form').submit();
            }
        });

        $('.editUser_btn').click(function() {
            $('.form_Validation').hide();

            var user_id = $('.editUserID', this).val();
            var username = $('.editUsername_hidden', this).val();
            var name = $('.editName_hidden', this).val();
            var role = $('.editRole_hidden', this).val();

            $('.editUser_id').val(user_id);
            $('#editUser_username').val(username);
            $('#editUser_name').val(name);
            $('#editUser_role').val(role);
        });

        $('#updateUser_btn').click(function() {
            var user_id = $('.editUser_id').val();
            var username = $('#editUser_username').val();
            var name = $('#editUser_name').val();
            var role = $('#editUser_role').val();

            if (username == "") {
                ErrorMsg("Username is required");
            } else if (name == "") {
                ErrorMsg("Name is required");
            } else if (role == "") {
                ErrorMsg("Role is required");
            } else {
                $('#editUser_form').submit();
            }
        });

        $('.deleteUser_btn').click(function() {
            var user_id = $('.deleteUserID', this).val();
            $('.user_id').val(user_id);

            var r = confirm("Are you sure you want to delete this user?");
            if (r == true) {
                $('#deleteUser_form').submit();
            }
        });
    });
</script>

<?php include('layout/footer.php'); ?>
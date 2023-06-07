<?php

	$name = "";
	$desc = "";
	$errors = array();
	$success = array();
	$_SESSION['flash_msg'] = "";
	$current_date = date("Y-m-d h:i:sa");

	$u_id = ""; // unassigned_id
	$c_id = ""; // crew_id
	$p_id = ""; // pending_id

	$db = mysqli_connect('localhost', 'root', '', 'joborder_db');
	if ($db->connect_error)
	{ 
	    die("Connection failed: " . $db->connect_error); 
	}

	// Add New Job Order_____________________________________________________
	if(isset($_POST['save_jo']))
	{
		$consumer_id = $_POST['add_jobOrder_id'];
		$desc = mysqli_real_escape_string($db, $_POST['description']);

		// if (empty($name)) { array_push($errors, "Name is required"); }
		// if (empty($desc)) { array_push($errors, "Description is required"); }

		if (count($errors) == 0)
		{
			$query = "INSERT INTO unassigned (requested_date, consumer_id, description, created_at, updated_at) 
					  VALUES('$current_date', '$consumer_id', '$desc', '$current_date', '$current_date')";

			$insert = mysqli_query($db, $query);

			if($insert)
			{
				array_push($success, "New Job Order Successfully Added.");
				// header('location: index.php');
			}
			else
			{
				die("Error description: ".mysqli_error($db));
			}
		}
	}

	// UPDATE UNASSIGNED_____________________________________________________
	if(isset($_POST['edit-unassigned_id']))
	{
		$ua_id = $_POST['edit-unassigned_id'];
		$c_id = $_POST['edit_cons_id'];
		$desc = mysqli_real_escape_string($db, $_POST['edit_description']);

		$update_query = "UPDATE unassigned
						SET consumer_id = '$c_id', description = '$desc', updated_at = '$current_date'
						WHERE id = '$ua_id'; ";

		$update = mysqli_query($db, $update_query);
		if($update)
		{
			array_push($success, "Unassigned Record Successfully Updated.");
		}
		else
		{
			die("Error description: ".mysqli_error($db));
		}
	}

	// DELETE UNASSIGNED_____________________________________________________
	if(isset($_POST['delete_unassigned_id']))
	{
		$unassigned_id = $_POST['delete_unassigned_id'];

		$delete_query = "DELETE FROM unassigned WHERE id = '$unassigned_id'; ";
		$delete = mysqli_query($db, $delete_query);

		if($delete)
		{
			array_push($success, "Unassigned Record Successfully Deleted.");
		}
		else
		{
			die("Error description: ".mysqli_error($db));
		}
	}

	// Assign Job Order to a Crew_________________________________________________
	if(isset($_POST['assign_crew']))
	{
		$u_id = $_POST['u_id'];
		$c_id = $_POST['c_id'];

		if (count($errors) == 0)
		{
			$select_query = "SELECT * FROM unassigned WHERE id = '$u_id'";
			$results = mysqli_query($db, $select_query);

			while($row = $results->fetch_assoc())
            {
            	// echo $c_id.'. '.$row['requested_date'].' - '.$row['name'].' - '.$row['description'];

            	$r_date = $row['requested_date'];
            	$consumer_id = $row['consumer_id'];
            	$desc = $row['description'];

            	$insert_query = "INSERT INTO pending (requested_date, consumer_id, description, user_id, created_at, updated_at) 
					  VALUES('$r_date', '$consumer_id', '$desc', '$c_id', '$current_date', '$current_date')";

				$insert = mysqli_query($db, $insert_query);
				if($insert)
				{
					$delete_query = "DELETE FROM unassigned WHERE id = '$u_id'";
					$delete = mysqli_query($db, $delete_query);

					if($delete)
					{
						array_push($success, "Job Order Successfully Assigned.");
					}
					else
					{
						die("Error description: ".mysqli_error($db));
					}
				}
				else
				{
					die("Error description: ".mysqli_error($db));
				}
            }
		}
	}

	// Job Order Completed_____________________________________________________
	if(isset($_POST['p_id']))
	{
		$p_id = $_POST['p_id'];

		$select_query = "SELECT * FROM pending WHERE id = '$p_id'";
		$results = mysqli_query($db, $select_query);

		while($row = $results->fetch_assoc())
        {
        	$r_date = $row['requested_date'];
        	$consumer_id = $row['consumer_id'];
        	$desc = $row['description'];
        	$c_id = $row['user_id'];

        	$insert_query = "INSERT INTO completed (requested_date, consumer_id, description, user_id, completed_date, created_at, updated_at) 
				  VALUES('$r_date', '$consumer_id', '$desc', '$c_id', '$current_date', '$current_date', '$current_date')";

			$insert = mysqli_query($db, $insert_query);
			if($insert)
			{
				$delete_query = "DELETE FROM pending WHERE id = '$p_id'";
				$delete = mysqli_query($db, $delete_query);

				if($delete)
				{
					array_push($success, "Job Order Successfully Completed.");
				}
				else
				{
					die("Error description: ".mysqli_error($db));
				}
			}
			else
			{
				die("Error description: ".mysqli_error($db));
			}
        }
	}

	// ADD NEW USER_____________________________________________________
	if(isset($_POST['username']))
	{
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$name 	  = mysqli_real_escape_string($db, $_POST['name']);
		$password = mysqli_real_escape_string($db, $_POST['password_1']);
		$role 	  = $_POST['role'];

		$password = md5($password);
		$insert_query = "INSERT INTO users (username, name, role, password, created_at, updated_at)
						 VALUES ('$username', '$name', '$role', '$password', '$current_date', '$current_date'); ";

		$insert = mysqli_query($db, $insert_query);
		if($insert)
		{
			array_push($success, "New User Successfully Added.");
		}
		else
		{
			die("Error description: ".mysqli_error($db));
		}
	}

	// UPDATE USER_____________________________________________________
	if(isset($_POST['editUser_id']))
	{
		$user_id = $_POST['editUser_id'];
		$username = mysqli_real_escape_string($db, $_POST['edit_username']);
		$name = mysqli_real_escape_string($db, $_POST['edit_name']);
		$role = $_POST['edit_role'];

		$update_query = "UPDATE users
						SET username = '$username', name = '$name', role = '$role', updated_at = '$current_date'
						WHERE id = '$user_id'; ";

		$update = mysqli_query($db, $update_query);
		if($update)
		{
			array_push($success, "User Successfully Updated.");
		}
		else
		{
			die("Error description: ".mysqli_error($db));
		}
	}

	// DELETE USER_____________________________________________________
	if(isset($_POST['user_id']))
	{
		$user_id = $_POST['user_id'];

		$delete_query = "DELETE FROM users WHERE id = '$user_id'; ";
		$delete = mysqli_query($db, $delete_query);

		if($delete)
		{
			array_push($success, "User Successfully Deleted.");
		}
		else
		{
			die("Error description: ".mysqli_error($db));
		}
	}

	// ADD NEW CONSUMER_____________________________________________________
	if(isset($_POST['addConsumer_name']))
	{
		$name = mysqli_real_escape_string($db, $_POST['addConsumer_name']);
		$acc_number = mysqli_real_escape_string($db, $_POST['addConsumer_acc']);
		$address = mysqli_real_escape_string($db, $_POST['addConsumer_add']);

		$insert_query = "INSERT INTO consumers (name, account_number, address, created_at, updated_at)
						 VALUES ('$name', '$acc_number', '$address', '$current_date', '$current_date'); ";

		$insert = mysqli_query($db, $insert_query);
		if($insert)
		{
			array_push($success, "New Member Consumer Successfully Added.");
		}
		else
		{
			die("Error description: ".mysqli_error($db));
		}
	}

	// UPDATE CONSUMER_____________________________________________________
	if(isset($_POST['editConsumer_id']))
	{
		$consumer_id = $_POST['editConsumer_id'];
		$name = mysqli_real_escape_string($db, $_POST['editConsumer_name']);
		$acc_number = mysqli_real_escape_string($db, $_POST['editConsumer_acc']);
		$address = mysqli_real_escape_string($db, $_POST['editConsumer_add']);

		$update_query = "UPDATE consumers
						SET name = '$name', account_number = '$acc_number', address = '$address', updated_at = '$current_date'
						WHERE id = '$consumer_id'; ";

		$update = mysqli_query($db, $update_query);
		if($update)
		{
			array_push($success, "Member Consumer Successfully Updated.");
		}
		else
		{
			die("Error description: ".mysqli_error($db));
		}
	}

	// DELETE CONSUMER_____________________________________________________
	if(isset($_POST['consumer_id']))
	{
		$consumer_id = $_POST['consumer_id'];

		$delete_query = "DELETE FROM consumers WHERE id = '$consumer_id'; ";
		$delete = mysqli_query($db, $delete_query);

		if($delete)
		{
			array_push($success, "Member Consumer Successfully Deleted.");
		}
		else
		{
			die("Error description: ".mysqli_error($db));
		}
	}

	function custom_echo($x, $length)
	{
		if(strlen($x) <= $length)
		{
			return $x;
		}
		else
		{
			$y = substr($x,0,$length) . '...';
			return $y;
		}
	}


?>
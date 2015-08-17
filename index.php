<?php
session_start();
if (!empty($_SESSION)) {
echo 'VAR DUMP for troubleshooting: ';
var_dump($_SESSION);	
} else {
echo 'We have an empty session!';
var_dump($_SESSION);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration</title>
	<style>
	form#form-addUser {
		margin: 20px 0 0 0;
	}
		form#form-addUser div{
			margin:20px;
		}
		label {
			display: block;
			margin: 0 0 1px 0;
			color: #000;
		}
		input {
			display: inline-block;
			margin: 0 0 10px 0;
			width: 250px;
			height: 30px;
			font-size: 0.75em;
			padding: 3px 0 0 10px;
		}
		form#form-addUser div.button button {
			padding:13px 53px;
			font-size: 0.75em;
			border-radius: 4px;
			border: 1px solid #A98A26;
			background-color: #fabb00;
			color: white;
		}
		form#form-addUser div.button button:hover {
			background-color: #FADF17;
		}
		.bad {
			background-color:red;
		}
		.bad label {
			color: #fff;
		}
		.bad input {
			border: 1px solid red;
		}
		.good {
			background-color:green;
		}
		.good label {
			color: #fff;
		}
		.good input {
			border: 1px solid green;
		}
	</style>
</head>
<body>
	<ul>
		<?php
			if(isset($_SESSION['errors']))
			{ 
				echo $_SESSION['error_log'];
			} 
			else if(isset($_SESSION['OK']))
			{
				echo $_SESSION['OK'];
				$_SESSION['disable_fields'] = "disabled = disabled";
			}
		?>
	</ul>
	<form action="validation.php" method="post">
		<input type="hidden" name="registration" value="registration">
		<div <?php if(isset($_SESSION['email_flag'] )) { echo "class='" . $_SESSION['email_flag'] . "'"; }?>>
			<label for="email">Email:</label>
			<input type="text" id="email" name="email" placeholder="you@email.com" value="<?php if (isset($_SESSION['email'])) { echo $_SESSION['email'];}?>" <?php if(isset($_SESSION['disable_fields'] )) { echo $_SESSION['disable_fields']; } ?> autofocus>
		</div>
		<div <?php if(isset($_SESSION['first_name_flag'] )) { echo "class='" . $_SESSION['first_name_flag'] . "'"; }?>>
			<label for="first_name">First Name:</label>
			<input type="text" id="first_name" name="first_name" placeholder="First Name" value="<?php if (isset($_SESSION['first_name'])) { echo $_SESSION['first_name'];}?>" <?php if(isset($_SESSION['disable_fields'] )) { echo $_SESSION['disable_fields']; } ?>>
		</div>
		<div <?php if(isset($_SESSION['last_name_flag'] )) { echo "class='" . $_SESSION['last_name_flag'] . "'"; }?>>
			<label for="last_name">Last Name:</label>
			<input type="text" id="last_name" name="last_name" placeholder="Last Name" value="<?php if (isset($_SESSION['last_name'])) { echo $_SESSION['last_name'];}?>" <?php if(isset($_SESSION['disable_fields'] )) { echo $_SESSION['disable_fields']; } ?> >
		</div>
		<div <?php if(isset($_SESSION['password_flag'] )) { echo "class='" . $_SESSION['password_flag'] . "'"; }?>>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" placeholder="Password" value="<?php if (isset($_SESSION['password'])) { echo $_SESSION['password'];}?>" <?php if(isset($_SESSION['disable_fields'] )) { echo $_SESSION['disable_fields']; } ?> >
		</div>
		<div <?php if(isset($_SESSION['confirm_password_flag'] )) { echo "class='" . $_SESSION['confirm_password_flag'] . "'"; }?>>
			<label for="confirm_password">Confirm Password:</label>
			<input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" value="<?php if (isset($_SESSION['confirm_password'])) { echo $_SESSION['confirm_password'];}?>" <?php if(isset($_SESSION['disable_fields'] )) { echo $_SESSION['disable_fields']; } ?>>
		</div>
		<div <?php if(isset($_SESSION['date_of_birth_flag'] )) { echo "class='" . $_SESSION['date_of_birth_flag'] . "'"; }?>>
			<label for="date_of_birth">Date of Birth</label>
			<input type="text" id="date_of_birth" name="date_of_birth" maxlength="10" placeholder="MM/DD/YYYY" value="<?php if (isset($_SESSION['date_of_birth'])) { echo $_SESSION['date_of_birth'];}?>" <?php if(isset($_SESSION['disable_fields'] )) { echo $_SESSION['disable_fields']; } ?> >
		</div>
<!-- 		<div>
			<label for="profile_picture">Profile Picture</label>
			<input type="file" id="profile_picture" name="profile_picture" accept="image/*">
		</div> -->
		<div class="button">
			<button type="submit">Submit Registration</button>
		</div>
	</form>
	<form enctype="multipart/form-data" action="validation.php" method="POST">
	    <!-- MAX_FILE_SIZE must precede the file input field -->
	    <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
	    <!-- Name of input element determines name in $_FILES array -->
	    <div <?php if(isset($_SESSION['profile_picture_flag'] )) { echo "class='" . $_SESSION['profile_picture_flag'] . "'"; }?> >
	    	<label for="usefile">Upload Profile Picture:</label> 
	    	<input name="userfile" type="file" />
	    </div>
	    <div>
	    	<input type="submit" value="Upload Image" />
	    </div>
	</form>
	<form id="start-over" action="validation.php" method="post">
		<input type="hidden" name="unset" value="unset">
		<input type="submit" value="Start Over!"/>
	</form>
</body>
</html>
<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171216
  */
	// Include config file
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
	include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");

$username = $password = $djname = $confirm_password = "";
$username_err = $password_err = $djname_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        $sql = "SELECT id FROM users WHERE username = ?";
        if($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("s", $param_username);
            $param_username = trim($_POST["username"]);
            if($stmt->execute()){
                $stmt->store_result();
                if($stmt->num_rows == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        $stmt->close();
    }
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have at least 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        $sql = "INSERT INTO users (username, djname, password) VALUES (?, ?, ?)";
        if($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("sss", $param_username, $param_djname, $param_password);
            $param_username = $username;
            $param_djname = $djname;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            if($stmt->execute()){
                header("location: http://localhost/djx/djx/admin/index.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        $stmt->close();
    }
    $mysqli->close();
}
?>
<head>
	<title>Create a DJ Account</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Create a DJ Account</h2>
					<div id="status_bar" class="alert alert-warning" role="alert">This is a warning alert.</div>
					<p>Please fill this form to create a DJ account.</p>
					<div class="col-md-6">
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
								<label>Username:<sup>*</sup></label>
								<input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
								<span class="help-block"><?php echo $username_err; ?></span>
							</div>
							<div class="form-group <?php echo (!empty($djname_err)) ? 'has-error' : ''; ?>">
								<label>DJ Name:<sup>*</sup></label>
								<input type="text" name="djname"class="form-control" value="<?php echo $djname; ?>">
								<span class="help-block"><?php echo $djname_err; ?></span>
							</div>
							<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
								<label>Password:<sup>*</sup></label>
								<input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
								<span class="help-block"><?php echo $password_err; ?></span>
							</div>
							<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
								<label>Confirm Password:<sup>*</sup></label>
								<input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
								<span class="help-block"><?php echo $confirm_password_err; ?></span>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Submit">
								<input type="reset" class="btn btn-default" value="Reset">
							</div>
							<p>Already have an account? <a href="login.php">Login here</a>.</p>
						</form>
					</div>
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>
<script>
// hide status bar
var status_bar = document.getElementById("status_bar");
status_bar.style.display="none";
</script>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>
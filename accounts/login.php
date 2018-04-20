<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171216
  */
// Include config file
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");

$username = $password = "";
$username_err = $password_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT username, password FROM users WHERE username = ?";
        if($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("s", $param_username);
            $param_username = $username;
            if($stmt->execute()){
                $stmt->store_result();
                if($stmt->num_rows == 1){
                    $stmt->bind_result($username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            $_SESSION['username'] = $username;
                            header("location: http://localhost/djx/djx/admin/index.php");
                        } else{
                            $password_err = '<div class="alert alert-danger">The password you entered was not valid.</div>';
                        }
                    }
                } else{
                    $username_err = '<div class="alert alert-danger">No account found with that username.</div>';
                }
            } else{
                echo '<div class="alert alert-danger">Oops! Something went wrong. Please try again later.</div>';
            }
        }
        $stmt->close();
    }
    $mysqli->close();
}
?>
<head><title>Login</title></head>
<body>
    <div class="fluid-container">
		<br>
		<div class="col-md-4 offset-4">
			<h1 class="display-4">Login</h1>
			<p>Please fill in your credentials to login.</p>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
					<label>Username:<sup>*</sup></label>
					<input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
					<span class="help-block"><?php echo $username_err; ?></span>
				</div>
				<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
					<label>Password:<sup>*</sup></label>
					<input type="password" name="password" class="form-control">
					<span class="help-block"><?php echo $password_err; ?></span>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Submit">
				</div>
			</form>
		</div>
	</div>
<script>
// hide status bar
$('#status_bar').hide();
</script>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>
</body>

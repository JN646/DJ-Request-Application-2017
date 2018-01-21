<?php
/**
* Project:		DJ Request Application
* Copyright:	(C) JGinn 2017 - 2018
* FileCreated:	180107
*/
?>
<style>
.footer-distributed{
	background-color: #3a3a40;
	box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
	box-sizing: border-box;
	width: 100%;
	text-align: left;
	padding: 45px 50px;
	margin-top: 80px;
	bottom:0;
}
.footer-distributed .footer-left p{
	color:  #8f9296;
	font-size: 14px;
	margin: 0;
}
/* Footer links */
.footer-distributed p.footer-links{
	font-size:18px;
	font-weight: bold;
	color:  #ffffff;
	margin: 0 0 10px;
	padding: 0;
}
.footer-distributed p.footer-links a{
	display:inline-block;
	line-height: 1.8;
	text-decoration: none;
	color:  inherit;
}
.footer-distributed .footer-right{
	float: right;
	margin-top: 6px;
	max-width: 180px;
}
.footer-distributed .footer-right a{
	display: inline-block;
	width: 35px;
	height: 35px;
	background-color: #2b3033;
	border-radius: 2px;
	font-size: 20px;
	color: #ffffff;
	text-align: center;
	line-height: 35px;
	margin-left: 3px;
}
@media (max-width: 600px) {
	.footer-distributed .footer-left,
	.footer-distributed .footer-right{
		text-align: center;
	}
	.footer-distributed .footer-right{
		float: none;
		margin: 0 auto 20px;
	}
	.footer-distributed .footer-left p.footer-links{
		line-height: 1.8;
	}
}
</style>
<footer class="footer-distributed">
	<div class="footer-right">
	<?php
		echo"<a href='$FacebookAccount'><i class='fa fa-facebook'></i></a>";
		echo"<a href='$TwitterAccount'><i class='fa fa-twitter'></i></a>";
		echo"<a href='$SnapchatAccount'><i class='fa fa-snapchat'></i></a>";
		echo"<a href='#'><i class='fa fa-github'></i></a>";
	?>
	</div>
	<div class="footer-left">
		<p class="footer-links">
			<a href="<?php echo $environment; ?>index.php">Home</a>
			·
			<a href="<?php echo $environment; ?>accounts/login.php">Admin</a>
			·
			<a href="<?php echo $environment; ?>static/about.php">About</a>
			·
			<a href="<?php echo $environment; ?>static/features.php">Features</a>
			·
			<a href="<?php echo $environment; ?>static/help.php">Help</a>
			·
			<a href="<?php echo $environment; ?>static/tandc.php">Terms & Conditions</a>
		</p>
		<p>The DJ Request Application &copy; 2017-<?php echo date("Y");?>, Build <?php echo date("ymd");?>.</p>
		
		<!-- Button to Open the Modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
			Login
		</button>
		
		<!-- The Modal -->
		<div class="modal fade" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">

				<?php
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
											$password_err = 'The password you entered was not valid.';
										}
									}
								} else{
									$username_err = 'No account found with that username.';
								}
							} else{
								echo "Oops! Something went wrong. Please try again later.";
							}
						}
						$stmt->close();
					}
					$mysqli->close();
				}
				?>
				
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Login</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
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

					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>

				</div>
			</div>
		</div> <!-- Modal -->
		
	</div>
</footer>
</body>
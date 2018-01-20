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
		<p>The DJ Request Application &copy; 2017-2018, Build 180119.</p>
	</div>
</footer>
</body>
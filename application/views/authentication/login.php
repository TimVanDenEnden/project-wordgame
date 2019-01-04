<html>
	<head>
		<!-- Set title from browser -->
		<title>POC - WordGame </title>

		<!-- Load bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>
		
		<!-- Our css  -->
		<link rel="stylesheet" href="../assets/css/custom.css">

		<!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
		<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
	</head>
	<body>

		<div class="bg"></div>

		<div class="container-fluid" style="position: relative;">
			<div class="bg-transparent">
				<div class="nav-bar">WordGame</div>
				<div class="login_Holder">
					<form action="/login/execute" method="POST">
						<div class="title">Login - WordGame</div>
						<div class="error-Login">
							<?php 
								if ($msg != "") 
								{
									echo $msg;
								}
							?>
						</div>
						<div>
							<input name="input-username" class="input" type="text" placeholder="username" value="<?php if ($username != "") { echo $username; } ?>" />
						</div>
						<div>
							<input name="input-password" class="input" type="password" placeholder="password" value="<?php if ($password != "") { echo $password; } ?>" />
						</div>
						<div>
							<button name="btn-login" class="btnLogin">Click to login</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<?php if($msg != "") { ?>
			<script>
				$( ".input" ).effect("shake");
			</script>
		<?php } ?>


		<!-- Script bootstrap -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<script src="../assets/js/bg_script.js"></script>
	</body>
</html>
<?php include 'header.php'; ?>
<div id="error" class=" hide">
	<p>The login credentials are not valid.</p>
</div>
<div id="success" class=" hide">
	<p>Succesful login, redirecting to homepage...</p>
</div>
<div class="loginContainer">
	<center>
		<div class="loginFormContainer">
			<form method="post" id="loginForm">
				<h3>Login</h3>
				<input type="text" name="txtusuario" required placeholder="usuario" /></td>
				<input type="password" name="txtpassword" required placeholder="password" />
				<input type="submit" value="Ingresar" />
			</form>
		</div>
	</center>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#loginForm').submit(function(e) {
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: 'api/users/login.php',
				data: $(this).serialize(),
				success: function(response) {
					var jsonData = JSON.parse(response);

					// user is logged in successfully in the back-end
					if (jsonData.success == "1") {
						$('#success').removeClass('hide');
						$('#error').addClass('hide');
						setTimeout(function() {
							window.location.replace("index.php");
						}, 2000);
					} else {
						$('#error').removeClass('hide');
						$('#success').addClass('hide');
					}
				},
				error: function(error) {
					console.log(error);
				}
			});
		});
	});
</script>
<style>
	.loginContainer {
		background-color: #f9f9f9;
		height: 100vh;
	}

	.loginContainer .loginFormContainer {
		width: 30rem;
		margin-top: 5rem;
	}

	.loginContainer input[type="text"],
	.loginContainer input[type="password"] {
		width: 100%;
		padding: 8px 20px;
		box-sizing: border-box;
		background-color: transparent;
		margin-bottom: 1rem;
		border: 0;
		border-bottom-color: currentcolor;
		border-bottom-style: none;
		border-bottom-width: 0px;
		border-bottom: 1px solid gray;
		filter: none;
	}

	.loginContainer input[type="text"]:autofill,
	.loginContainer input[type="password"]:autofill {
		background-color: transparent;
	}

	.loginContainer label {
		font-size: 14px;
		font-weight: bold;
		font-family: arial;
	}

	.loginContainer input[type="submit"] {
		background-color: #353a46;
		color: white;
		padding: 8px 10px;
		margin: 8px 0px;
		border: solid;
		cursor: pointer;
		width: 40%;
	}

	.loginFormContainer {
		background-color: #ffffff;
		padding: 2rem;
		border-radius: 0.5rem;
		-webkit-box-shadow: 2px 2px 12px -4px rgba(166, 166, 166, 1);
		-moz-box-shadow: 2px 2px 12px -4px rgba(166, 166, 166, 1);
		box-shadow: 2px 2px 12px -4px rgba(166, 166, 166, 1);
	}

	.hide {
		display: none;
	}

	#error {
		padding: 1rem 0rem;
		background-color: #ff1b1b;
	}

	#error p {
		margin: 0;
		text-align: center;
		font-weight: bold;
		color: white;
	}

	#success {
		padding: 1rem 0rem;
		background-color: #00b524;
	}

	#success p {
		margin: 0;
		text-align: center;
		font-weight: bold;
		color: white;
	}

	@media only screen and (max-width: 700px) {
		.loginContainer .loginFormContainer {
			width: 100%;
		}
	}
</style>
<?php include 'footer.php'; ?>
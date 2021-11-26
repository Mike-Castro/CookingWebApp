<?php include 'header.php'; ?>
<div id="error" class=" hide">
	<p>The login credentials are not valid.</p>
</div>
<div id="success" class=" hide">
	<p>Succesful login, redirecting to homepage...</p>
</div>
<div class="loginContainer">
	<center>
		<form method="post" id="loginForm">
			<table>
				<tr>
					<td colspan="2" style="
              text-align: center;
              background-color: #353a46;
              color: white;
              padding-bottom: 10px;
              padding-top: 10px;
			  ">
						<label>Login</label>
					</td>
				</tr>
				<tr>
					<td><label>Usuario</label></td>
				</tr>
				<tr>
					<td><input type="text" name="txtusuario" required /></td>
				</tr>
				<tr>
					<td><label>Password</label></td>
				</tr>
				<tr>
					<td><input type="password" name="txtpassword" required /></td>
				</tr>
				<tr>
					<td><input type="submit" value="Ingresar" /></td>
				</tr>
			</table>
		</form>
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
		margin-top: 2rem;
	}

	.loginContainer table {
		border: 2px solid #353a46;
		background-color: #ffffff;
	}

	.loginContainer input[type="text"],
	.loginContainer input[type="password"] {
		width: 100%;
		padding: 8px 20px;
		border: 2px solid #ccc;
		box-sizing: border-box;
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
</style>
<?php include 'footer.php'; ?>
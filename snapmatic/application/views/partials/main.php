<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" id="login-form">
					<span class="login100-form-title p-b-43">
						Welcome to Snapmatic!<br><br>
						Login
					</span>
					<div class="alert-login" class="fix-middle"></div>
			
					<div class="wrap-input100 validate-input">
						
						<input class="input100" type="text" name="username" id="username">

						<span class="label-input100">Email</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="password" name="password" id="password">
					
						<span class="label-input100">Password</span>
					</div>

					<div class="container-login100-form-btn">

						<button class="login100-form-btn" type="submit">
							Login<br>
						</button><br>
					</div>
						<br>
						<a href="<?= base_url().'user/register'?>">
							<button class="login100-form-btn" type="button">Register</button>
						</a>
					
				</form>

				<div class="login100-more" style="background-image: url('<?= base_url()?>assets/login/images/bg.png');">
				</div>
			</div>
		</div>
	</div>
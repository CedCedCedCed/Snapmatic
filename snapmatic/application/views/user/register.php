<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" id="registration-form">
				<input type="hidden" name="type" value="registration">
					<span class="login100-form-title p-b-43">
						Create a New Account !
					</span>
	
						<div class="alert-danger text-center" id="first_name_error"></div>
						<div class="alert-danger text-center" id="last_name_error"></div>
						<div class="alert-danger text-center" id="username_error"></div>
						<div class="alert-danger text-center" id="email_error"></div>
						<div class="alert-danger text-center" id="password_error"></div>
						<div id="success-message-new-account"></div>
					<div class="wrap-input100 validate-input">
						
						<input class="input100" type="text" name="first_name" id="first_name">

						<span class="label-input100">First</span>
						
					</div>

					<div class="wrap-input100 validate-input">
						
						<input class="input100" type="text" name="last_name" id="last_name">

						<span class="label-input100">Last</span>
						
					</div>

					<div class="wrap-input100 validate-input">
						
						<input class="input100" type="text" name="username" id="username">

						<span class="label-input100">Username</span>
						
					</div>

					<div class="wrap-input100 validate-input">
						
						<input class="input100" type="text" name="email" id="email">

						<span class="label-input100">Email</span>
						
					</div>
					
					
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="password" name="password" id="password">
					
						<span class="label-input100">Password</span>
						
					</div>

					<div class="container-login100-form-btn">

						<button class="login100-form-btn" type="submit">
							Create
						</button>
					</div>
						
						
					
				</form>

				<div class="login100-more" style="background-image: url('<?= base_url()?>assets/login/images/bg.png');">
				</div>
			</div>
		</div>
	</div>
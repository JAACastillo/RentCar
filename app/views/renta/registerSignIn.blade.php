
	<div class="admin-form-content sign_register_block">
		<div class="admin-form-block">
 			@include('renta.register')			
			<!-- <div class="admin-form-separator">
				<div class="separator">Or</div>
			</div>
			<input class="connect_fb" type="button" value="Connect With Facebook"/>
			<input class="connect_twitter" type="button" value="Connect With Twitter"/> -->
		</div>
	</div>
	<div class="admin-form-content forgot_passwd_block"> 
		<div class="admin-form-block">
 			<form class="main-form admin-form" action="#">	 
 				<div class="main_form_navigation">
 					<div id="tab_forgot_passwd" class="title-form current">¿Olvidaste tu contraseña?</div>	
 				</div>							
				<div id="tab_forgot_passwd_content" class="content-form">
					<input id="forgot_pass_email" class="input_placeholder" type="text" value="" placeholder="Correo Electronico" name="forgot_pass_email"/>
					<div id="forgot_pass_text"> Te enviaremos tu contraseña al correo.</div>
					<input class="admin-form-submit orange_button" type="submit" value="Continuar"/>
					<div class="admin_form_link">
						<span class="sign_in"><a class="tab_link_button" href="#sign_in" title="">Inicia sesión</a></span>
					</div>
				</div>
				<div class="clear"></div>
			</form>
		</div>
	</div>
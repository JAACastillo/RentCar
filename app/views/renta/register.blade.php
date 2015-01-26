<form class="main-form admin-form" ng-controller="loginController">	

	<div class="main_form_navigation">
		<div id="tab_register" class="title-form back"><span class="register"><a href="#register" title="">Registrarse</a></span></div>				
		<div id="tab_sign_in" class="title-form current"><span class="sign_in"><a href="#sign_in" title="">Inicar Sesión</a></span></div>	
	</div>			


	<div id="tab_sign_in_content" class="content-form">
		<div ng-show="error" class="loginError">
					@{{error}}
		</div>
		<div>
			<input ng-model='user.email'id="sign_in_email" class="input_placeholder" type="text" value="" placeholder="Email address" name="sign_in_email" />
		</div>
		<div>
			<input ng-model='user.password'id="sign_in_pass"  type="password" value="" name="sign_in_pass"/>
		</div>
		<div>
			<input ng-model='user.remember'  type="checkbox" name="remember_me" checked />
			<label for="remember_me_checkbox"> Recuérdame</label>
		</div>
		
		<input class="admin-form-submit orange_button" type="submit" ng-click = "iniciarSesion()" value="Entrar"/>
		<div class="admin_form_link">
			<span class="forgot_passwd"><a class="tab_link_button" href="#forgot_passwd" title="">¿Olvidaste tu contraseña?</a></span>
		</div>
	</div>
	<div id="tab_register_content"  class="content-form hidden">
		<div class="loginError" ng-show="errores">
			<ul >
				<li ng-repeat="error in errores track by $index">
					<span ng-bind="error"></span>
				</li>
			</ul>
		</div>
		<div>
			<input ng-model="registerUser.nombre"id="register_email" class="input_placeholder" type="text" value="" placeholder="Nombre" name="register_email" ng-class="{errores:has-error}"/>
		</div>
		<div>
			<input ng-model="registerUser.email"id="register_email" class="input_placeholder" type="text" value="" placeholder="Correo electrónico" name="register_email" />
		</div>
		<div>
			<input ng-model="registerUser.password"id="sign_in_pass" type="password" placeholder="Contraseña" value="" name="register_name" />
		</div>
		<div>
			<input ng-model="registerUser.remember"type="checkbox"  id="remember_me" checked />
			<label for="remember_me"> Recuérdame</label>
		</div>
		<input class="admin-form-submit orange_button" ng-click="registrar()" type="submit" value="Continuar"/>
		<div class="admin_form_link">
			<span class="sign_in"><a class="tab_link_button" href="#sign_in" title="">¿Ya tienes cuentas?</a></span>
		</div>
	</div>
	<div class="clear"></div>
</form>	
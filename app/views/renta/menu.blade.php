
			<div id="branding">
				<div id="branding-content">
					<div class="title-content">
						<a href="{{url('/')}}" title=""><img class="site-logo" src="images/logo-multiautos.jpg" alt="" /></a>
						<h1 class="site-title"><a href="01-home-v1.html" title=""></a></h1>								
					</div>					
					<div class="access-content">
						<ul>
							<li class="current_page_item">
								<a href="{{route('home')}}" title="">Inicio</a>
							</li>
							<li><a href="#" title="">Shortcodes</a></li>
							<li><a href="#" title="">FAQ</a></li>
						</ul>
					</div><!-- .access -->			
					<div class="menus-content">	
						<!-- <div class="menus">							
							<div class="language">
								<select class="select" name="select_language"> 
									<option>English</option>
									<option selected="selected">French</option>
								</select>
							</div>
							<div class="country">
								<select class="select" name="select_country"> 
									<option selected="selected">Choose Country</option>
									<option>USA</option>
									<option>England</option>
								</select>
							</div>
						</div> -->
						<br />
						<div class="member">							
							@if(Auth::check())
								<?php
								           $name = explode(" ", Auth::user()->nombre);
								           $name = $name[0]. ' '.end($name);
								       ?>
								       <ul class="nav navbar-nav navbar-right">
								           <li class="dropdown">
								               <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $name }} <strong class="caret"></strong></a>
								               <ul class="dropdown-menu">
								               		@if(Auth::user()->tipo != 'Cliente')
								                   		<li>{{ HTML::link(route('admin'), ' Administrador', array('class' => 'glyphicon glyphicon-random')) }}</li>
								                   		<li>{{ HTML::link(route('prestamoLista'), ' Reservas', array('class' => 'glyphicon glyphicon-calendar')) }}</li>
								                   		<li class="divider"></li>
								                   	@endif
								                   <li> {{ HTML::link(route('logOut'), ' Salir', array('class' => "glyphicon glyphicon-off")) }}</li>
								               </ul>
								           </li>
								       </ul>
							@else								
								<span class="sign_in"><a class="sign_button tab_link_button" href="#sign_in" title="">Iniciar sesión</a></span>
								<span class="register"><a class="sign_button tab_link_button" href="#register" title="">Registrarse</a></span>
				            @endif
						</div>
					</div>
				</div><!-- #branding-content -->
				<div class="clear"></div>
			</div><!-- #branding -->
<footer id="footer">
	<div id="footer-menu" class="footer-content">
		<div class="widget-area">
			<div class="clear"></div>
			<div class="footer-nav footer-widget-single">
				<h3 class="widget-title">Renta</h3>
				<ul>
					<li><a href="{{ route('home') }}" title="">Inicio</a></li>
					<li><a href="{{ route('privacidad') }}" title="">Privacidad</a></li>
					<li><a href="{{ route('servicios') }}" title="">Servicios</a></li>
				</ul>
			</div>
			<div class="footer-nav footer-widget-single">
				<h3 class="widget-title">Nosotros</h3>
				<ul>
					<li><a href="#" title="">Últimas noticias</a></li>
					<li><a href="{{ route('terminos') }}" title="">Terminos de uso</a></li>
				</ul>
			</div>
			<div class="footer-nav footer-widget-single">
				<h3 class="widget-title">Soporte</h3>
				<ul>
					<li><a href="{{ route('contactenos') }}" title="">Contactanos</a></li>
					@if(Auth::check())
						<li><a href="{{ route('historial') }}">Historial</a></li>
					@endif
					<li><a href="{{ route('faq') }}" title="">FAQ</a></li>
				</ul>
			</div>
			{{--
			<div class="recent_tweets footer-widget-single">
 				<h3>Tweets Recientes</h3>
 				<div class="recent_tweets_content"><a href="#" title="">@bestwebsoft</a> velit, vitae tincidunt orci. Proin vitae auctor lectus.</div>
 				<div class="recent_tweets_url"><a href="#" title="">http://bestwebsoft.com</a></div>
	 			<div class="recent_tweets_time">posted 2 days ago</div>
 			</div>
 			--}}
 			<div class="support footer-widget-single">
 				<img src="images/support-icon.png" alt="" />
 				<div class="title">Soporte en línea</div>
 				<div class="phone">
 					(503) 2312-7350 <br/>
 					(503) 7922-7942
 				</div>
 				<div class="email"><a href="#" title="">ventas@.com</a></div>
 			</div>
 			{{--
 			<div class="social-plugins">
 				<div class="fcbk_like">
 					<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.bestwebsoft.com&amp;locale=en_US&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=true&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21" style="border-width:0; border:none; overflow:hidden; width:450px; height:21px; background-color: transparent;"></iframe>
				</div>
				<div class="twitter_like">
	 				<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
					<script type="text/javascript">!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
					</script>
				</div>
				<div class="google_plus_one">
					<div class="g-plusone" data-size="medium"></div>
					<script type="text/javascript">
					  	(function() {
						    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
						    po.src = 'https://apis.google.com/js/plusone.js';
						    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
						})();
					</script>
				</div>
			</div>
			--}}
			<div class="clear"></div>
		</div><!-- #footer-content -->
	</div>
	<div id="footer-content">
		<img class="site-logo" src="images/logo-multiautos.jpg" alt="" />
		<h1 class="site-title"> .</h1>
		<div class="company-name">Compañia de renta de carros, en El Salvador</div>
	</div><!-- #footer-content -->
</footer><!--end:footer-->
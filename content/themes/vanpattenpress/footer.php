	<footer id="footer">
		<ul id="social">
			<li>
				<?php /* Facebook */ 
				?><div class="fb-like" data-href="http://www.facebook.com/vanpattenmedia" data-send="false" data-layout="button_count" data-width="150" data-show-faces="false"></div>
			</li>
			<li>
				<?php /* Twitter */ 
				?><a href="https://twitter.com/VanPattenMedia" class="twitter-follow-button" data-show-count="true" data-show-screen-name="false">Follow @VanPattenMedia</a>
			</li>
		</ul>
		<div id="legal">
			<?php copyright('2010'); echo ' ' . get_bloginfo('name'); ?> <a href="/legal/">Legal</a> <a href="/colophon/">Colophon</a>
		</div>
	</footer>
	
	<!--[if lt IE 7 ]>
	<script src="http://cdn.vanpattenmedia.com/js/libs/dd_belatedpng.js"></script>
	<script> DD_belatedPNG.fix('.png_fix');</script>
	<![endif]-->
	
	<?php wp_footer(); ?>
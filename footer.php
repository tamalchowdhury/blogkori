<footer id="footer" class="row">
			<div class="col-sm-12">
			<?php printf( esc_html__( '&copy; %1$s %2$s - Developed by %3$s', 'blogkori'), date_i18n( esc_html__( 'Y', 'blogkori' ) ), get_bloginfo('name'), '<a href="http://www.tamalanwar.com" target="_blank" rel="nofollow">Tamal Anwar</a>' ); ?>
			</div>
		</footer>
	</div>
	<?php wp_footer(); ?>
</body>
</html>
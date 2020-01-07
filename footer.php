<footer id="footer" class="row">
			<div class="col-sm-12">
			<?php printf( esc_html__( '&copy; %1$s %2$s - Powered by %3$s', 'blogkori'), date_i18n( esc_html__( 'Y', 'blogkori' ) ), get_bloginfo('name'), '<a href="https://blogkori.com/theme?utm_source=footer_credits&utm_medium=referral&utm_campaign=blogkori_theme" target="_blank">BlogKori Theme</a>' ); ?>
			</div>
		</footer>
	</div>
	<?php wp_footer(); ?>
</body>
</html>

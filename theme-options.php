<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'blogkori_options', 'blogkori_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'BlogKori Options', 'blogkori' ), __( 'BlogKori Options', 'blogkori' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
        <?php echo "<h2>". __( 'BlogKori Options', 'blogkori' ) . "</h2>"; ?>
		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'blogkori' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
            
            
            
			<?php settings_fields( 'blogkori_options' ); ?>
			<?php $options = get_option( 'blogkori_theme_options' ); ?>
            <style>
                .wrap {
                   
                }   
                
                .menu-header {
                    background: #25aae2;
                    padding: 1em 2em;
                }    
                
                .menu-header h1 {
                    color: #ffffff;
                }
                
            .row {
                    /*width: 1000px;*/
                    width: 100%;
                    display: table;
                    clear: both;
                }    
                
            .left {
                width:69%;
                padding-right: 1%;
                float:left;
                display:inline-block;
    
            }
                
            .right {
                width:29%;
                padding-right: 1%;
                float:left;
                display:inline-block;  
                }    
            </style>
            <hr>
            
            
            <div class="row">
            <div style="" class="left">
                <h3>Google Analytics</h3>
                <p>This is where you should add Google Analytics or other tracking scripts</p>
						<textarea id="blogkori_theme_options[googanalytics]" class="large-text" cols="50" rows="5" name="blogkori_theme_options[googanalytics]" onclick="this.focus();this.select()"><?php echo esc_textarea( $options['googanalytics'] ); ?></textarea>
                
                <p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'blogkori' ); ?>" />
			</p>
		
            
            </div>
                
            <div style="" class="right">
                <h3>Useful links</h3>
                <p><a href="https://blogkoritheme.blogspot.com/p/documentation.html" target="_blank" rel="noopener noreferrer">Documentation</a> - <a href="https://blogkoritheme.blogspot.com/p/support.html" target="_blank" rel="noopener noreferrer">Support</a> - <a href="https://blogkori.com" target="_blank" rel="noopener noreferrer">Read my Blog</a></p>
                
                <p>Have a question? Let me know in a tweet..</p>
                <a href="https://twitter.com/intent/tweet?screen_name=tamalweb" class="twitter-mention-button" data-size="small" data-text="(blogkori theme)" data-related="tamalanwar" data-show-count="false">Tweet to @tamalweb</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
				
                <h3>Latest Theme Updates</h3>
                
                
                <div style="padding: 20px;" class="postbox">
                    <?php
                            echo '<div class="rss-widget">';
                         wp_widget_rss_output(array(
                              'url' => 'http://feeds.feedburner.com/blogkoritheme',
                              'title' => 'BlogKori Theme Updates',
                              'items' => 3,
                              'show_summary' => 1,
                              'show_author' => 0,
                              'show_date' => 0
                         ));
                         echo '</div>';

                        ?>

                    <p style="text-align: right;"><a href="https://blogkoritheme.blogspot.com" target="_blank">BlogKori Theme Blog</a>  </p>              
                    </div>
    
                <h3>Video Tutorial</h3>
                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/sM8pryoovTo?rel=0" frameborder="0" allowfullscreen></iframe>
                
				
				<h3>Donations are Welcome</h3>
                
				<p>Loved this theme? Please consider donating to support continuous development:
				
				<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=HS38Y2J2X6Z3J" target="_blank">
				<img src="<?php echo get_template_directory_uri(); ?>/images/donate.png">
				</a>
				
				</p>
				
				<p><b>Bitcoin:</b> <a href="https://blockchain.info/address/17FS5vP44AUdJa5L62md8EP3wNk37LpLQR" target="_blank">17FS5vP44AUdJa5L62md8EP3wNk37LpLQR</a></br>
				
				<b>Ethereum:</b> <a href="https://www.etherchain.org/account/0x6C8E78b709cF2a9e305c5FEC20e08d69E98d3a61" target="_blank">0x6C8E78b709cF2a9e305c5FEC20e08d69E98d3a61</a></br>
				
				<b>Vertcoin:</b> <a href="https://bchain.info/VTC/addr/VbJgEauTWwhXp6aUkgD9ThmwzcM5yL7gbU" target="_blank">VbJgEauTWwhXp6aUkgD9ThmwzcM5yL7gbU</a></br>
				
				
				</p>
                
            </div>
        </div>
         </form>	 
		
	</div>
	<?php
}
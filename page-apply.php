<?php get_header(); ?>
	<?php get_template_part( 'partials/page', 'header' ); ?>
	<?php
		$loggedin = is_user_logged_in();
		$loginformargs = array(
        'echo' => true,
        'redirect' => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
        'form_id' => 'loginform',
        'label_username' => __( 'Username or Email Address' ),
        'label_password' => __( 'Password' ),
        'label_remember' => __( 'Remember Me' ),
        'label_log_in' => __( 'Log In' ),
        'id_username' => 'user_login',
        'id_password' => 'user_pass',
        'id_remember' => 'rememberme',
        'id_submit' => 'wp-submit',
        'remember' => true,
        'value_username' => '',
        'value_remember' => false,
    );
	?>
	<?php if ( !$loggedin ) : ?>
	<section class="flex-basic bg-blue text-center">
		<div class="container">
			<p class="caveat">*To save your form progress for later you must log in before entering data.</p>
			<div class="row">
				<div class="registered col-sm-6 border-right-white">
					<?php wp_login_form($loginformargs); ?>
					<p><a class="lostpwd btn btn-link-white" href="<?php bloginfo('wpurl') ?>/wp-login.php?action=lostpassword">Forgot Password?</a></p>
				</div>
				<div class="notregistered col-sm-6">
						<h2>Not Registered?</h2>
						<p><a class="register btn btn-white-hollow" href="<?php bloginfo('wpurl') ?>/wp-login.php?action=register">Create Account</a></p>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php if ( $loggedin ) : ?>
	<section class="userinformation">
		<div class="container">
	<?php global $current_user; get_currentuserinfo(); ?>
  <?php echo 'Hello, '.$current_user->user_firstname." ".$current_user->user_lastname; ?><br>
	<a href="<?php echo wp_logout_url(get_permalink()); ?>">Not you?, Logout</a>
</div>
</section>
	<section class="flex-basic bg-white text-centerheader">
		<div class="container">
				<?php the_field('registered_user_form'); ?>
		</div>
	</section>
<?php endif; ?>
	<?php get_template_part( 'partials/acf', 'flex' ); ?>
<?php get_footer(); ?>

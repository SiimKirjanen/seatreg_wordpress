<?php

/*
	==========================
		SeatReg Admin Page
	==========================
*/

function seatreg_add_plugin_menu() {
	//Generate SeatReg Admin page
	add_menu_page(
		'SeatReg',  //header title
		'SeatReg',  //menu title
		'manage_options',  //capability,
		'seatreg-welcome',   //slug, 
		'seatreg_create_welcome',  //callback
		plugins_url('img/setting_icon.png', dirname(__FILE__) ),     //custom icon. 
		110  //position
	);

	//Generate SeatReg Admin Page Sub Pages
	add_submenu_page(
		'seatreg-welcome',
		sprintf(__('%s Home', 'seatreg'), 'SeatReg'),
		__('Home', 'seatreg'),
		'manage_options',
		'seatreg-welcome',
		'seatreg_create_welcome'
	);
	add_submenu_page(
		'seatreg-welcome',   //slug 
		sprintf(__('%s Overview', 'seatreg'), 'SeatReg'),  //page title
		__('Overview', 'seatreg'),  //menu title
		'manage_options',  //capability
		'seatreg-overview',   //slug
		'seatreg_create_overview'  //callback
	);
	add_submenu_page(
		'seatreg-welcome',   //slug 
		sprintf(__('%s Settings', 'seatreg'), 'SeatReg'),  //page title
		__('Settings', 'seatreg'),  //menu title
		'manage_options',  //capability
		'seatreg-options',   //slug
		'seatreg_create_options'
	);
	add_submenu_page(
		'seatreg-welcome',   //slug kuhu sisse submenu tuleb
		sprintf(__('%s Bookings', 'seatreg'), 'SeatReg'),  //page title
		__('Bookings', 'seatreg'),  //menu title
		'manage_options',  //capability
		'seatreg-management',   //slug
		'seatreg_create_management'
	);
}

function seatreg_create_welcome() {
	?>
	<div class="seatreg-wp-admin seatreg_page_seatreg-builder">
		<div class="jumbotron">
		  <h2 class="main-heading"><?php _e('Create and manage seat registrations', 'seatreg'); ?></h2>
		  <p class="jumbotron-text"><?php _e('Design your own seat map and manage seat bookings', 'seatreg'); ?></p>
	    </div>
		<div class="donate-wrap">
			<form action="https://www.paypal.com/donate" method="post" target="_blank">
				<input type="hidden" name="hosted_button_id" value="9QSGHYKHL6NMU" />
				<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
				<img alt="" border="0" src="https://www.paypal.com/en_EE/i/scr/pixel.gif" width="1" height="1" />
			</form>
		</div>
	   <?php 
	   		echo "<div class='container-fluid' style='margin-top:-12px'>";
				seatreg_create_registration_from(); 
				seatreg_generate_my_registrations_section();
			echo "</div>";   
	   	?>
	   <div class="seatreg-builder-popup">
			<i class="fa fa-times-circle builder-popup-close"></i>
			<div class="seatreg-builder-popup-content">
				<?php require( plugin_dir_path( __FILE__ ) . 'builder_content.php'  ); ?>
			</div>
		</div>
	 </div>
	<?php
}

function seatreg_create_options() {
	?>
	<div class="seatreg-wp-admin wrap">
		<h1><span class="glyphicon glyphicon-cog"></span> <?php _e('Settings', 'seatreg'); ?></h1>
		<p><?php _e('Here you can change your registration settings', 'seatreg'); ?>.</p>
		<?php
			seatreg_generate_tabs('seatreg-options');
		?>
		<div class="seatreg-tabs-content">
			<?php
				seatreg_generate_settings_form();
			?>
		</div>
	</div>
	<?php
}

function seatreg_create_overview() {
	?>
		<div class="seatreg-wp-admin wrap">
			<h1><span class="glyphicon glyphicon-stats"></span> <?php _e('Overview'); ?></h1>
			<?php
				seatreg_generate_tabs('seatreg-overview');
			?>
			<div class="seatreg-tabs-content">
				<div id="existing-regs-wrap">
					<?php seatreg_generate_overview_section('overview'); ?> 
				</div>
			</div>
		</div>
	<?php
}

function seatreg_create_management() {
	?>
		<div class="seatreg-wp-admin wrap" id="seatreg-booking-manager">
			<h1><span class="glyphicon glyphicon-book"></span> <?php _e('Booking manager'); ?></h1>
			<?php
				seatreg_generate_tabs('seatreg-management');	
			?>
			<div class="seatreg-tabs-content">
				<?php
					seatreg_generate_booking_manager();
				?>
			</div>
		</div>
	<?php
}
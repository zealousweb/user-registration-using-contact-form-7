<?php
/**
 * Admin Setting Page
 *
 * @package WordPress
 * @package User Registration using Contact Form 7
 * @since 1.0
 */

if ( !defined( 'ABSPATH' ) ) exit;
wp_enqueue_script( 'wp-pointer' );
wp_enqueue_style( 'wp-pointer' );

?>
<div class="wrap">
  <h1><?php echo esc_html__( 'User Registration CF7 Settings', 'user-registration-using-contact-form-7' );?></h1>
  <div class="notice notice-error is-dismissible" id="user-registration-using-contact-form-7" style="display:none;">
    <p><?php echo esc_html__( 'Please fill all mandatory fields.', 'user-registration-using-contact-form-7' ); ?></p>
      <button type="button" class="notice-dismiss"><span class="screen-reader-text"><?php echo esc_html__( 'Please fill all mandatory fields..', 'user-registration-using-contact-form-7' ); ?></span></button>
  </div>
  <form id="setting-form" method="post">
    <?php 
    // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Display check only, actual processing verified in class.zurcf7.admin.php
    if(isset($_REQUEST['setting_zurcf7_submit']) ){?>
    <div class="notice notice-success is-dismissible">
        <p><?php echo esc_html__( 'Settings saved successfully !', 'user-registration-using-contact-form-7' );?></p>
    </div>
    <?php }?>
    <?php 
    // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Display check only, actual processing verified in class.zurcf7.admin.php
    if(isset($_REQUEST['setting_reset']) ){?>
    <div class="notice notice-success is-dismissible">
        <p><?php echo esc_html__( 'Settings are reset successfully !', 'user-registration-using-contact-form-7' );?></p>
    </div>
    <?php }?>

    <?php 
		//Form settings file
		require_once( ZURCF7_DIR .  '/inc/admin/template/' . ZURCF7_PREFIX . '.form.settings.php' );

    //ACF Field Mapping
    require_once( ZURCF7_DIR .  '/inc/admin/template/' . ZURCF7_PREFIX . '.fieldmapping.settings.php' );

    //social Fb registration
    require_once( ZURCF7_DIR .  '/inc/admin/template/' . ZURCF7_PREFIX . '.fb.settings.php' ); 

    ?>


    <p class="submit">
    <input type="hidden" id="_wpnonce" name="_zurcf7_settings_nonce" value="<?php echo esc_attr(wp_create_nonce( 'zurcf7_settings_nonce' ));?>">
      <input type="submit" name="setting_zurcf7_submit" id="setting_zurcf7_submit" class="button button-primary" value="<?php echo esc_attr( 'Save Settings', 'user-registration-using-contact-form-7' );?>">
      <input type="submit" name="setting_reset" id="setting_reset" class="button button-secondary" value="<?php echo esc_attr( 'Reset Settings', 'user-registration-using-contact-form-7' );?>">
    </p>
  </form>
</div>
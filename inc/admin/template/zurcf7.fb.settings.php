<?php
/**
 * FB Setting Page
 *
 * @package WordPress
 * @package User Registration using Contact Form 7 
 * @since 1.0
 */
?>
<!-- Table heading-->
<table class="form-table form-table-heading">
	<tbody>
    	<tr>
      		<th><?php echo esc_html__('Facebook Sign Up Setting','user-registration-using-contact-form-7');?> :</th>
      		<td></td>
    	</tr>
  </tbody>
</table>
<!-- Table Content-->
<table class="form-table" id="form-settings">
	<tbody>
    <tr>
        <td style="color:red;"><?php echo esc_html__('Note : SSL certificate is required for Facebook custom app','user-registration-using-contact-form-7'); ?></td>
    </tr>
    <tr>
        <td colspan="2">
        <?php 
        $zurcf7_domain_name = $zurcf7_callback_fb = $zurcf7_site_url_callback_fb = $zurcf7_fb_signup_app_id = $zurcf7_fb_app_secret = '';
        $zurcf7_domain_name = sanitize_text_field($_SERVER['HTTP_HOST']);  //phpcs:ignore
        $zurcf7_callback_fb = '?socialsignup=facebook';
        $zurcf7_site_url_callback_fb = get_site_url().$zurcf7_callback_fb;
        $zurcf7_fb_signup_app_id = (get_option( 'zurcf7_fb_signup_app_id')) ? get_option( 'zurcf7_fb_signup_app_id') : "";
        $zurcf7_fb_app_secret = (get_option( 'zurcf7_fb_app_secret')) ? get_option( 'zurcf7_fb_app_secret') : "";
        ?>
            <ol>
                <li><?php echo wp_kses( "Go to Facebook developers console <a href='https://developers.facebook.com/apps/' target='_blank'>https://developers.facebook.com/apps/.</a> </li>", "user-registration-using-contact-form-7" ); ?>
                <li><?php echo wp_kses( "Click on Create a New App/Create App. Select Consumer on the Select App type pop-up Click on Continue.</li>", "user-registration-using-contact-form-7" ); ?>
                <li><?php echo wp_kses( "Enter App Display Name, App Contact Email.</li>", "user-registration-using-contact-form-7" ); ?>
                <li><?php echo wp_kses( "Click on Create App button and complete the Security Check.</li>", "user-registration-using-contact-form-7" ); ?>
                <li><?php echo wp_kses( "On add products to your app page click on setup button under facebook login option.</li>", "user-registration-using-contact-form-7" ); ?>
                <li><?php echo wp_kses( "Enter ".$zurcf7_domain_name." in App Domain. Enter your Privacy Policy URL</li>", "user-registration-using-contact-form-7" ); ?>
                <li><?php echo wp_kses( "Under User Data Deletion click on the drop down, Select Data Deletion Instruction URl (Enter the URL of your page with the instructions on how users can delete their accounts on your site).</li>", "user-registration-using-contact-form-7" ); ?>
                <li><?php echo wp_kses( "Select Category of your website. Then click on Save Changes.</li>", "user-registration-using-contact-form-7" ); ?>
                <li><?php echo wp_kses( "On the Left side panel, Click on Facebook Login and select Settings option.</li>", "user-registration-using-contact-form-7" ); ?>
                <li><?php echo wp_kses( "Scroll down and add the following URL to the Valid OAuth redirect URIs field <a>".$zurcf7_site_url_callback_fb."</a> and click on Save Changes button.</li>", "user-registration-using-contact-form-7" ); ?>
                <li><?php echo wp_kses( "Click on the App review tab from the left hand side menu and click on Permissions and Request</li>", "user-registration-using-contact-form-7" ); ?>
                <li><?php echo wp_kses( "Now click on Request Advance Access for public_profile and email. If you want any extra data to be returned you can request permission for those scopes.</li>", "user-registration-using-contact-form-7" ); ?>
                <li><?php echo wp_kses( "In the toolbar Change your app status from In Development to Live by clicking on the toggle button and further Click on Switch Mode.</li>", "user-registration-using-contact-form-7" ); ?>
                <li><?php echo wp_kses( "Go to Settings > Basic. Copy your App ID and App Secret provided by Facebook and paste them into the fields above</li>", "user-registration-using-contact-form-7" ); ?>
                <li><?php echo wp_kses( "Input email, public_profile as scope.</li>", "user-registration-using-contact-form-7" ); ?>
                <li><?php echo wp_kses( "NOTE: If you are asked to Complete Data Use Checkup. Click on the Start Checkup button. Certify Data Use for public_profile and email. Provide consent to Facebook Developer’s Policy and click on submit.</li>", "user-registration-using-contact-form-7" ); ?>
                <li><?php echo wp_kses( "[Optional: Extra attributes] If you want to access the user_birthday, user_hometown, user_location of a Facebook user, you need to send your app for review to Facebook. For submitting an app for review, click <a href='https://developers.facebook.com/docs/app-review/submission-guide' target='_blank'>here.</a> After your app is reviewed, you can add the scopes you have sent for review in the scope above. If your app is not approved or is in the process of getting approved, let the scope be email, public_profile.</li>", "user-registration-using-contact-form-7" ); ?>
            </ol>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <label for="zurcf7_fb_signup_app_id"><?php echo esc_html__('App ID', 'user-registration-using-contact-form-7' ); ?></label><span class="zwt-zurcf7-tooltip" id="zurcf7_fb_signup_app_id_tool"></span>
        </th>
        <td>
            <input name="zurcf7_fb_signup_app_id" id="zurcf7_fb_signup_app_id" type="text" value="<?php echo esc_attr($zurcf7_fb_signup_app_id);?>" class="regular-text zurcf7_alltag"/></br>
        </td>    
    </tr>
    <tr>
        <th scope="row">
            <label for="zurcf7_fb_app_secret"><?php echo esc_html__('App Secret', 'user-registration-using-contact-form-7' ); ?></label><span class="zwt-zurcf7-tooltip" id="zurcf7_fb_app_secret_tool"></span>
        </th>
        <td>
            <input name="zurcf7_fb_app_secret" id="zurcf7_fb_app_secret" type="text" value="<?php echo esc_attr($zurcf7_fb_app_secret);?>" class="regular-text zurcf7_alltag"/></br>
        </td>
    </tr>
    </tbody>
</table>

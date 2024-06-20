<?php
/**
 * Admin Setting Page
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
      <th><?php echo esc_html__('Registration Form Settings','zeal-user-reg-cf7');?> :</th>
      <td></td>
    </tr>
  </tbody>
</table>

<!-- Table Content-->
<table class="form-table" id="form-settings">
  <tbody>
  
    <tr>
      <th scope="row">
        <label for="zurcf7_formid"><?php echo esc_html__( 'Select Registration Form *', 'zeal-user-reg-cf7' ); ?></label>
        <span class="zwt-zurcf7-tooltip" id="zurcf7_formid_msg"></span>
      </th>
      <td>
        <select id="zurcf7_formid" name="zurcf7_formid">
        <option value=""><?php echo esc_html__( 'Select form', 'zeal-user-reg-cf7' ); ?></option>
        <?php foreach($cf7forms as $cf7form){?>
          <option value="<?php echo esc_attr( $cf7form->ID ); ?>" <?php echo selected( $zurcf7_formid, $cf7form->ID, false ); ?>><?php echo esc_html( $cf7form->post_title ); ?></option>
        <?php } ?>
        </select>
      </td>
    </tr>

    

    <tr>
      <th scope="row">
        <label for="zurcf7_debug_mode_status"><?php echo esc_html__( 'Enable Debug Mode', 'zeal-user-reg-cf7' ); ?></label>
        <span class="zwt-zurcf7-tooltip" id="zurcf7_debug_mode_status_msg"></span>
      </th>
      <td>
        <input type="checkbox" name="zurcf7_debug_mode_status" id="zurcf7_debug_mode_status" value="1" <?php echo checked( $zurcf7_debug_mode_status, 1, true );?>>
        <code><?php echo esc_html__( 'Log File Location', 'zeal-user-reg-cf7' ); ?> : /wp-content/uploads/zurcf7-log/</code>
      </td>
      
    </tr>

    <tr>
      <th scope="row">
        <label for="zurcf7_skipcf7_email"><?php echo esc_html__( 'Skip Contact Form 7 Email', 'zeal-user-reg-cf7' ); ?></label>
        <span class="zwt-zurcf7-tooltip" id="zurcf7_skipcf7_email_msg"></span>
      </th>
      <td>
        <input type="checkbox" name="zurcf7_skipcf7_email" id="zurcf7_skipcf7_email" value="1" <?php echo checked( $zurcf7_skipcf7_email, 1, false );?>>
      </td>
    </tr>
    <tr>
      <th scope="row">
        <label for="zurcf7_enable_sent_login_url"><?php echo esc_html__( 'Enable sent Login URL in Mail.', 'zeal-user-reg-cf7' ); ?></label>
        <span class="zwt-zurcf7-tooltip" id="zurcf7_enable_sent_login_url"></span>
      </th>
      <td>
        <input type="checkbox" name="zurcf7_enable_sent_login_url" id="zurcf7_enable_sent_login_url" value="1" <?php echo checked( $zurcf7_enable_sent_login_url, 1, false );?>>
      </td>
    </tr>

    

    <?php $editable_roles = get_editable_roles();
    foreach ($editable_roles as $role => $details) {  //phpcs:ignore
        $sub['role'] = esc_attr($role);
        $sub['name'] = translate_user_role($details['name']);
        $roles[] = $sub;
    }?>
    <tr>
      <th scope="row">
        <label for="zurcf7_userrole_field"><?php echo esc_html__( 'Select User Role Field *', 'zeal-user-reg-cf7' ); ?></label>
        <span class="zwt-zurcf7-tooltip" id="zurcf7_userrole_field_msg"></span>
      </th>
      <td>
        <select id="zurcf7_userrole_field" name="zurcf7_userrole_field" class="">
        <?php if(!empty($editable_roles)){?>
            <option value=""><?php echo esc_html__( 'Select Role', 'zeal-user-reg-cf7' ); ?></option>
            <?php 
            foreach($editable_roles as $role => $details){ //phpcs:ignore ?> 
              <option value="<?php echo esc_attr($role);?>" <?php echo selected( $zurcf7_userrole_field, $role, false );?>><?php echo esc_html__( translate_user_role($details['name']), 'zeal-user-reg-cf7' ); ?></option>
            <?php }
            }else{?>
            <option value=""><?php echo esc_html__( 'No Role found', 'zeal-user-reg-cf7' ); ?></option>
            <?php } ?>
        </select>
      </td>
    </tr>

    <tr>
      <th scope="row">
        <label for="zurcf7_email_field"><?php echo esc_html__( 'Select Email Field *', 'zeal-user-reg-cf7' ); ?></label>
        <span class="zwt-zurcf7-tooltip" id="zurcf7_email_field_msg"></span>
      </th>
      <td>
      
        <select id="zurcf7_email_field" name="zurcf7_email_field" class="zurcf7_alltag">
          <?php if(!empty($tags)){?>
            <option value=""><?php echo esc_html__( 'Select field', 'zeal-user-reg-cf7' ); ?></option>
            <?php foreach($tags as $tag){ //phpcs:ignore?>
              <option value="<?php echo esc_attr($tag);?>" <?php echo selected( $zurcf7_email_field, $tag, false );?>>[<?php echo esc_html__( $tag, 'zeal-user-reg-cf7' ); ?>]</option>
            <?php }
            }else{?>
            <option value=""><?php echo esc_html__( 'No tag found', 'zeal-user-reg-cf7' ); ?></option>
            <?php } ?>
        </select>
        
      </td>
    </tr>

    <tr>
      <th scope="row">
        <label for="zurcf7_username_field"><?php echo esc_html__( 'Select Username Field *', 'zeal-user-reg-cf7' ); ?></label>
        <span class="zwt-zurcf7-tooltip" id="zurcf7_username_field_msg"></span>
      </th>
      <td>
        <select id="zurcf7_username_field" name="zurcf7_username_field" class="zurcf7_alltag">
        <?php if(!empty($tags)){?>
            <option value=""><?php echo esc_html__( 'Select field', 'zeal-user-reg-cf7' ); ?></option>
            <?php 
            foreach($tags as $tag){ //phpcs:ignore ?>
              <option value="<?php echo esc_attr($tag);?>" <?php echo selected( $zurcf7_username_field, $tag, false );?>>[<?php echo esc_html__( $tag, 'zeal-user-reg-cf7' ); ?>]</option>
            <?php }
            }else{?>
            <option value=""><?php echo esc_html__( 'No tag found', 'zeal-user-reg-cf7' ); ?></option>
            <?php } ?>
        </select>
      </td>
    </tr>

    <?php $pages =  get_pages(); //phpcs:ignore ?> 
    <tr>
      <th scope="row">
        <label for="zurcf7_successurl_field"><?php echo esc_html__( 'Select Success URL', 'zeal-user-reg-cf7' ); ?></label>
        <span class="zwt-zurcf7-tooltip" id="zurcf7_successurl_field_msg"></span>
      </th>
      <td>
        <select id="zurcf7_successurl_field" name="zurcf7_successurl_field">
          <option value=""><?php echo esc_html__( 'Select Page', 'zeal-user-reg-cf7' ); ?></option>
          <?php foreach($pages as $page){ //phpcs:ignore?>
            <option value="<?php echo esc_attr($page->ID);?>" <?php echo selected( $zurcf7_successurl_field, $page->ID, false );?>><?php echo esc_html__( $page->post_title, 'zeal-user-reg-cf7' ); ?></option>
          <?php }?>          
        </select>        
      </td>
    </tr>
  </tbody>
</table>
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
      		<th><?php echo esc_html__('ACF Field Mapping','user-registration-using-contact-form-7');?> :</th>
      		<td></td>
    	</tr>
  </tbody>
</table>
<!-- Table Content-->
<table class="form-table" id="form-settings">
	<tbody>
  		<?php if ( is_plugin_active( 'advanced-custom-fields/acf.php' ) || is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) { 
			$zurcf7_returnfieldarr = zurcf7_ACF_filter_array_function(); ?>
				<tr>
					<td>
						<?php echo esc_html__('ACF Field Mapping ','user-registration-using-contact-form-7'); ?><span class="zwt-zurcf7-tooltip" id="zurcf7_acf_field_mapping"></span>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<?php echo wp_kses_post( __('1. Supported ACF Fields: Text, Textarea, Checkbox, Radio, Select(Dropdown with multiple Select), Number, Date Picker, Email, Link, Date picker, Date Timepicker, Password.<br>2. To avoid conflict use same field name and Type while configuring & mapping ACF fields and cf7 fields.<br>3. Make sure option values are correct while configuring Dropdown, Radio, Checkbox Fields', 'user-registration-using-contact-form-7') ); ?>
					</td>
				</tr>
				<?php 
				if(!empty($zurcf7_returnfieldarr) || $zurcf7_returnfieldarr['message'] !== '0') { 
					$zurcf7_count = 0;
					foreach ($zurcf7_returnfieldarr['response'] as $zurcf7_value) { 
						if(!empty($zurcf7_value['field_name'])){
							$zurcf7_field_name= $zurcf7_value['field_name'];
							if(isset($_POST['zurcf7_formid'])){  //phpcs:ignore
								$zurcf7_formid = $_POST['zurcf7_formid']; //phpcs:ignore
							}
							$zurcf7_field_name = $zurcf7_value['field_name'];
							$zurcf7_field_label = $zurcf7_value['field_label'];
							if($zurcf7_count != 3) { ?>
							<tr>
								<th scope="row">
									<label for="zurcf7_ACF_field"><?php echo esc_html( $zurcf7_field_label ); ?></label>
								</th>
								<td>
									<select id="zurcf7_ACF_field_<?php echo esc_html($zurcf7_count); ?>" name="<?php echo esc_attr($zurcf7_field_name); ?>" class="zurcf7_alltag zurcf7_ACF_field.<?php echo esc_attr($zurcf7_field_name); ?>">	
											<option value=""><?php echo esc_html__( 'Select field', 'user-registration-using-contact-form-7' ); ?></option>
											<?php 
											if(!empty($tags)){ ?>
												<?php foreach($tags as $tag){ //phpcs:ignore
													$zurcf7_selected = '';
													$zurcf7_checked_val =  (get_option($zurcf7_field_name)) ? get_option($zurcf7_field_name) : "";
													if($zurcf7_checked_val == $tag){ 
														$zurcf7_selected='selected';
													}	
												?>
													<option value="<?php echo esc_attr( $tag ); ?>" <?php echo esc_attr( $zurcf7_selected ); ?>>[<?php echo esc_html( $tag ); ?>]</option>
												<?php }
											}else{ ?>
												<option value=""><?php echo esc_html__( 'No tag found', 'user-registration-using-contact-form-7' ); ?></option>
										<?php } ?>
									</select>
								</td>
							</tr>
							<?php 
						 }else{ ?>
							<tr>
								<td><?php echo esc_html__('Unlock additional fields by upgrading to the','user-registration-using-contact-form-7');?> <a href="https://www.zealousweb.com/store/user-registration-using-contact-form-7-pro" target="_blank"> <?php echo esc_html__( 'Pro version', 'user-registration-using-contact-form-7' ); ?></a></td>
						 	</tr>
						 <?php }
						}
						 $zurcf7_count++;
					} ?>
				
			<?php 
			}else{
				if(!empty($zurcf7_returnfieldarr['message']) == '0'){
					echo esc_html( $message );
				}
			} ?>
		</div>
		<?php }else{ ?>
			<tr>
				<td colspan="2">
				<?php echo esc_html__('Activate the Advanced Custom Fields (ACF) plugin to utilize these amazing feature','user-registration-using-contact-form-7'); ?>
				</td>
			</tr>
			<tr>
				<td>
					<img src="<?php echo esc_url(ZURCF7_URL) .'assets/images/zurcf7-acf-img1.png';?>" alt="" width="100%" height="100%">
				</td>
				<td>
					<img src="<?php echo esc_url(ZURCF7_URL) .'assets/images/zurcf7-acf-img2.png';?>" alt="" width="100%" height="100%">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<?php echo esc_html__('Please note that the instructions provided here assume you have already installed the ACF plugin. If you haven`t installed it yet, you can download it from the official WordPress plugin repository or install it using the `Add New` option in the `Plugins` menu.','user-registration-using-contact-form-7'); ?>
				</td>
			</tr>
	<?php } ?>
  </tbody>
</table>
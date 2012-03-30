<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( '960gs_options', '960gs_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', '960gs' ), __( 'Theme Options', '960gs' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create arrays for our select and radio options
 */
$select_options = array(
	'0' => array(
		'value' =>	'0',
		'label' => __( 'Zero', '960gs' )
	),
	'1' => array(
		'value' =>	'1',
		'label' => __( 'One', '960gs' )
	),
	'2' => array(
		'value' => '2',
		'label' => __( 'Two', '960gs' )
	),
	'3' => array(
		'value' => '3',
		'label' => __( 'Three', '960gs' )
	),
	'4' => array(
		'value' => '4',
		'label' => __( 'Four', '960gs' )
	),
	'5' => array(
		'value' => '3',
		'label' => __( 'Five', '960gs' )
	)
);

$radio_options = array(
	'yes' => array(
		'value' => 'yes',
		'label' => __( 'Yes', '960gs' )
	),
	'no' => array(
		'value' => 'no',
		'label' => __( 'No', '960gs' )
	),
	'maybe' => array(
		'value' => 'maybe',
		'label' => __( 'Maybe', '960gs' )
	)
);

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', '960gs' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', '960gs' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( '960gs_options' ); ?>
			<?php $options = get_option( '960gs_theme_options' ); ?>

			<table class="form-table">

				<?php
				/**
				 * A 960gs checkbox option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'A checkbox', '960gs' ); ?></th>
					<td>
						<input id="960gs_theme_options[option1]" name="960gs_theme_options[option1]" type="checkbox" value="1" <?php checked( '1', $options['option1'] ); ?> />
						<label class="description" for="960gs_theme_options[option1]"><?php _e( 'sample checkbox', '960gs' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * A 960gs text input option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Some text', '960gs' ); ?></th>
					<td>
						<input id="960gs_theme_options[sometext]" class="regular-text" type="text" name="960gs_theme_options[sometext]" value="<?php esc_attr_e( $options['sometext'] ); ?>" />
						<label class="description" for="960gs_theme_options[sometext]"><?php _e( 'sample text input', '960gs' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * A 960gs select input option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Select input', '960gs' ); ?></th>
					<td>
						<select name="960gs_theme_options[selectinput]">
							<?php
								$selected = $options['selectinput'];
								$p = '';
								$r = '';

								foreach ( $select_options as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
						</select>
						<label class="description" for="960gs_theme_options[selectinput]"><?php _e( 'sample select input', '960gs' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * A 960gs of radio buttons
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Radio buttons', '960gs' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Radio buttons', '960gs' ); ?></span></legend>
						<?php
							if ( ! isset( $checked ) )
								$checked = '';
							foreach ( $radio_options as $option ) {
								$radio_setting = $options['radioinput'];

								if ( '' != $radio_setting ) {
									if ( $options['radioinput'] == $option['value'] ) {
										$checked = "checked=\"checked\"";
									} else {
										$checked = '';
									}
								}
								?>
								<label class="description"><input type="radio" name="960gs_theme_options[radioinput]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> /> <?php echo $option['label']; ?></label><br />
								<?php
							}
						?>
						</fieldset>
					</td>
				</tr>

				<?php
				/**
				 * A 960gs textarea option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'A textbox', '960gs' ); ?></th>
					<td>
						<textarea id="960gs_theme_options[sometextarea]" class="large-text" cols="50" rows="10" name="960gs_theme_options[sometextarea]"><?php echo esc_textarea( $options['sometextarea'] ); ?></textarea>
						<label class="description" for="960gs_theme_options[sometextarea]"><?php _e( 'sample text box', '960gs' ); ?></label>
					</td>
				</tr>
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', '960gs' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $radio_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );

	// Say our text option must be safe text with no HTML tags
	$input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['selectinput'], $select_options ) )
		$input['selectinput'] = null;

	// Our radio option must actually be in our array of radio options
	if ( ! isset( $input['radioinput'] ) )
		$input['radioinput'] = null;
	if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
		$input['radioinput'] = null;

	// Say our textarea option must be safe text with the allowed tags for posts
	$input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/
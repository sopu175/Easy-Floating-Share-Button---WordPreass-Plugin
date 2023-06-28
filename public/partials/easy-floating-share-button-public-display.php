<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://github.com/sopu175/
 * @since      1.0.0
 *
 * @package    Easy_Floating_Share_Button
 * @subpackage Easy_Floating_Share_Button/public/partials
 */
?>

    <!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php

// Check if it's a single post page
$is_single_post = is_singular( 'post' );

// Retrieve button style option from the WordPress options table
$button_style = sanitize_text_field( get_option( 'efsb_button_style' ) );

// Retrieve button style font option from the WordPress options table
$button_style_font = sanitize_text_field( get_option( 'efsb_button_style_font' ) );

// Retrieve enable floating icon option from the WordPress options table
$enable_floating_icon = sanitize_text_field( get_option( 'efsb_enable_floating_icon' ) );

// Get the post title
$post_title = get_the_title();

// Get the post URL
$post_url = esc_url( get_permalink() );

// Retrieve enable Facebook option from the WordPress options table
$enable_facebook = sanitize_text_field( get_option( 'efsb_enable_facebook' ) );

// Retrieve enable Instagram option from the WordPress options table
$enable_instagram = sanitize_text_field( get_option( 'efsb_enable_instagram' ) );

// Retrieve enable LinkedIn option from the WordPress options table
$enable_linkedin = sanitize_text_field( get_option( 'efsb_enable_linkedin' ) );

// Retrieve enable Skype option from the WordPress options table
$enable_skype = sanitize_text_field( get_option( 'efsb_enable_skype' ) );

// Retrieve enable Twitter option from the WordPress options table
$enable_twitter = sanitize_text_field( get_option( 'efsb_enable_twitter' ) );

// Retrieve enable Email option from the WordPress options table
$enable_email = sanitize_text_field( get_option( 'efsb_enable_email' ) );

// Retrieve enable Pinterest option from the WordPress options table
$enable_pinterest = sanitize_text_field( get_option( 'efsb_enable_printerest' ) );

// Retrieve enable WhatsApp option from the WordPress options table
$enable_whatsapp = sanitize_text_field( get_option( 'efsb_enable_whatsapp' ) );

// Retrieve enable Messenger option from the WordPress options table
$enable_messenger = sanitize_text_field( get_option( 'efsb_enable_messenger' ) );

// Retrieve enable Telegram option from the WordPress options table
$enable_telegram = sanitize_text_field( get_option( 'efsb_enable_telegram' ) );


if ( $enable_floating_icon ) {
// Sanitize and prepare URLs
	$post_url   = esc_url( $post_url );
	$post_title = esc_html( $post_title );

// Facebook
	$facebook_url = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode( $post_url );

// Twitter
	$twitter_url = 'https://twitter.com/share?url=' . urlencode( $post_url ) . '&text=' . urlencode( $post_title );

// Instagram (Direct sharing is not available, so we can only provide a link to the Instagram page)
	$instagram_url = 'https://www.instagram.com/';

// Pinterest
	$pinterest_url = 'https://pinterest.com/pin/create/button/?url=' . urlencode( $post_url ) . '&media=' . urlencode( get_the_post_thumbnail_url() ) . '&description=' . urlencode( $post_title );

// Email
	$email_subject = 'Check out this post: ' . $post_title;
	$email_body    = 'Hey,\n\nI found this interesting post that I wanted to share with you:\n\n' . $post_title . '\n' . $post_url;
	$email_url     = 'mailto:?subject=' . rawurlencode( $email_subject ) . '&body=' . rawurlencode( $email_body );

// LinkedIn
	$linkedin_url = 'https://www.linkedin.com/sharing/share-offsite/?url=' . urlencode( $post_url ) . '&title=' . urlencode( $post_title );

// Skype
	$skype_url = 'https://web.skype.com/share?url=' . urlencode( $post_url ) . '&text=' . urlencode( $post_title );

// WhatsApp
	$whatsapp_url = 'https://api.whatsapp.com/send?text=' . rawurlencode( $post_title . ' - ' . $post_url );

// Facebook Messenger
	$messenger_url = 'https://www.facebook.com/dialog/send?link=' . urlencode( $post_url ) . '&app_id=YOUR_APP_ID';

// Telegram
	$telegram_url = 'https://t.me/share/url?url=' . urlencode( $post_url ) . '&text=' . urlencode( $post_title );

	if ( $enable_floating_icon && $button_style ) {
		?>
        <div class="efsb-floating-button <?php echo esc_attr( $button_style ); ?> <?php echo esc_attr( $button_style_font ); ?>">
            <ul>
				<?php if ( $facebook_url && $enable_facebook ) : ?>
                    <li class="facebook">
                        <a href="<?php echo esc_url( $facebook_url ); ?>" target="_blank">
                            <i class="fab fa fa-facebook-square"></i>
                        </a>
                    </li>
				<?php endif; ?>

				<?php if ( $twitter_url && $enable_twitter ) : ?>
                    <li class="twitter">
                        <a href="<?php echo esc_url( $twitter_url ); ?>" target="_blank">
                            <i class="fab fa fa-twitter-square"></i>
                        </a>
                    </li>
				<?php endif; ?>

				<?php if ( $pinterest_url && $enable_pinterest ) : ?>
                    <li class="pinterest">
                        <a href="<?php echo esc_url( $pinterest_url ); ?>" target="_blank">
                            <i class="fab fa fa-pinterest-square"></i>
                        </a>
                    </li>
				<?php endif; ?>

				<?php if ( $email_url && $enable_email ) : ?>
                    <li class="envelope">
                        <a href="<?php echo esc_url( $email_url ); ?>" target="_blank">
                            <i class="fas fa fa-envelope"></i>
                        </a>
                    </li>
				<?php endif; ?>

				<?php if ( $linkedin_url && $enable_linkedin ) : ?>
                    <li class="linkedin">
                        <a href="<?php echo esc_url( $linkedin_url ); ?>" target="_blank">
                            <i class="fab fa fa-linkedin"></i>
                        </a>
                    </li>
				<?php endif; ?>

				<?php if ( $skype_url && $enable_skype ) : ?>
                    <li class="skype">
                        <a href="<?php echo esc_url( $skype_url ); ?>" target="_blank">
                            <i class="fab fa fa-skype"></i>
                        </a>
                    </li>
				<?php endif; ?>

				<?php if ( $whatsapp_url && $enable_whatsapp ) : ?>
                    <li class="whatsapp">
                        <a href="<?php echo esc_url( $whatsapp_url ); ?>" target="_blank">
                            <i class="fab fa fa-whatsapp"></i>
                        </a>
                    </li>
				<?php endif; ?>

				<?php if ( $messenger_url && $enable_messenger ) : ?>
                    <li class="messenger">
                        <a href="<?php echo esc_url( $messenger_url ); ?>" target="_blank">
                            <i class="fab fa fa-facebook-messenger"></i>
                        </a>
                    </li>
				<?php endif; ?>

				<?php if ( $telegram_url && $enable_telegram ) : ?>
                    <li class="telegram">
                        <a href="<?php echo esc_url( $telegram_url ); ?>" target="_blank">
                            <i class="fab fa fa-telegram"></i>
                        </a>
                    </li>
				<?php endif; ?>
            </ul>
        </div>

		<?php
	}
}





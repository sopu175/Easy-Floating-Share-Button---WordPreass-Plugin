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

$is_single_post       = is_singular( 'post' ); // Check if it's a single post page
$button_style         = get_option( 'efsb_button_style' );
$button_style_font         = get_option( 'efsb_button_style_font' );
$enable_floating_icon = get_option( 'efsb_enable_floating_icon' );

$post_title = get_the_title(); // Get the post title
$post_url   = get_permalink(); // Get the post URL
$enable_facebook = get_option( 'efsb_enable_facebook' );
$enable_instragram = get_option( 'efsb_enable_instagram' );
$enable_linkedin = get_option( 'efsb_enable_linkedin' );
$enable_skype = get_option( 'efsb_enable_skype' );
$enable_twitter = get_option( 'efsb_enable_twitter' );
$enable_email = get_option( 'efsb_enable_email' );
$enable_printerest = get_option( 'efsb_enable_printerest' );
$enable_whatsapp = get_option( 'efsb_enable_whatsapp' );
$enable_messenger = get_option( 'efsb_enable_messenger' );
$enable_telegram = get_option( 'efsb_enable_telegram' );


if ( $enable_floating_icon  ) {
	// Facebook
	$facebook_url = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode( $post_url ) ;
//$facebook_url = 'https://www.facebook.com/dialog/share?app_id=YOUR_APP_ID&display=popup&href=' . urlencode($post_url);
// Twitter
	$twitter_url = 'https://twitter.com/share?url=' . urlencode( $post_url ) . '&text=' . urlencode( $post_title );

// Instagram (Direct sharing is not available, so we can only provide a link to the Instagram page)
	$instagram_url = 'https://www.instagram.com/';

// Pinterest
	$pinterest_url = 'https://pinterest.com/pin/create/button/?url=' . urlencode( $post_url ) . '&media=' . urlencode( get_the_post_thumbnail_url() ) . '&description=' . urlencode( $post_title );
// Email
	$email_subject = 'Check out this post: ' . $post_title;
	$email_body    = 'Hey,\n\nI found this interesting post that I wanted to share with you:\n\n' . $post_title . '\n' . $post_url;
	$email_url     = 'mailto:?subject=' . urlencode( $email_subject ) . '&body=' . urlencode( $email_body );

// LinkedIn
	$linkedin_url = 'https://www.linkedin.com/sharing/share-offsite/?url=' . urlencode( $post_url ) . '&title=' . urlencode( $post_title );

// Skype
	$skype_url = 'https://web.skype.com/share?url=' . urlencode( $post_url ) . '&text=' . urlencode( $post_title );
// WhatsApp
	$whatsapp_url = 'https://api.whatsapp.com/send?text=' . urlencode( $post_title . ' - ' . $post_url );
// Facebook Messenger
	$messenger_url = 'https://www.facebook.com/dialog/send?link=' . urlencode( $post_url ) . '&app_id=YOUR_APP_ID';

// Telegram
	$telegram_url = 'https://t.me/share/url?url=' . urlencode( $post_url ) . '&text=' . urlencode( $post_title );

	if ( $enable_floating_icon && $button_style ) {
		?>
        <div class="efsb-floating-button <?= $button_style ?> <?= $button_style_font ?>">
            <ul>

				<?php
				if ( $facebook_url && $enable_facebook ) {
					?>
                    <li class="facebook">
                        <a href="<?= $facebook_url ?>" target="_blank">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                    </li>

					<?php
				}
				?>
				<?php
				if ( $twitter_url && $enable_twitter ) {
					?>
                    <li class="twitter">

                        <a href="<?= $twitter_url ?>" target="_blank">
                            <i class="fab fa-twitter-square"></i>
                        </a>
                    </li>

					<?php
				}
				?>
				<?php
				if ( $pinterest_url && $enable_printerest ) {
					?>
                    <li class="pinterest">
                        <a href="<?= $pinterest_url ?>" target="_blank">
                            <i class="fab fa-pinterest-square"></i>
                        </a>
                    </li>
					<?php
				}
				?>

				<?php
				if ( $email_url  && $enable_email) {
					?>
                    <li class="envelope">

                        <a href="<?= $email_url ?>" target="_blank">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </li>

					<?php
				}
				?>

				<?php
				if ( $linkedin_url && $enable_linkedin ) {
					?>
                    <li class="linkedin">

                        <a href="<?= $linkedin_url ?>" target="_blank">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </li>

					<?php
				}
				?>

				<?php
				if ( $skype_url  && $enable_skype) {
					?>
                    <li class="skype">

                        <a href="<?= $skype_url ?>" target="_blank">
                            <i class="fab fa-skype"></i>
                        </a>
                    </li>

					<?php
				}
				?>


				<?php
				if ( $whatsapp_url && $enable_whatsapp ) {
					?>
                    <li class="whatsapp">

                        <a href="<?= $whatsapp_url ?>" target="_blank">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </li>

					<?php
				}
				?>



				<?php
				if ( $messenger_url && $enable_messenger ) {
					?>
                    <li class="messenger">

                        <a href="<?= $messenger_url ?>" target="_blank">
                            <i class="fab fa-facebook-messenger"></i>
                        </a>
                    </li>

					<?php
				}
				?>



				<?php
				if ( $telegram_url  && $enable_telegram) {
					?>
                    <li class="telegram">

                        <a href="<?= $telegram_url ?>" target="_blank">
                            <i class="fab fa-telegram"></i>
                        </a>
                    </li>

					<?php
				}
				?>


            </ul>
        </div>

		<?php
	}
}





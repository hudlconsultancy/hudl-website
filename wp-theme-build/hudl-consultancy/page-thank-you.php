<?php
/**
 * Template Name: Thank You
 *
 * Confirmation page shown after the consultation form is submitted.
 * Automatically used for the Page with the slug "thank-you", and also
 * selectable as a page template. Matches the original thank-you.html design.
 *
 * @package HUDL_Consultancy
 */

// Keep the confirmation page out of search results.
add_action(
	'wp_head',
	function () {
		echo '<meta name="robots" content="noindex, nofollow" />' . "\n";
	}
);

get_header();
?>
<main id="main-content">
	<section class="thank-you-section">
		<div class="thank-you-card">
			<div class="tick-wrap" aria-hidden="true">
				<svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
					<polyline points="20 6 9 17 4 12"></polyline>
				</svg>
			</div>

			<span class="ty-tag"><?php esc_html_e( 'Consultation Request Received', 'hudl-consultancy' ); ?></span>

			<?php if ( have_posts() ) : ?>
				<?php
				while ( have_posts() ) :
					the_post();
					// If the page has body content, show it; otherwise fall back to the default copy.
					$hudl_ty_content = trim( wp_strip_all_tags( get_the_content() ) );
					?>
					<?php if ( '' !== $hudl_ty_content ) : ?>
						<h1><?php the_title(); ?></h1>
						<div class="ty-lede"><?php the_content(); ?></div>
					<?php else : ?>
						<h1>THANK YOU<br><span><?php esc_html_e( "WE'LL BE IN TOUCH", 'hudl-consultancy' ); ?></span></h1>
						<p class="ty-lede"><?php esc_html_e( "Thanks for reaching out — we've got your details and", 'hudl-consultancy' ); ?> <strong><?php esc_html_e( "we'll be in touch shortly", 'hudl-consultancy' ); ?></strong> <?php esc_html_e( 'to arrange your free consultation.', 'hudl-consultancy' ); ?></p>
						<p class="ty-lede"><?php esc_html_e( "In the meantime, have a look at what we've been up to.", 'hudl-consultancy' ); ?></p>
					<?php endif; ?>
					<?php
				endwhile;
				?>
			<?php else : ?>
				<h1>THANK YOU<br><span><?php esc_html_e( "WE'LL BE IN TOUCH", 'hudl-consultancy' ); ?></span></h1>
				<p class="ty-lede"><?php esc_html_e( "Thanks for reaching out — we've got your details and", 'hudl-consultancy' ); ?> <strong><?php esc_html_e( "we'll be in touch shortly", 'hudl-consultancy' ); ?></strong> <?php esc_html_e( 'to arrange your free consultation.', 'hudl-consultancy' ); ?></p>
			<?php endif; ?>

			<div class="ty-divider" aria-hidden="true"></div>

			<div class="what-next">
				<h3><?php esc_html_e( 'What happens next', 'hudl-consultancy' ); ?></h3>
				<ul>
					<li><span class="num">01</span><span><?php esc_html_e( 'One of the HUDL team will review your enquiry and reach out to arrange a call at a time that suits you.', 'hudl-consultancy' ); ?></span></li>
					<li><span class="num">02</span><span><?php esc_html_e( "We'll spend 30 minutes understanding your business, your goals and where your marketing is falling short.", 'hudl-consultancy' ); ?></span></li>
					<li><span class="num">03</span><span><?php esc_html_e( "We'll come back to you with honest thinking on where we can add the most value — no fluff, no hard sell.", 'hudl-consultancy' ); ?></span></li>
				</ul>
			</div>

			<div class="btn-row">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ty-btn">
					<svg width="14" height="14" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M13 8H3M7 4L3 8l4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
					<?php esc_html_e( 'Back to Homepage', 'hudl-consultancy' ); ?>
				</a>
				<?php
				$hudl_blog_url = get_post_type_archive_link( 'post' );
				if ( ! $hudl_blog_url ) {
					$hudl_blog_url = home_url( '/' );
				}
				?>
				<a href="<?php echo esc_url( $hudl_blog_url ); ?>" class="ty-btn-secondary"><?php esc_html_e( 'Read Our Insights', 'hudl-consultancy' ); ?></a>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();

<?php
/**
 * Kinetic scroll hero (Variant B — "spin converge").
 *
 * The <h1> ships with the real headline text for SEO / no-JS. hero-kinetic.js
 * splits it into letters and animates them into place on scroll. Without JS or
 * with reduced-motion the section renders as a normal, fully-assembled hero.
 *
 * @package HUDL_Consultancy
 */

?>
<section id="hero" class="kh-hero" aria-label="<?php esc_attr_e( 'Hero', 'hudl-consultancy' ); ?>">
	<div class="kh-sticky">
		<div class="kh-stage">
			<div class="kh-stripes" aria-hidden="true">
				<span></span><span></span><span></span><span></span>
			</div>
			<div class="kh-inner">
				<p class="kh-eyebrow"><?php esc_html_e( 'Marketing Consultancy — Since 2020', 'hudl-consultancy' ); ?></p>

				<?php // Real headline text — JS tokenises it; the word "HUDL" gets the four brand colours. ?>
				<h1 class="kh-headline">Let's HUDL together and grow</h1>

				<p class="kh-subline"><?php esc_html_e( 'Strategic clarity, creative insight, measurable results. HUDL aligns your marketing with commercial goals — sharpening your brand, optimising performance, and driving sustainable growth.', 'hudl-consultancy' ); ?></p>

				<div class="kh-actions">
					<a class="kh-btn-primary" href="#cta">
						<?php esc_html_e( 'Book Your Free Consultation', 'hudl-consultancy' ); ?>
						<span class="kh-arrow-cta" aria-hidden="true">→</span>
					</a>
					<a class="kh-btn-secondary" href="#services"><?php esc_html_e( 'Our Services', 'hudl-consultancy' ); ?></a>
				</div>
			</div>

			<div class="kh-scrollhint" aria-hidden="true">
				<span class="kh-scrollhint-label"><?php esc_html_e( 'Scroll to assemble', 'hudl-consultancy' ); ?></span>
				<span class="kh-scrollhint-arrow">↓</span>
			</div>
		</div>
	</div>
</section>

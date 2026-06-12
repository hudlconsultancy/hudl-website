<?php
/**
 * The footer: site-wide footer and closing document markup.
 *
 * @package HUDL_Consultancy
 */

$hudl_email = antispambot( 'contact@hudl.gg' );
?>
</div><!-- #content -->

<!-- ===== FOOTER ===== -->
<footer class="site-footer" role="contentinfo">
	<div class="container">
		<div class="footer-top">
			<div class="footer-brand">
				<div class="logo"><?php echo hudl_wordmark(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
				<p><?php esc_html_e( 'A UK-based strategic marketing consultancy helping businesses of all sizes grow through brand strategy, performance media, and commercial clarity. Since 2020.', 'hudl-consultancy' ); ?></p>
				<div class="socials" aria-label="<?php esc_attr_e( 'Social media links', 'hudl-consultancy' ); ?>">
					<a href="https://www.linkedin.com/company/hudl-esports/" class="social-link" aria-label="<?php esc_attr_e( 'HUDL on LinkedIn', 'hudl-consultancy' ); ?>" target="_blank" rel="noopener noreferrer">in</a>
				</div>
			</div>
			<div style="text-align: right;">
				<p style="font-size: 11px; letter-spacing: 3px; text-transform: uppercase; color: var(--muted); margin-bottom: 16px; font-family: var(--font-display);"><?php esc_html_e( 'Get In Touch', 'hudl-consultancy' ); ?></p>
				<a href="mailto:<?php echo esc_attr( $hudl_email ); ?>" style="font-family: var(--font-display); font-size: 28px; letter-spacing: 1px; color: var(--white); display: block; margin-bottom: 16px;"><?php echo esc_html( $hudl_email ); ?></a>
				<div style="display: flex; gap: 12px; justify-content: flex-end; flex-wrap: wrap;">
					<a href="<?php echo esc_url( home_url( '/#cta' ) ); ?>" style="display: inline-flex; align-items: center; gap: 10px; background: var(--yellow); color: var(--black); font-family: var(--font-display); font-size: 14px; letter-spacing: 2px; padding: 12px 20px; border-radius: var(--radius);">
						<?php esc_html_e( 'BOOK YOUR FREE CONSULTATION', 'hudl-consultancy' ); ?>
						<svg width="14" height="14" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
					</a>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<p><?php printf( esc_html__( '© %1$s %2$s Ltd. All rights reserved. London, UK.', 'hudl-consultancy' ), esc_html( gmdate( 'Y' ) ), esc_html( get_bloginfo( 'name' ) ) ); ?></p>
			<p>
				<a href="#" style="color: var(--muted); margin-right: 20px; font-size: 13px;"><?php esc_html_e( 'Back to top ↑', 'hudl-consultancy' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: var(--yellow); font-size: 13px;">hudl.gg</a>
			</p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

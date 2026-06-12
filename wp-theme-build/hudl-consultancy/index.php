<?php
/**
 * Main template.
 *
 * On the front page this renders the HUDL homepage landing sections.
 * Everywhere else (the Posts page / ultimate fallback) it renders the
 * Insights blog grid, matching the original blog.html layout.
 *
 * @package HUDL_Consultancy
 */

get_header();

if ( is_front_page() ) :

	get_template_part( 'template-parts/homepage' );

else :
	?>
	<main>
		<section class="blog-hero">
			<div class="container">
				<h1>INSIGHTS &<br><span><?php esc_html_e( 'THINKING', 'hudl-consultancy' ); ?></span></h1>
				<p><?php esc_html_e( 'Marketing strategy, paid media, and growth thinking from the HUDL team.', 'hudl-consultancy' ); ?></p>
			</div>
		</section>

		<?php
		// Category filter bar — only when the matching categories exist.
		$hudl_filters = array(
			'case-study'        => __( 'Case Studies', 'hudl-consultancy' ),
			'marketing-tips'    => __( 'Marketing Tips', 'hudl-consultancy' ),
			'industry-insights' => __( 'Industry Insights', 'hudl-consultancy' ),
		);
		?>
		<div class="filter-bar">
			<div class="container">
				<button class="filter-btn active" data-filter="all"><?php esc_html_e( 'All', 'hudl-consultancy' ); ?></button>
				<?php foreach ( $hudl_filters as $hudl_slug => $hudl_label ) : ?>
					<?php if ( get_category_by_slug( $hudl_slug ) ) : ?>
						<button class="filter-btn" data-filter="<?php echo esc_attr( $hudl_slug ); ?>"><?php echo esc_html( $hudl_label ); ?></button>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>

		<section class="blog-grid-section">
			<div class="container">
				<?php if ( have_posts() ) : ?>
					<div class="blog-grid" id="blog-grid">
						<?php
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/blog-card' );
						endwhile;
						?>
					</div>

					<?php
					the_posts_pagination(
						array(
							'class'              => 'hudl-pagination',
							'mid_size'           => 1,
							'prev_text'          => __( '←', 'hudl-consultancy' ),
							'next_text'          => __( '→', 'hudl-consultancy' ),
							'screen_reader_text' => __( 'Insights navigation', 'hudl-consultancy' ),
						)
					);
					?>
				<?php else : ?>
					<div class="blog-grid">
						<div class="state-msg" style="grid-column:1/-1;text-align:center;padding:80px 20px;color:var(--muted);">
							<h3 style="font-family:var(--font-display);font-size:28px;color:rgba(255,255,255,0.3);text-transform:uppercase;"><?php esc_html_e( 'No articles yet', 'hudl-consultancy' ); ?></h3>
							<p><?php esc_html_e( 'Check back soon.', 'hudl-consultancy' ); ?></p>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</section>

		<section class="blog-cta">
			<div class="container">
				<h2>READY TO GROW<br><?php esc_html_e( 'YOUR BUSINESS?', 'hudl-consultancy' ); ?></h2>
				<p><?php esc_html_e( "Let's talk about what's holding your marketing back.", 'hudl-consultancy' ); ?></p>
				<a href="<?php echo esc_url( home_url( '/#cta' ) ); ?>" class="btn"><?php esc_html_e( 'BOOK YOUR FREE CONSULTATION', 'hudl-consultancy' ); ?> <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
			</div>
		</section>
	</main>
	<?php
endif;

get_footer();

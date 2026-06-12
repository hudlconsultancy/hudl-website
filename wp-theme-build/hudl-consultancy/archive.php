<?php
/**
 * Archive template (categories, tags, dates, author) — the Insights grid.
 *
 * @package HUDL_Consultancy
 */

get_header();
?>
<main>
	<section class="blog-hero">
		<div class="container">
			<?php if ( is_category() ) : ?>
				<h1>INSIGHTS &<br><span><?php single_cat_title(); ?></span></h1>
			<?php elseif ( is_tag() ) : ?>
				<h1>TAGGED<br><span><?php single_tag_title(); ?></span></h1>
			<?php elseif ( is_author() ) : ?>
				<h1>WRITTEN BY<br><span><?php echo esc_html( get_the_author() ); ?></span></h1>
			<?php elseif ( is_date() ) : ?>
				<h1>INSIGHTS<br><span><?php echo esc_html( get_the_archive_title() ); ?></span></h1>
			<?php else : ?>
				<h1>INSIGHTS &<br><span><?php esc_html_e( 'THINKING', 'hudl-consultancy' ); ?></span></h1>
			<?php endif; ?>

			<?php
			$hudl_desc = get_the_archive_description();
			if ( $hudl_desc ) {
				echo '<p>' . wp_kses_post( $hudl_desc ) . '</p>';
			} else {
				echo '<p>' . esc_html__( 'Marketing strategy, paid media, and growth thinking from the HUDL team.', 'hudl-consultancy' ) . '</p>';
			}
			?>
		</div>
	</section>

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
						<h3 style="font-family:var(--font-display);font-size:28px;color:rgba(255,255,255,0.3);text-transform:uppercase;"><?php esc_html_e( 'No articles in this category yet', 'hudl-consultancy' ); ?></h3>
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
get_footer();

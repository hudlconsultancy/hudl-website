<?php
/**
 * Single blog post — matches the original article.html layout.
 *
 * @package HUDL_Consultancy
 */

get_header();

while ( have_posts() ) :
	the_post();

	$hudl_cat_slug  = hudl_primary_category_slug();
	$hudl_cat_label = hudl_primary_category_label();
	?>
	<main id="main-content">
		<article <?php post_class(); ?>>
			<div class="article-wrap">
				<nav class="breadcrumb">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'hudl-consultancy' ); ?></a><span>/</span>
					<?php
					$hudl_blog_url = get_post_type_archive_link( 'post' );
					if ( ! $hudl_blog_url ) {
						$hudl_blog_url = home_url( '/' );
					}
					?>
					<a href="<?php echo esc_url( $hudl_blog_url ); ?>"><?php esc_html_e( 'Insights', 'hudl-consultancy' ); ?></a><span>/</span>
					<?php the_title(); ?>
				</nav>

				<?php if ( $hudl_cat_label ) : ?>
					<span class="article-cat cat-<?php echo esc_attr( $hudl_cat_slug ); ?>"><?php echo esc_html( $hudl_cat_label ); ?></span>
				<?php endif; ?>

				<h1 class="article-title"><?php the_title(); ?></h1>

				<div class="article-meta">
					<span><?php echo esc_html( get_the_date( 'j F Y' ) ); ?></span>
					<strong><?php echo esc_html( hudl_reading_time() ); ?></strong>
					<a href="<?php echo esc_url( $hudl_blog_url ); ?>"><?php esc_html_e( '← Back to Insights', 'hudl-consultancy' ); ?></a>
				</div>

				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'large', array( 'class' => 'article-hero-img' ) ); ?>
				<?php endif; ?>

				<div class="article-body">
					<?php
					the_content();

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hudl-consultancy' ),
							'after'  => '</div>',
						)
					);
					?>
				</div>
			</div>

			<section class="article-cta">
				<h2>READY TO GROW<br><?php esc_html_e( 'YOUR BUSINESS?', 'hudl-consultancy' ); ?></h2>
				<p><?php esc_html_e( "Let's talk about what's holding your marketing back.", 'hudl-consultancy' ); ?></p>
				<a href="<?php echo esc_url( home_url( '/#cta' ) ); ?>" class="btn"><?php esc_html_e( 'BOOK YOUR FREE CONSULTATION', 'hudl-consultancy' ); ?> <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
			</section>
		</article>

		<?php
		if ( comments_open() || get_comments_number() ) {
			echo '<div class="comments-area">';
			comments_template();
			echo '</div>';
		}
		?>
	</main>
	<?php
endwhile;

get_footer();

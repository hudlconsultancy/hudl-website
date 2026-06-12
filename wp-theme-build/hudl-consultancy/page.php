<?php
/**
 * Generic page template.
 *
 * @package HUDL_Consultancy
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<main id="main-content">
		<article <?php post_class(); ?>>
			<div class="page-wrap">
				<h1 class="page-title"><?php the_title(); ?></h1>
				<div class="page-title-underline" aria-hidden="true"></div>

				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'large', array( 'class' => 'article-hero-img' ) ); ?>
				<?php endif; ?>

				<div class="page-content">
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

			<?php
			if ( comments_open() || get_comments_number() ) {
				echo '<div class="comments-area">';
				comments_template();
				echo '</div>';
			}
			?>
		</article>
	</main>
	<?php
endwhile;

get_footer();

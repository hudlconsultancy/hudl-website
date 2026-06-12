<?php
/**
 * A single blog card for the Insights grid.
 * Expects to run inside the loop (the_post() already called).
 *
 * @package HUDL_Consultancy
 */

$hudl_cat_slug  = hudl_primary_category_slug();
$hudl_cat_label = hudl_primary_category_label();
$hudl_permalink = get_permalink();
?>
<article class="blog-card cat-<?php echo esc_attr( $hudl_cat_slug ); ?>" onclick="window.location='<?php echo esc_url( $hudl_permalink ); ?>'">
	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php echo esc_url( $hudl_permalink ); ?>" class="blog-card-thumb">
			<?php the_post_thumbnail( 'hudl-card', array( 'loading' => 'lazy', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
		</a>
	<?php else : ?>
		<div class="blog-card-thumb-placeholder"><span class="cat-icon"><?php echo esc_html( hudl_category_icon( $hudl_cat_slug ) ); ?></span></div>
	<?php endif; ?>
	<div class="blog-card-body">
		<div class="blog-card-meta">
			<?php if ( $hudl_cat_label ) : ?>
				<span class="blog-card-cat"><?php echo esc_html( $hudl_cat_label ); ?></span>
			<?php endif; ?>
			<span class="blog-card-date"><?php echo esc_html( get_the_date( 'j F Y' ) ); ?></span>
		</div>
		<h2><a href="<?php echo esc_url( $hudl_permalink ); ?>" style="color:inherit;"><?php the_title(); ?></a></h2>
		<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 28, '…' ) ); ?></p>
		<div class="blog-card-footer">
			<span class="read-more"><?php esc_html_e( 'Read More', 'hudl-consultancy' ); ?> <svg viewBox="0 0 16 16" fill="none" width="14" height="14"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
			<span class="read-time"><?php echo esc_html( hudl_reading_time() ); ?></span>
		</div>
	</div>
</article>

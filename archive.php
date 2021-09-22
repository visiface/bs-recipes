<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bs-recipes
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(<?= get_template_directory_uri() ?>/img/recipehero.jpg)">
				
				<h1 class="page-title">
                    <?php if( single_term_title('', false) !== NULL ){
                        single_term_title();
                    } else {
                        post_type_archive_title();
                    } ?>
                </h1>
				
                <div class="category-me" id="bscat">
                    <?php foreach ( get_terms('bs_recipie_category') as $term ) { ?>
                        <a href="<?= get_term_link($term, 'bs_recipie_category'); ?>">
                            <?= $term->name; ?>
                        </a>
                    <?php 
                    } ?>
                </div>
				
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-bs_recipie-archive' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

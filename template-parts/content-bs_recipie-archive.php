<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bs-recipes
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="content-container">
        <div class="intro-container">
            <header class="entry-header">
                <div class="recipe-title">
                    <?php
                        if ( is_singular() ) :
                            the_title( '<h1 class="entry-title">', '</h1>' );
                        else :
                            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                        endif;

                        if ( 'post' === get_post_type() ) :
                            ?>
                            <div class="entry-meta">
                                <?php
                                bs_recipes_posted_on();
                                bs_recipes_posted_by();
                                ?>
                            </div><!-- .entry-meta -->
                        <?php endif; ?>
                </div>
            </header><!-- .entry-header -->

                <?php
                    bs_recipes_post_thumbnail(); 
                ?>
            </div>
        </div>

        
</article><!-- #post-<?php the_ID(); ?> -->

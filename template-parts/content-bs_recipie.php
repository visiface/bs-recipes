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

            <?php if( get_field('authornote') ) { ?>
                <div class="note-container">
                    <div class="notes">
                        <h2>Author's Notes:</h2>
                        <?php foreach ( get_field('authornote') as $authornote ) { ?>
                            <sub>
                                <?= $authornote['note']; ?>
                            </sub>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>

            <div class="the-content">
                <div class="padded-content">
                    <?php
                    the_content(
                        sprintf(
                            wp_kses(
                                /* translators: %s: Name of current post. Only visible to screen readers */
                                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bs-recipes' ),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            wp_kses_post( get_the_title() )
                        )
                    );?>
                </div>

                <?php
                    bs_recipes_post_thumbnail(); 
                ?>
            </div>
        </div>
        
        <div class="extra-container">
            <div class="recipe-title">
                <?php
                    if ( is_singular() ) :
                        the_title( '<h2 class="entry-title">', '</h2>' );
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
        </div>

        <div class="recipe-container">
            <div class="ingredients">
                <h2>Ingredients</h2>
                <ul>
                    <?php
                        // print('<pre>');
                        // print_r( get_field('ingredient') );
                        // print_r( get_field('step') );
                        // print('</pre>');
                        
                        foreach ( get_field('ingredient') as $ingredient ) { ?> 
                            <li>
                                <strong>
                                    <?= $ingredient['quantity']; ?> <?= $ingredient['unit']; ?>
                                </strong>

                                <?= $ingredient['name']; ?>
                            </li>
                        <?php }
                    ?>
                </ul>
            </div>

            <div class="steps">
                <h2>Directions</h2>
                    <ol>
                        <?php foreach ( get_field('step') as $step ) { ?>
                            <li>
                                <?= $step['step_description']; ?>
                            </li>
                        <?php } ?>
                    </ol>
                </div>
            </div>
        </div>

        <div class="entry-content">
            <?php
            
            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bs-recipes' ),
                    'after'  => '</div>',
                )
            );
            ?>
        </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->

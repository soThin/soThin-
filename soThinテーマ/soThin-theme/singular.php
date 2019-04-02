<?php
/**
 * 固定ページ表示用
 *
 * @package WordPress
 * @subpackage soThin-theme
 * @since 1.0
 * @version 1.0
 */
    get_header(); 

    while ( have_posts() ):the_post(); ?>
<article itemscope itemtype="https://schema.org/BlogPosting" class="container">
<?php breadcrumb(); ?>

        <div class="singular_wrapper">
            <h1 itemprop="headline"><?php the_title(); ?></h1>
            <div>
                <?php if ( is_single() ) : ?>
                    <div class="category">Category : <?php the_category(); ?>
                    </div>
                    <time itemprop="dateCreated datePublished" datetime="<?php the_time('c') ?>" class="main_date publish">Published : <?php the_time('Y/m/j') ?></time>
                    <time itemprop="dateModified" datetime="<?php the_modified_time('c'); ?>" class="main_date modify">Update : <?php the_modified_time('Y/m/j'); ?></time> 
                <?php endif; ?>
            </div>
            <?php
                the_post_thumbnail('full', array( 'class' => 'main_img' ));
            ?>
            <time itemprop="dateModified" datetime=""></time>
            <div itemprop="articleBody"><?php the_content(); ?></div>
        </div>
    </article>
   <?php endwhile; // End of the loop. ?>

</main>

<?php
    get_footer();



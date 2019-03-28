<?php
/**
 * 固定ページ表示用
 *
 * @package WordPress
 * @subpackage テーマ名
 * @since 1.0
 * @version 1.0
 */
get_header(); 
while ( have_posts() ) :
    the_post(); ?>

    <article itemscope itemtype="https://schema.org/BlogPosting">


        <div class="breadcrumbs">
            <ul>
                <li>
                    <i class="fas fa-home"></i>
                    <a itemprop="item" href="/">sothin トップ</a>
                </li>
                <li>
                    <i class="fas fa-chevron-right"></i>
                    <a itemprop="item" href="//">page</a>
                </li>
                <li>
                    <i class="fas fa-chevron-right"></i>
                    <a itemprop="item" href="//">page</a>
                </li>

            </ul>
        </div>

        <div class="singular_wrapper">
            <h1 itemprop="headline">タイトル</h1>
            <div class="flex right">
                <div class="category flex">カテゴリー:
                    <div><?php the_category(); ?></div>
                </div>
                <time itemprop="dateCreated datePublished" datetime="<?php the_modified_time('c'); ?>"><?php the_modified_time('Y/m/j'); ?></time>
                <time itemprop="dateModified" datetime="<?php the_time('c') ?>"></time>
            </div>
                <img class="inv_mv" src="./lib/images/pc.jpeg" alt="">
                <time itemprop="dateModified" datetime=""></time>
                <div itemprop="articleBody"><?php the_content(); ?></div>
        </div>
    </article>
    </main>


    <?php
	endwhile; // End of the loop.
    get_footer();



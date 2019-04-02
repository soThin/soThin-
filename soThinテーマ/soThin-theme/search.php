<?php
/**
 * アーカイブページ表示用
 *
 * @package WordPress
 * @subpackage soThin-theme
 * @since 1.0
 * @version 1.0
 */
get_header(); 
 ?>

 
            <h2 class="serif sub inv_mv">search：<?php echo esc_html( get_search_query()) ?> </h2>
<div class="grid grid-3">
     <?php if(have_posts()):?>
     <?php while(have_posts()):the_post();?>
     <section class="articles_index inv_mv">
         <div class="articles_index_thumbnail">
             <a href="<?php the_permalink(); ?>">
                 <?php the_post_thumbnail(); ?>
             </a>
         </div>
         <div class="articles_index_inner">
             <h2><a href="<?php the_permalink(); ?>"><?php
if(mb_strlen($post->post_title, 'UTF-8')>30){
	$title= mb_substr($post->post_title, 0, 30, 'UTF-8');
	echo $title.'…';
}else{
	echo $post->post_title;
}
?></a></h2>
             <time class="date"><?php the_time('Y年n月j日'); ?></time>
             <nav id="tag_navigation" class="flex">	
                 カテゴリ: <?php if (the_category()) the_category('<ul id="tag_list"><li class="tag_name">','</li><li class="tag_name">','</li></ul>'); ?>
                </nav>
            </div>
            <a href="<?php the_permalink(); ?>">
                    <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                </a>
    </section>
            <?php endwhile;?>
</div>
<div class="pagenum flex">
    <?php posts_nav_link( '　', '<i class="fa fa-angle-left icon-left"></i>PREV', 'NEXT<i class="fa fa-angle-right icon-right"></i>' ); ?>
</div>
<?php endif;?>
</main>
<?php
get_footer();
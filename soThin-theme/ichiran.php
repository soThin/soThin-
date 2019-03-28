<?php
/*
Template Name: Archives
*/
get_header(); 
 ?>
    <?php the_title( '<h2 >', '</h2>' ); ?>
<div id="archive" class="grid grid-3">

     <?php
$paged = (int) get_query_var('paged');
$args = array(
	'posts_per_page' => 3,
	'paged' => $paged,
	'orderby' => 'post_date',
	'order' => 'DESC',
	'post_type' => 'post',
	'post_status' => 'publish'
);
$the_query = new WP_Query($args);
if ( $the_query->have_posts() ) :
	while ( $the_query->have_posts() ) : $the_query->the_post();
?>
     <section class="articles_index">
         <div class="articles_index_thumbnail">
             <a href="<?php the_permalink(); ?>">
                 <?php the_post_thumbnail(); ?>
             </a>
         </div>
         <div class="articles_index_inner">
             <h2><a href="<?php the_permalink(); ?>"><?php echo the_title();?></a></h2>
             <time class="date"><?php the_time('Y年n月j日'); ?></time>
             <nav id="tag_navigation" class="flex">	
                 カテゴリー: <?php if (the_category()) the_category('<ul id="tag_list"><li class="tag_name">','</li><li class="tag_name">','</li></ul>'); ?>
                </nav>
            </div>
            <a href="<?php the_permalink(); ?>">
                    <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                </a>
    </section>

    <?php endwhile; endif; ?>
</div>
<div id="pager_navigation">
    <?php posts_nav_link( '　', '<i class="fa fa-angle-left icon-left"></i>PREV', 'NEXT<i class="fa fa-angle-right icon-right"></i>' ); ?>
</div>
</main>
<?php
get_footer();
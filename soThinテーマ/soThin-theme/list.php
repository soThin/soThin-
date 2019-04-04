<?php
/*
Template Name: Archives
*/
get_header(); 
 ?>
    <?php the_title( '<h2 class="serif inv_mv">', '</h2>' ); ?>
<div class="grid grid-3">

<?php
$paged = (int) get_query_var('paged');
$args = array(
'category__not_in' => array(71,72,73),
'posts_per_page' => 10,
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





<?php if( !in_category(array('abc','def')) ) { ?>
     <section class="main_card inv_mv  box-under-shadow">
         <div class="card_thumbnail">
             <a href="<?php the_permalink(); ?>">
                 <?php the_post_thumbnail(); ?>
             </a>
         </div>
         <div class="card_description">
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
    <?php } ?>
    <?php endwhile; endif; ?>





</div>


</div>
<div class="pagenum">
<?php
if ($the_query->max_num_pages > 1) {
 echo paginate_links(array(
 'type' => 'list',
 'base' => get_pagenum_link(1) . '%_%',
 'format' => 'page/%#%/',
 'current' => max(1, $paged),
 'total' => $the_query->max_num_pages
 ));
}
?>
</div>
</main>
<?php
get_footer();
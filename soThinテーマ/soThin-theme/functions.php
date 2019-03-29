
<?php

/*
*削除系・追加系・編集系の3種類
*系列を検索する際はCtrl+Fを押してから「○○系」と入力
*/

/******************削除系******************/

//SEO対策
// WordPressバージョン情報の削除
remove_action('wp_head', 'wp_generator');
// ショートリンクURLの削除
remove_action('wp_head', 'wp_shortlink_wp_head');
// wlwmanifestの削除
remove_action('wp_head', 'wlwmanifest_link');
// application/rsd+xmlの削除
remove_action('wp_head', 'rsd_link');
// RSSフィードのURLの削除
remove_action('wp_head', 'feed_links_extra', 3);


//自動成形停止
remove_filter( 'the_content', 'wpautop' );

function override_mce_options( $init_array ) {
    $init_array['indent']  = true;
    $init_array['wpautop'] = false;

    return $init_array;
}
add_filter( 'tiny_mce_before_init', 'override_mce_options' );


//ツールバー非表示
add_filter('show_admin_bar', '__return_false');


//Contact Form 7が読み込むCSSを削除
add_action( 'wp_enqueue_scripts', 'my_delete_plugin_styles' );
    function my_delete_plugin_styles() {
    wp_deregister_style( 'contact-form-7' );
}


//メディア挿入時のデフォルトのリンク先を「なし」に設定する
function webshufu_default_noimagelink() {
    $webshufu_default_imagelink = get_option( 'image_default_link_type' );
    if ($webshufu_default_imagelink !== 'none') {
    update_option('image_default_link_type', 'none');
    }
}
add_action('admin_init', 'webshufu_default_noimagelink', 10);


//imgタグのwidth,height削除
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
function remove_width_attribute( $html ) {
    $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
    return $html;
}


/******************追加系******************/


//head内titleタグ有効化
function my_setup_theme() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'my_setup_theme' );


//ナビゲーションのアンカータグにクラスを追加
function add_menuclass($ulclass) {
  return preg_replace('/<a /', '<a class="navbar_link"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');


//ナビゲーションの表示中メニューに 'current' クラスを付与する
function remove_to_currentClass( $classes, $item ) {
    if( $item -> current == true ) {
        $classes[] = 'current';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'remove_to_currentClass', 10, 2 );


//navigationの登録
register_nav_menu( 'Navigation', 'ナビゲーション' );


//カスタムヘッダー追加
add_theme_support( 'custom-header' );


//サムネイル追加
add_theme_support('post-thumbnails'); 


//カスタムロゴ追加
add_theme_support( 'custom-logo', array( 'size' => 'raindrops-logo' ) );


//フッターウィジェットエリア追加
register_sidebar(array('name' => 'フッター１'));
register_sidebar(array('name' => 'フッター２'));
register_sidebar(array('name' => 'フッター３'));

//サイドバーウィジェットエリア追加
register_sidebar(array(
     'name' => 'Sidebar' ,
     'id' => 'sidebar' ,
     'before_widget' => '<div class="widget sidebar_widget">',
     'after_widget' => '</div>',
     'before_title' => '<h3 class="sidebar_title">',
     'after_title' => '</h3>'
));


//固定ページにカスタムフィールド追加
$custom_fields = array(
    'ttl'=>array(
        'id'=>'item_title',
        'info'=>'画面上に表示するタイトルを入力してください',
        'func'=>'createItem',
        'page'=>'page'
    ),
);
add_action( 'admin_menu', 'add_custom_field' );
function add_custom_field() {
    global $custom_fields;
    foreach($custom_fields as $key => $member) {
        add_meta_box($key , $member['info'], $member['func'], $member['page'], 'normal','high',$member['id']);
    }
}

// カスタムフィールドのHTMLを追加する時の処理
function createItem($output, $key){
    $keyname = $key["args"];
    global $post;
    // 保存されているカスタムフィールドの値を取得
    $get_value = get_post_meta( $post->ID, $keyname, true );

    // nonceの追加
    wp_nonce_field( 'action-' . $keyname, 'nonce-' . $keyname );

    // HTMLの出力
    echo '<input name="' . $keyname . '" value="' . $get_value . '" style="width:100%;">';
}
// カスタムフィールドの保存
function save_custom_field( $post_id ) {
    global $custom_fields;

    foreach( $custom_fields as $key => $member ) {
        if ( isset( $_POST['nonce-' . $member['id']] ) && $_POST['nonce-' . $member['id']] ) {
            if( check_admin_referer( 'action-' . $member['id'], 'nonce-' . $member['id'] ) ) {

                if( isset( $_POST[$member['id']] ) && $_POST[$member['id']] ) {
                    update_post_meta( $post_id, $member['id'], $_POST[$member['id']] );
                } else {
                    delete_post_meta( $post_id, $member['id'], get_post_meta( $post_id, $member['id'], true ) );
                }
            }
        }
        
    }
}
add_action( 'save_post', 'save_custom_field' );


// パンくずリスト表示
function breadcrumb(){
    global $post;
    $str ='';
    if(!is_home()&&!is_admin()){
        $str.= '<div id="breadcrumb" class="breadcrumbs cf flex left"><div itemscope class="breadcrumb_item" itemtype="http://data-vocabulary.org/Breadcrumb">';
        $str.= '<a class="breadcrumb_link" href="'. home_url() .'" itemprop="url"><span itemprop="title">HOME</span></a></div>';
        if(is_category()) {
            $cat = get_queried_object();
            if($cat -> parent != 0){
                $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
                foreach($ancestors as $ancestor){
                    $str.='<div itemscope class="breadcrumb_item" itemtype="http://data-vocabulary.org/Breadcrumb"><a class="breadcrumb_link" href="'. get_category_link($ancestor) .'" itemprop="url"><span itemprop="title">'. get_cat_name($ancestor) .'</span></a></div>';
                }
            }
            $str.='<div itemscope class="breadcrumb_item" itemtype="http://data-vocabulary.org/Breadcrumb"><a class="breadcrumb_link" href="'. get_category_link($cat -> term_id). '" itemprop="url"><span itemprop="title">'. $cat-> cat_name . '</span></a></div>';
        } elseif(is_page()){
            if($post -> post_parent != 0 ){
                $ancestors = array_reverse(get_post_ancestors( $post->ID ));
                foreach($ancestors as $ancestor){
                    $str.='<div itemscope class="breadcrumb_item" itemtype="http://data-vocabulary.org/Breadcrumb"><a class="breadcrumb_link" href="'. get_permalink($ancestor).'" itemprop="url"><span itemprop="title">'. get_the_title($ancestor) .'</span></a></div>';
                }
            }
        } elseif(is_single()){
            $categories = get_the_category($post->ID);
            $cat = $categories[0];
            if($cat -> parent != 0){
                $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
                foreach($ancestors as $ancestor){
                    $str.='<div itemscope class="breadcrumb_item" itemtype="http://data-vocabulary.org/Breadcrumb"><a class="breadcrumb_link" href="'. get_category_link($ancestor).'" itemprop="url"><span itemprop="title">'. get_cat_name($ancestor). '</span></a></div>';
                }
            }
            $str.='<div itemscope class="breadcrumb_item" itemtype="http://data-vocabulary.org/Breadcrumb"><a class="breadcrumb_link" href="'. get_category_link($cat -> term_id). '" itemprop="url"><span itemprop="title">'. $cat-> cat_name . '</span></a></div>';
        } else{
            $str.='<div class="breadcrumb_item"><span itemprop="title">'. wp_title('', false) .'</span></div>';
        }
        $str.='</div>';
    }
    echo $str;
}

//ページネーション追加
function wp_pagination($page,$total) {
    global $wp_query;
    $big = 99999999;
    $page_format = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, $page ),
        'total' => $total,
        'prev_text'          => __('&laquo'),
        'next_text'          => __('&raquo'),
        'type'  => 'array',
        'before_page_number' => '',
        'after_page_number' => ''
    ) );
    if( is_array($page_format) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<nav role="navigation" aria-label="Page navigation"><ul class="flex main_pagination">';
        foreach ( $page_format as $page ) {
            echo '<li class="flex pagination_item">'.$page.'</li>';
        }
            echo '</ul></nav>';
    }
    wp_reset_query();
}


/******************編集系******************/


//ループの表示記事数を指定
function hwl_home_pagesize( $query ) {
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if ( is_home() ) {
        // オリジナルのブログアーカイブは投稿を1つ表示
        $query->set( 'posts_per_page', 3 );
        return;
    }
    if ( is_archive()|| is_search() ) {
        // オリジナルのブログアーカイブは投稿を1つ表示
        $query->set( 'posts_per_page', 9 );
        return;
    }

}
add_action( 'pre_get_posts', 'hwl_home_pagesize', 1 );
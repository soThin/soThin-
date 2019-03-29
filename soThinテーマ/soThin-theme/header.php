<?php
/**
 * ヘッダー表示用
 *
 * @package WordPress
 * @subpackage soThin-theme
 * @since 1.0
 * @version 1.0
 */
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8n">
    <meta name="Description" CONTENT="ここにページのディスクリプション">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Taiga Ishii">
    <!--Setting ogp-->
    <meta property="og:title" content="ここにタイトル">
    <meta property="og:type" content="ここにタイプ">
    <meta property="og:url" content="ここにページのURL">
    <meta property="og:image" content="ここにサムネイル画像のURL">
    <meta property="og:site_name" content="ここにサイト名">
    <meta property="og:description" content="ここにページのディスクリプション">
    <!--Facebook ogp-->
    <meta property="fb:app_id" content="App-ID（15文字の半角数字）">
    <!--Twitter cards-->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Twitterアカウント">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>TITLE</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,900" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
        <!-- iota -->
        <link rel="stylesheet" href="<?= get_theme_file_uri();?>/lib/css/iota.css">
        
        
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url');?>">
        
        <script type="text/javascript" src="<?= get_theme_file_uri();?>/lib/js/main.js"></script>
        <!-- invew -->
        <script type="text/javascript" src="<?= get_theme_file_uri();?>/lib/js/jquery.inview.js"></script>
        

    <!-- Font Awesome　-->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php  body_class("hfeed"); ?> >
    <nav role="navigation" id="navbar" class="grid inline-center navbar_wrapper fixed">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="flex navbar_brand">
            <span class="navbar_logo">
                LO<br>GO
            </span>
        </a>
        <button type="button" id="navbarToggler" class="navbar_toggler">
            <span></span>
            <span></span>
            <span></span>
        </button>
        
        <?php wp_nav_menu( array(
            'theme_location'=>'Navigation', 
            'container'     =>'', 
            'menu_class'    =>'',
            'items_wrap'    =>'<ul class="navbar_list">%3$s</ul>'));
            ?>
    </nav>
    <header role="banner" class="flex header_wrapper sub">
        <div class="inline-center header_content">
            <h1 class="header_title serif inv_mv">soThin</h1>
            <p class="fade_mv">- 良心的な価格で、優れたデザインと機能性を -</p>
        </div>
    </header>

        <main class="container">
            
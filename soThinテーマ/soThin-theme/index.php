<?php
/**
 *
 *メインインデックスページ
 *
 * @package WordPress
 * @subpackage soThin-theme
 * @since 1.0
 * @version 1.0
 */
get_header("index"); 
?>

        <section id="visionIndex">
            <div class="main_wrapper inv_mv">
                <h2 class="main_title serif">Vision</h2>
                <h3>最先端のサイト作り</h3>
                <p>soThinについてsoThinについてsoThinについてsoThinについて</p>
                <p>soThinについてsoThinについてsoThinについてsoThinについてsoThinについてsoThinについて</p>
                <p>soThinについてsoThinについてsoThinについてsoThinについてsoThinについてsoThinについて</p>
            </div>
            <div class="inv_mv">
                <p>soThinについてsoThinについてsoThinについてsoThinについてsoThinについて</p>
                <p>soThinについてsoThinについてsoThinについてsoThinについて</p>
                <p>soThinについてsoThinについてsoThinについてsoThinについて</p>
                <p>soThinについてsoThinについてsoThinについて</p>
            </div>
        </section>

        <section id="servisIndex">
            <div class="main_wrapper inv_mv">
                <h2 class="main_title serif">Servies</h2>
                <h3>最適なサービスを</h3>
                <p>サービスについてサービスについてサービスについてサービスについてサービスについてサービスについて</p>
                <p>サービスについてサービスについてサービスについてサービスについてサービスについて</p>
            </div>
            <div class="inv_mv">
                <p>soThinについてsoThinについてsoThinについてsoThinについてsoThinについて</p>
                <p>soThinについてsoThinについてsoThinについてsoThinについて</p>
                <p>soThinについてsoThinについて</p>
            </div>
            <ul class="main_content grid grid-3">
                <a href="#">
                    <li class="inv_mv box-under-shadow">
                        <h2 class="card_title">
                            サービス１
                        </h2>
                        <p class="card_text">サービス内容サービス内容サービス内容サービス内容サービス内容サービス内容サービス内容サービス内容</p>
                        <p>詳しく見る></p>
                    </li>
                </a>
                <a href="#">
                    <li class="inv_mv box-under-shadow">
                        <h2 class="card_title">
                            サービス2
                        </h2>
                        <p class="card_text">サービス内容サービス内容サービス内容サービス内容サービス内容サービス内容サービス内容サービス内容</p>
                        <p>詳しく見る></p>
                    </li>
                </a>
                <a href="#">
                    <li class="inv_mv box-under-shadow">
                        <h2 class="card_title">
                            サービス3
                        </h2>
                        <p class="card_text">サービス内容サービス内容サービス内容サービス内容サービス内容サービス内容サービス内容サービス内容</p>
                        <p>詳しく見る></p>
                    </li>
                </a>
            </ul>
        </section>

        <section id="exampleIndex">
            <div class="main_wrapper">
                    <h2 class="main_title serif">Example</h2>
                <div class="grid grid-2">
                <div class="relative">
                <div class="slideshow">
                    <div class="slideshow-slides">
                        <a class="slide" id="slide-1"><img src="<?= get_theme_file_uri();?>/lib/images/Sora.jpg" alt=""></a>
                        <a class="slide" id="slide-2"><img src="<?= get_theme_file_uri();?>/lib/images/Sora.jpg" alt=""></a>
                        <a class="slide" id="slide-3"><img src="<?= get_theme_file_uri();?>/lib/images/Sora.jpg" alt=""></a>
                        <a class="slide" id="slide-4"><img src="<?= get_theme_file_uri();?>/lib/images/Sora.jpg" alt=""></a>
                    </div>
                    <div class="slideshow-nav">
                        <a href="#exampleIndex" class="prev disabled" id="prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                        <a href="#exampleIndex" class="next" id="next"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                    </div> 
                    <div class="slideshow-indicator">
                    </div>
                </div>
                </div>
                <div class="main_inner">
                    <h3>最適なサービスを</h3>
                    <div>
                        <p>soThinについてsoThinについてsoThinについてsoThinについてsoThinについて</p>
                        <p>soThinについてsoThinについてsoThinについてsoThinについて</p>
                        <p>soThinについてsoThinについて</p>
                        <p>soThinについてsoThinについてsoThinについてsoThinについて</p>
                    </div>
                    <a href="contact.html" class="inner_btn">MORE<span></span></a>                    </div>
                </div>
                </div>
            </div>
        </section>


        <section id="supportIndex">
            <h2 class="serif">Support</h2>
            <div class="grid grid-1 inline-center">
                <div class=" grid main_card hrz inv_mv">
                    <div class="card_header">
                        <img alt="card cap" src="<?= get_theme_file_uri();?>/lib/images/akushu.jpeg" class="card_img card_left">
                    </div>
                    <div class="card_body">
                        <h2 class="card_title">Planning</h2>
                        <p class="card_text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                            commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                            parturient montes, nascetur ridiculus mus.</p>
                        <a class="flex card_btn" href="#">MORE</a>
                    </div>
                </div>
                <div class="grid main_card hrz toRight flexbox inv_mv">
                    <div class="card_body box1">
                        <h2 class="card_title">Design</h2>
                     <p class="card_text ">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                            commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                            parturient montes, nascetur ridiculus mus.</p>
                        <a class="flex card_btn" href="#">MORE</a>
                    </div>
                    <div class="card_header">
                        <img alt="card cap" src="<?= get_theme_file_uri();?>/lib/images/akushu.jpeg" class="card_img card_right">
                    </div>
                </div>
                <div class="grid main_card hrz inv_mv">
                    <div class="card_header">
                        <img alt="card cap" src="<?= get_theme_file_uri();?>/lib/images/akushu.jpeg" class="card_img card_left">
                    </div>
                    <div class="card_body">
                        <h2 class="card_title">Develpoment</h2>
                        <p class="card_text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                            commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                            parturient montes, nascetur ridiculus mus.</p>
                        <a class="flex card_btn" href="#">MORE</a>
                    </div>
                </div>
                <div class="grid main_card hrz toRight flexbox inv_mv">
                    <div class="card_body">
                        <h2 class="card_title">Marketing</h2>
                        </h2>
                        <p class="card_text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                            Aenean
                            commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                            parturient montes, nascetur ridiculus mus.</p>
                        <a class="flex card_btn" href="#">MORE</a>
                    </div>
                    <div class="card_header">
                        <img alt="card cap" src="<?= get_theme_file_uri();?>/lib/images/akushu.jpeg" class="card_img card_right">
                    </div>
                </div>
            </div>
        </section>

        <section id="profileIndex" class="inv_mv">
            <div class="main_wrapper">
                <h2 class="main_title serif">Profile</h2>

                <table>
                    <tr>
                        <td>社名</td>
                        <td>soThin</td>
                    </tr>
                    <tr>
                        <td>所在地</td>
                        <td>samplesamplesamplesample</td>
                    </tr>
                    <tr>
                        <td>電話番号</td>
                        <td>samplesamplesamplesample</td>
                    </tr>
                    <tr>
                        <td>受付時間</td>
                        <td>samplesamplesamplesample</td>
                    </tr>
                    <tr>
                        <td>事業内容</td>
                        <td>

                            <table>
                                <tr>
                                    <td>samplesamplesamplesample</td>
                                </tr>
                                <tr>
                                    <td>samplesamplesamplesample</td>
                                </tr>
                                <tr>
                                    <td>samplesamplesamplesample</td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                    <tr>
                        <td>主な取引先</td>
                        <td>

                            <table>
                                <tr>
                                    <td>samplesamplesamplesample</td>
                                </tr>
                                <tr>
                                    <td>samplesamplesamplesample</td>
                                </tr>
                                <tr>
                                    <td>samplesamplesamplesample</td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                </table>
                <a href="contact.html"  onclick="scrollToTop()" class="flex inner_btn">CONTACT<span></span></a>
            </div>
        </section>        
    </main>

    
    <?php 
get_footer();
?>
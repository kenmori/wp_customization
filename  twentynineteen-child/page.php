<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

<section id="primary" class="content-area">
<main id="main" class="site-main">

<h3>はじめまして</h3>
<div class="greeting">
こちらは株式会社TerraceTechのブログです。<br />
Webサイト・LP・Webアプリ制作、<br />
SEO、エンジニア紹介・Web未経験の方の学習・SNS運用<br />
などに関するご相談・お見積もりは<br />
お気軽に右下にでてくるチャットからご連絡くださいませ。<br />
<a href="/aboutus-2">テラステックができること</a>

<br/>
<br/>
株式会社代表取締役 <a href="https://kenjimorita.jp">森田賢二</a>

</div>
<h3>最近の投稿</h3>
<?php
global $post;
$args = array( 'posts_per_page' => 8 );
$myposts = get_posts( $args );
foreach( $myposts as $post ) {
setup_postdata($post);
?>
<div class="flex-wrap">
  <a href="<?php the_permalink() ?>">
    <div class="flex">
      <div class="item thum">
        <?php if(has_post_thumbnail()): ?>
          <?php the_post_thumbnail('index_thumbnail'); ?>
          <?php endif; ?>
        </div>
        <div class="item content">
          <div class="time">
            <?php the_time('Y.m.d') ?>
          </div>
          <span class="title">
            <?php the_title(); ?>
          </span>
          <span>
            <?php the_content(); ?>
          </span>
        </div>
      </div>
    </a>
  </div>
<?php
}
wp_reset_postdata();
?>

<div class="info">
<hr />
<strong>株式会社TerraceTechについて</strong>
<br />
・<a href="https://terracetech.jp/2019/10/22/entrepreneurship/">株式会社TerraceTech</a>
<br />
<br />
<strong>弊社代表のSNS関連</strong>
<br />
・<a href="https://kenjimorita.jp">「武骨日記」</a>
<br />
・<a href="https://www.instagram.com/india_japan_moritakenji/">インド旅　instagram</a>
<br />
・<a href="https://www.instagram.com/moriken0801/">適当な日常写真　instagram</a>
<br />
・<a href="https://www.instagram.com/koushitekoushitekou/">シュールさーん　instagram</a>
<br />
・<a href="https://store.line.me/stickershop/product/7681263/ja">シュールさーん LINEスタンプ</a>
<br />
・<a href="https://twitter.com/bukotsunikki">もりたけんじTwitter</a>
<br />
・<a href="https://twitter.com/moritakennji">ネタ帳Twitter</a>
<br />
・<a href="https://note.mu/keenj">note</a>
<br />
・<a href="https://www.facebook.com/kennji.morita">FaceBook -kennji.morita-</a>
<br />
<br />
※<a href="http://omajimedesign.kenjimorita.jp">わたしが結成しているWebチーム</a>ではWeb未経験者、フリーランスの方へのお仕事を紹介しています。
また個人レッスンしてほしい生徒も募集中です。
もしご興味ある方はチャットからご連絡ください。
<br />
<br />
<strong>こんなことでお困りではないですか？</strong>
<br />
・「Webサイト作って作って！」<br />・「ブログ作って！」<br />・「LP作りたいんだけど...」<br />・「写真撮ってくれますか？!」<br />・「フロントエンドの方紹介して欲しい...
」<br />・「Web業界で働きたいのですが未経験です。勉強教えてくれますか?
」<br />・「エンジニアを紹介してくれますか？」<br />・「SNS運用・更新業務してくれませんか？」

など、チャット or info@terracetech.jp
まで気軽にご相談くださいませ
</div>


</main><!-- #main -->
</section><!-- #primary -->


<?php
get_footer();
?>

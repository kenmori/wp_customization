<?php
global $post;
$args = array( 'posts_per_page' => 8 );
$myposts = get_posts( $args );
foreach( $myposts as $post ) {
setup_postdata($post);
?>
<a href="<?php the_permalink() ?>" class="lists">
  <div class="item thum">
    <?php if(has_post_thumbnail()): ?>
    <?php the_post_thumbnail('index_thumbnail'); ?>
    <?php endif; ?>
  </div>

  <div class="item content">
    <span class="time">
      <?php the_time('Y.m.d') ?>
    </span>
    <span class="title">
      <?php the_title(); ?>
    </span>
  </div>
</a>
<?php
}
wp_reset_postdata();
?>
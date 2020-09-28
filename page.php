<?php get_header(); ?>
<section class="main-content">
  <div class="container">
    <div class="columns">
      <div class="column is-9 is-offset-3">
        <section class="entry-content">
        <?php echo openGlam::get_breadcrumb(); ?>
          <h1 class="title"><?php the_title(); ?></h1>
          <div class="content">
            <?php the_content();  ?>
          </div>
        </section>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
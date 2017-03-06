<?php get_header() ?>
<?php
  if (have_posts()) {
    while (have_posts()) { the_post();
      ?>
      <section class="title">
        <div class="container">
          <h1 class="text-center"> <?php the_title() ?> </h1>
        </div>
      </section>
      <div class="container interno">
        <article class="wow fadeIn" data-wow-duration="3s">
          <?php the_content() ?>
        </article>
      </div>
      <?php
    }
  }
?>

<?php get_footer() ?>

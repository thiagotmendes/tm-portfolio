<?php /* template name: trabalhos */ ?>
<?php get_header() ?>
<section class="title">
  <div class="container">
    <h1 class="text-center"> <?php the_title() ?> </h1>
  </div>
</section>
<section class="portfolio-interno">
  <div class="container">
    <div class="row">
      <?php
        $argPortfolio = array(
          'post_type' => 'portfolio',
          'posts_per_page' => 20,
        );
        $portFolioHome = new wp_query($argPortfolio);
        if ($portFolioHome->have_posts()):
          while($portFolioHome->have_posts()): $portFolioHome->the_post()
      ?>
            <div class="col-md-3">
              <div class="img-thumb-port">
                <a href="<?php the_permalink() ?>">
                  <?php the_post_thumbnail( 'high', array( 'class' => 'img-responsive' ) ); ?>
                </a>
              </div>
              <h3> <a href="<?php the_permalink() ?>" class="btn btn-warning btn-block"> <?php the_title() ?> </a> </h3>
            </div>
      <?php
          endwhile;
        else:
          echo "Nenhum item encontrado";
        endif;
      ?>
    </div>
  </div>
</section>
<?php get_footer() ?>

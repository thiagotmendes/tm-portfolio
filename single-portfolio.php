<?php get_header() ?>
  <?php
    if (have_posts()) {
      while (have_posts()) { the_post();
        $idtrabalho = get_the_id();
        ?>
        <section class="title">
          <div class="container">
            <h1 class="text-center"> <?php the_title() ?> </h1>
          </div>
        </section>

        <section>
          <div class="container interno">
            <div class="row">
              <div class="col-md-8">
                <?php the_post_thumbnail( 'high', array( 'class' => 'img-responsive' ) ); ?>
              </div>
              <div class="col-md-4">
                <?php the_content() ?>
              </div>
            </div>
          </div>
        </section>
        <?php
      }
    }
  ?>

  <section class="portfolio">
    <div class="container">
      <h2 class="text-center"> <span> Outros Trabalhos </span> </h2>
      <div class="row portfolio-slider">
        <?php
          $argPortfolio = array(
            'post_type' => 'portfolio',
            'post_per_page' => 8,
            'post__not_in' => array( $idtrabalho )
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

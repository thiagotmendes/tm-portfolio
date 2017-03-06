<?php /* template name: Home */ ?>
<?php get_header() ?>
  <div class="banner">
    <img src="http://thiagotmendes.com.br/wp-content/uploads/2017/03/banner_titi.jpg" alt="" class="img-responsive">
  </div>

  <section class="sobre-mim">
    <div class="container">
      <?php
      $conteudoHome = get_page_by_title('home');
      if (!empty($conteudoHome)):
      ?>
        <div class="row">
          <div class="col-md-3">
            <?php echo get_the_post_thumbnail( $conteudoHome->ID, 'high', array( 'class' => 'img-responsive home-site' ) ); ?>
          </div>
          <div class="col-md-9">
            <h1 class="text-center"> <span> Sobre mim </span> </h1>
            <p class="text-justify">
              <?php echo wpautop($conteudoHome->post_content); ?>
            </p>
            <hr>
            <div class="row">
              <div class="col-md-4 col-md-offset-4">
                <a href="<?php echo esc_url( home_url( 'thiago-mendes' ) ); ?>" class="btn btn-warning btn-block"> Me conheça! </a>
                <div class="row">
                  <div class="col-md-10 col-md-offset-1">
                    <ul class="nav nav-pills social-icons">
            					<li><a href="https://www.facebook.com/thiagotmendes" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
            					<li><a href="https://twitter.com/thiagotmendes" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
            					<li><a href="https://br.linkedin.com/in/thiagotmendes" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
            					<li><a href="https://github.com/thiagotmendes" target="_blank">
            						<i class="fa fa-github-alt" aria-hidden="true"></i>
            					</a></li>
            				</ul>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      <?php
      else:
        echo "Você precisa criar uma pagina home para inserir o conteudo";
      endif;
      ?>
    </div>
  </section>

  <section class="portfolio">
    <div class="container">
      <h2 class="text-center"> <span> Trabalhos </span> </h2>
      <div class="row portfolio-slider">
        <?php
          $argPortfolio = array(
            'post_type' => 'portfolio',
            'posts_per_page' => 8,
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

  <section class="blog">
    <div class="container">
      <h2 class="text-center"><span> Blog </span></h2>
      <div class="row">
        <?php
        $argBlog = array(
          'post_type'       => "post",
          'posts_per_page'  => 3
        );

        $blogHome = new wp_query($argBlog);
        if($blogHome->have_posts()):
          while($blogHome->have_posts()): $blogHome->the_post();
          ?>
            <div class="col-md-4">
              <div class="img-thumb-blog">
                <a href="<?php the_permalink() ?>">
                  <?php the_post_thumbnail( 'high', array( 'class' => 'img-responsive' ) ); ?>
                </a>
              </div>
              <h3> <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a> </h3>
            </div>
          <?php
          endwhile;
        else:
          echo "Nenhum post encontrado";
        endif;
        ?>
      </div>
    </div>
  </section>
<?php get_footer()   ?>

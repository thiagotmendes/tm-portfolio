<?php get_header() ?>
  <section class="title">
    <div class="container">
      <h1 class="text-center"> Blog </h1>
    </div>
  </section>
  <div class="container interno">
    <div class="row">
      <!-- articles -->
      <div class="col-md-8">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <article class="wow fadeIn" data-wow-duration="3s">
            <div class="img-blog">
              <?php the_post_thumbnail( 'high', array( 'class' => 'img-responsive' ) ); ?>
            </div>
            <div class="">
              <hr>
              <h1> <?php the_title() ?> </h1>
              <p class="data-noticia text-right"> <?php the_time('j \d\e F \d\e Y') ?> </p>
              <p class="text-justify">
                <?php the_content() ?>
              </p>
            </div>
          </article>

          <article class="bloco-noticia">
            <div class="conteudo-artigo">
              <?php $tag_single = get_the_tags( $post->ID ); ?>
              <?php if (!empty($tag_single)): ?>
                <hr>
                <div class="tags">
                  <?php the_tags( 'Tags: ', ', ', '<br />' ); ?>
                </div>
                <hr>
              <?php endif ?>

              <div class="author">
                <div class="row">
                  <div class="col-md-2 img-author">
                    <?php $email = get_the_author_email();
                    $grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=".md5($email). "&default=".urlencode($GLOBALS['defaultgravatar'] );
                    $usegravatar = get_option('woo_gravatar');?>
                    <img src="<?php echo $grav_url; ?>" alt=""/>
                  </div>
                  <div class="col-md-10">
                    <h4 class="nome-author"><a href = "<?php the_author_url ();?>" itemprop="url"><?php the_author(); ?></a></h4>
                    <?php the_author_description();?>
                  </div>
                </div>
              </div>
              <hr>
              <?php comments_template(); ?>
            </div>
          </article>

        <?php endwhile; ?>
        <?php else: ?>
          Nenhum post encontrado
        <?php endif; ?>
      </div>
      <!-- sidebar -->
      <div class="col-md-4">
        <?php get_sidebar() ?>
      </div>
    </div>
  </div>
<?php get_footer()   ?>

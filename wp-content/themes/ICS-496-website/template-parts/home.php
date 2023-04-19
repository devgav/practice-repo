<!DOCTYPE html>
    <style>* {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    .btn {
        background-color: white;
        border: 1px solid #024731;
        color: black;
        text-transform: uppercase;
    }

    #btn-work {
        background-color: white;
        color: black;
    }

    #btn-work:hover {
        background-color: #024731;
        color: white;
    }

    .btn:hover {
        background-color: #024731;
    }
    body {
      font-size: 14px;
      font-family: Lato;
      line-height: 5px;
      overflow-x: hidden; /* Hide horizontal scrollbar */
    }

    #column1 {
      padding: 7%;
      text-align: center;
      font-size: 20px;
      margin-bottom: 3%
    }

    #column2 {
      padding: 7%;
      text-align: center;
      font-size: 20px;
      margin-bottom: 3%
    }

    .p-header {
      font-size: 35px;
      margin-bottom: 0;
      text-align: left;
    }

    .p-content {
      text-align:left;
    }

    /* container */
    .responsive-two-columns {
        display:flex;
        flex-wrap:wrap;
        background: rgba(239,247,242,1);
    }

    /* columns */
    .responsive-two-columns > * {
        width:100%;
        padding:1rem;
    }

    /* tablet breakpoint */
    @media (min-width:768px) {
        .responsive-two-columns > * {
            width:50%;
          }
    }

    .third-inner {
        width: 100%;
    }
    .inner-paragraph {
        line-height: 1.5;
    }
    .center_button {
        display: flex;
        justify-content: center;
        align-content: center;
        height: 45px;
    }
    .bg-image {
        position: relative;
    }
    .bg-image img {
        width: 100%;
        min-height: 40vh;
        margin: 0 auto;
    }
    .bg-image h1 {
        color: white;
        font-size: 30px;
    }
    .page-content {
        position: absolute;
        top: 50%;
        left: 53%;
        transform: translate(-50%, -50%);
        word-wrap: break-word;
        color: white;
        width: 375px;
    }

    .right-grid-item-about {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 65vh;
    }

    .carousel {
        margin: 0 auto;
        overflow: hidden;
        text-align: center;
    }

.slides {
  width: 100%;
  display: flex;
  overflow-x: scroll;
  scrollbar-width: none;
  scroll-snap-type: x mandatory;
  scroll-behavior: smooth;
}

.slides::-webkit-scrollbar {
  display: none;
}

.slides-item {
  align-items: center;
  border-radius: 10px;
  display: flex;
  flex-shrink: 0;
  font-size: 100px;
  height: 400px;
  max-height: 400px;
  justify-content: center;
  margin: 0 1rem;
  position: relative;
  scroll-snap-align: start;
  transform: scale(1);
  transform-origin: center center;
  transition: transform .5s;
  width: 100%;
}

.carousel {
  margin: 0 auto;
  overflow: hidden;
  text-align: center;
}

.slides {
  width: 100%;
  display: flex;
  overflow-x: scroll;
  scrollbar-width: none;
  scroll-snap-type: x mandatory;
  scroll-behavior: smooth;
}

.slides::-webkit-scrollbar {
  display: none;
}

.slides-item {
  align-items: center;
  border-radius: 10px;
  display: flex;
  flex-shrink: 0;
  font-size: 80px;
  height: 400px;
  max-height: 450px;
  justify-content: center;
  /* margin: 0 1rem; */
  position: relative;
  scroll-snap-align: start;
  transform: scale(1);
  transform-origin: center center;
  transition: transform .5s;
  width: 100%;
  background-color: #EFF7F2;
}

.carousel__nav {
  padding: 1.25rem .5rem;
}

.slider-nav {
  align-items: center;
  background-color: #ddd;
  border-radius: 50%;
  color: #000;
  display: inline-flex;
  height: 1.5rem;
  justify-content: center;
  padding: .5rem;
  position: relative;
  text-decoration: none;
  width: 1.5rem;
  margin: 2px;
}

.slider-nav:hover,
.slider-nav:active {
  background-color: #000;
  color: #fff;
}

.carousel__skip-link {
  height: 1px;
  overflow: hidden;
  position: absolute;
  top: auto;
  width: 1px;
}

.carousel__skip-link:focus {
  align-items: center;
  background-color: #000;
  color: #fff;
  display: flex;
  font-size: 30px;
  height: 680px;
  justify-content: center;
  opacity: .8;
  text-decoration: none;
  width: 100%;
  z-index: 1;
}

/* CSS for tablet screen sizes */
@media only screen and (min-width: 768px) and (max-width: 1024px) {
  /* Add your tablet-specific CSS styles here */
  figure.snip1192 {
    margin: 10px 1%;
    min-width: 220px;
    max-width: 310px;
  }
  .slides-item {
    height: 500px;
    max-height: 500px;
  }
}

/* CSS for phone screen sizes */
@media only screen and (max-width: 767px) {
  /* Add your phone-specific CSS styles here */
  figure.snip1192 {
    min-width: 220px;
    max-width: 310px;
  }
  .slides-item {
    height: 500px;
    max-height: 500px;
  }
}

figure.snip1192 {
  font-family: 'Raleway', Arial, sans-serif;
  position: relative;
  float: left;
  overflow: hidden;
  margin: 10px 1%;
  min-width: 220px;
  max-width: 600px;
  width: 100%;
  color: #333;
  text-align: left;
  box-shadow: none !important;
}
figure.snip1192 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
figure.snip1192 img {
  max-width: 100%;
  height: 100px;
  width: 100px;
  border-radius: 50%;
  margin-bottom: 15px;
  display: inline-block;
  z-index: 1;
  position: relative;
}
figure.snip1192 blockquote {
  margin: 0;
  display: block;
  border-radius: 8px;
  position: relative;
  background-color: #fafafa;
  padding: 30px 50px 65px 50px;
  font-weight: 500;
  margin: 0 0 -50px;
  line-height: 1.6em;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
  font-size: 15px;
}
figure.snip1192 blockquote:before,
figure.snip1192 blockquote:after {
  font-family: 'FontAwesome';
  content: "\201C";
  position: absolute;
  font-size: 50px;
  opacity: 0.3;
  font-style: normal;
}
figure.snip1192 blockquote:before {
  top: 35px;
  left: 20px;
}
figure.snip1192 blockquote:after {
  content: "\201D";
  right: 20px;
  bottom: 35px;
}
figure.snip1192 .author {
  margin: 0;
  text-transform: uppercase;
  text-align: center;
  color: #ffffff;
}
figure.snip1192 .author h5 {
  opacity: 0.8;
  margin: 0;
  font-weight: 800;
}
figure.snip1192 .author h5 span {
  font-weight: 400;
  text-transform: none;
  display: block;
}


/* Styles for devices with a maximum width of 480px (smartphones) */
@media screen and (min-width: 1024px) {
    .center {
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    }

    .title {
        margin-left: 65px;
        padding-top: 100px;
        font-size: 70pt;
        color: white;
    }
    .second {
        height: 700px;
        padding-top: 150px;
    }

    .first-inner {
        margin-left: 65px;
    }

    .second-inner {
        margin-left: 65px;
    }

    .third-inner {
        margin-left: 65px;
    }

    .main-inner-title {
        font-size: 40px;
        padding-top: 50px;
    }

    .inner-paragraph {
        padding-top: 40px;
    }

    .grid-container {
        display:grid;
    }

    .left-grid-item {
        justify-content: left;
        width: 55%;
    }

    .right-grid-item {
        justify-content: right;
        width: 45%;
    }

    .grid-container-main {
        display: grid;
        grid-template-columns: auto auto auto auto;
        margin-bottom: 200px;
    }

    .grid-container-about {
        display: grid;
        grid-template-columns: auto auto auto auto;
    }

    .right-grid-item-about {
        height: 80vh;
    }

    .left-grid-item-about {
        justify-content: left;
        width: 90%;
        padding-right: 10px;
    }

    .bg-image {
        position: relative;
    }
    .bg-image img {
        display: block;
        width: 100%;
        margin: 0 auto;
        max-height: 60vh;
    }
    .bg-image h1 {
        position: absolute;
        text-align: center;
        font-size: 2.5rem;
        color: white;
    }
    .nav, .main {
        background-color: #f6f6f6;
        text-align: center;
    }

    .page-content {
        position: absolute;
        text-align: center;
        bottom: 0;
        left: 50%;
        top: 50%;
        color: white;
        width: 800px;
        height: 200px;
        word-wrap: break-word;
    }

    .news-grid {
        padding: 7%;
    }
    .page-numbers {
        border-radius: 5px !important;
        background-color: #024731 !important;
    }
    .grid-date-post a{
        color: black!important;
    }
    .news-more-link {
        border-radius: 5px !important;
        background-color: #024731 !important;
        color: white !important;
    }
    .news-title a{
        color: black !important;
    }
    .news-title a:hover{
        color: lightgrey !important;
    }
}

    </style>

<?php get_header(); ?>
<?php
  /**
   * Template Name: home-page
   *
   */

   $args = array(
        'post_type' => 'home',
   );

   $testimonial_query = new WP_Query($args);

   if($testimonial_query->have_posts()) :
    while($testimonial_query->have_posts()):
        $testimonial_query->the_post();
        $home_image = get_post_meta(get_the_ID(), 'home_page_background_image', true);
        $video_play = get_post_meta(get_the_ID(), 'video_url', true);
    ?>
        <?php
            $main_text_color = get_field("home_page_main_title_color") ? get_field("home_page_main_title_color") : "black";
        ?>
        <body>
            <div>
                <div class="bg-image">
                        <?php
                            if (wp_get_attachment_url($home_image)) {
                                echo wp_get_attachment_image($home_image);
                            } else {
                                echo "<img src='' style='height: 0; width: 0;'/>";
                            }
                        ?>
                        <div class="page-content">
                            <h1 style='color: <?php echo $main_text_color; ?>;'>
                                <?php the_field('home_page_main_title'); ?>
                            </h1>
                        </div>
                </div>
            </div>
            <div id="content" class="site-main">
                <div class="grid-container-about">
                    <div class="left-grid-item-about">
                        <div class="second">
                            <div class="second-inner">
                                <h1 class="main-inner-title">
                                    <?php the_field('subsection_second_title') ?>
                                <h1>
                            </div>
                            <div class="third-inner">
                                <p class="inner-paragraph">
                                    <?php the_field('subsection_paragraph') ?>
                                </p>
                                <a class="center_button" src=<?php echo the_field('subsection_button_link')?>>
                                    <button id="btn-work" class="btn btn--block card__btn">
                                        <?php the_field('subsection_button_title') ?>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="right-grid-item-about">
                        <?php
                            if ($video_play):
                        ?>
                            <?php $embed_url = str_replace("watch?v=", "embed/", $video_play); ?>
                            <iframe width="355" height="400" src=<?php echo $embed_url ?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_postdata();
                endif;
            ?>
            <section class="carousel" aria-label="carousel" Tabindex="0">
                <a class="carousel__skip-link" href="#skip-link">Skip the Carousel</a>
                <div class="slides">
                <?php
                    $args = array(
                        'post_type' => 'testimonial',
                        'meta_query' => array(
                            array(
                              'key' => 'show_in_home',
                              'value' => true,
                              'compare' => 'LIKE',
                            ),
                        )
                    );

                    $inckey = 0;
                    $testimonial_query = new WP_Query($args);
                    $num_of_posts = $testimonial_query->found_posts;

                    if($testimonial_query->have_posts()) :
                        while($testimonial_query->have_posts()):
                            $testimonial_query->the_post();
                            $inckey++;
                ?>
                    <?php
                        echo '<div class="slides-item slide-'. $inckey. '"'. 'id="slide-'. $inckey. '"'. 'aria-label="slide 1 of 5" tabindex="0">';
                        echo '<figure class="snip1192">';
                        // retrieve the id of the person in the testimonial content type
                        $testimonial_id = get_post_meta(get_the_ID(), 'testimonial_person', true);
                        $testimonial_statement = get_post_meta(get_the_ID(), 'testimonial_statement', true);
                        $testimonial_person_first_name = get_post_meta($testimonial_id, 'person_first_name', true);
                        $testimonial_person_last_name = get_post_meta($testimonial_id, 'person_last_name', true);
                        $testimonial_person_image = get_post_meta($testimonial_id, 'person_image', true);
                        $testimonial_person_image_url = wp_get_attachment_image( $testimonial_person_image );
                        echo '<blockquote>';
                            echo $testimonial_statement;
                        echo '</blockquote>';
                        echo '<div class="author">';
                            if ($testimonial_person_image != null) {
                            echo $testimonial_person_image_url;
                            echo '<h5 style="color: black;">';
                                echo $testimonial_person_first_name. '<span>'. $testimonial_person_last_name. '</span>';
                            echo '</h5>';
                            } else {
                            echo '<h5 style="color: black;">';
                                echo $testimonial_person_first_name. '<span>'. $testimonial_person_last_name. '</span>';
                            echo '</h5>';
                            }
                        echo '</div>';
                        echo '</figure>';
                        echo '</div>';
                    ?>

                    <?php
                        endwhile;
                        wp_reset_postdata();
                        endif;
                    ?>
                    </section>
                    <div class="carousel__skip-message" id="skip-link" tabindex="0">
                        <section class="carousel" aria-label="carousel" Tabindex="0">
                        <a class="carousel__skip-link" href="#skip-link">Skip the Carousel</a>
                        <div class="carousel__nav">
                            <?php
                                if ($num_of_posts != 0) {
                                    for ($count = 1; $count <= $num_of_posts; $count++) {
                                        echo '<a class="slider-nav"'. ' href="#slide-'. $count. '"'. ' aria-label="Go to Slide'. $count. '"'. '>'. $count. '</a>';
                                    }
                                }
                            ?>
                        </div>
                        <div class="carousel__skip-message" id="skip-link" tabindex="0"></div>
                    </div>

                    <!-- News grid content -->
                    <div class="news-grid">
                        <?php
                            wp_head();
                            $news_grid = do_shortcode('[sp_news grid="4" limit="4"]');
                            echo $news_grid;
                        ?>
                    </div>
        </body>

<?php     get_footer(); ?>
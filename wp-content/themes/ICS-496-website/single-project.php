<!doctype html>

<title><?php echo the_title(). ' - Project'; ?></title>
<style>
  /* Styling Here */
  *{
    box-sizing: border-box;
  }
  .light-green-background {
    background-color: #EFF7F2;
  }
  .text-center {
    text-align: center;
  }
  .small-text {
    font-size: 13px;
  }
  .text-bold-600 {
    font-weight: 600;
  }
  .margin-none {
    margin: 0;
  }
  .height-max-image {
    max-height: 400px;
  }
  .excerpt-text {
    line-height: 1.5;
    color: #1e2231;
    font-family: Roboto;
    font-size: 15px;
    opacity: 1;
    margin-bottom: 10px;
  }

  .info-data {
    font-size: 1rem;
    font-weight: 400;
    color: #212529;
    margin-bottom: 5px;
  }
  .header-text {
    color: #1e2231;
    font-family: Roboto;
    font-weight: Bold;
    font-size: 56px;
    opacity: 1;
    margin-top: 10px;
    margin-bottom: 5px;
  }
  .chip {
    /* Center the content */
    align-items: center;
    display: inline-flex;
    justify-content: center;

    color: white;

    margin-top: 5px;

    /* Background color */
    background-color: #024731;

    /* Rounded border */
    border-radius: 9999px;

    /* Spacing */
    padding: 0.15rem 0.4rem;
    margin-right: 0.25rem;
}

.chip_content {
    margin-right: 0.25rem;
    font-size: 15px;
}

.video-container {
  position: relative;
  width: 100%;
  height: 0;
  padding-bottom: 56.25%; /* 16:9 aspect ratio */
  margin-bottom: 20px;
}

.video-container iframe {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    height: 100%;
    max-width: 800px; /* set a maximum width */
    max-height: 450px; /* set a maximum height */
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

@media only screen and (min-width: 600px)  {
    .excerpt-text {
      line-height: 1.5;
      color: #1e2231;
      font-family: Roboto;
      font-size: 15px;
      opacity: 1;
      margin-bottom: 10px;
      width: 50%;
      display: inline-block;
    }
    .video-container {
      position: relative;
      width: 100%;
      height: 0;
      padding-bottom: 20%; /* 16:9 aspect ratio */
    }
    .info-data {
      width: 50%;
      display: inline-block;
    }
  }

  .button {
  background-color: white;
  border: none;
  color: black;
  border: 1px solid #024731;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  margin-bottom: 20px;
  cursor: pointer;
}

.button:hover{
  background-color: #024731;
  color: white !important;
}
</style>

<?php get_header(); ?>
<main class="grid">
  <?php
        // Retrieve the id of the post that corresponds to the instructor
        $project_instructor = get_post_meta(get_the_ID(), 'project_instructor', true);
        $project_sponsor = get_post_meta(get_the_ID(), 'project_sponsor', true);
        $project_video = get_post_meta(get_the_ID(), 'project_video', true);
        $project_student = get_post_meta(get_the_ID(), 'project_students', true);
        $project_pdf = get_post_meta(get_the_ID(), 'project_poster', true);
        $project_testimonial = get_post_meta(get_the_ID(), 'project_testimonials', true);
        $instructor_first_name = get_post_meta($project_instructor, 'person_first_name', true );
        $instructor_last_name = get_post_meta($project_instructor, 'person_last_name', true );
        $sponsor_first_name = get_post_meta($project_sponsor, 'person_first_name', true );
        $sponsor_last_name = get_post_meta($project_sponsor, 'person_last_name', true );
        $sponsor_org = get_post_meta($project_sponsor, 'person_organization', true );
    ?>
          <article class="light-green-background w3-container">
            <div class="text-center">
              <h1 class="header-text"><?php the_title() ?></h3>
              <div class="info-data">
                <p class="margin-none text-center small-text">
                  Instructor: <?php echo $instructor_first_name?> <?php echo $instructor_last_name?>
                  | Project Completed: <?php the_field("project_semester") ?> <?php the_field("project_year") ?>
                </p>
                <p class="margin-none text-center small-text">
                  Sponsor: <?php echo $sponsor_first_name?> <?php echo $sponsor_last_name?> | Sponsor Org: <?php echo $sponsor_org?>
                </p>
                <p class="margin-none text-center small-text">
                Students: <?php
                      foreach($project_student as $person_id) {
                        $students_first_name = get_post_meta($person_id, 'person_first_name', true);
                        $students_last_name = get_post_meta($person_id, 'person_last_name', true);
                        $names[] = $students_first_name . ' ' . $students_last_name;
                      }
                      echo implode(', ', $names);
                  ?>
                </p>
              </div>
              <div class="info-data" >
              <p class="margin-none">
                <?php
                // Get the terms for a specific taxonomy
                $taxonomy_terms = get_the_terms( get_the_ID(), 'tech-stack' );
                echo '<div class="text-center" style="margin-top: 10px; margin-bottom: 10px;">';
                echo '<p class="margin-none">'. 'Technologies Used: '. '</p>';
                // Loop through the terms and display their names
                if ( $taxonomy_terms && ! is_wp_error( $taxonomy_terms ) ) {
                    foreach ( $taxonomy_terms as $term ) {
                      echo '<div class="chip">';
                        echo '<div class="chip_content">'. $term->name . ' ' . '</div>';
                      echo '</div>';
                    }
                }
                echo '</div>';
                ?>
              </p>
              </div>
              <?php
                  // Get the post content
                  echo '<div class="excerpt-text">';
                  $post_content = get_post_field('post_content', get_the_ID());
                  echo '<p>'. $post_content. '</p>';
                  echo '</div>'
              ?>
            </div>

          </article>
          <section class="text-center">
            <?php
              if ($project_video != '' && $project_pdf != '') {
                echo '<h1>Media</h1>';
                echo '<div>';
                echo '<div class="video-container">';
                $embed_url = str_replace("watch?v=", "embed/", $project_video);
                echo '<iframe allow="fullscreen" width="420" height="345" src='. $embed_url. '>'. '</iframe>';
                echo '</div>';
                echo '<a data-fancybox="single-project-gallery" href="' . wp_get_attachment_url($project_pdf) . '">';
                echo '<div class="button">View Poster</div>';
                echo '</a>';
                echo '</div>';
              }
              else if ($project_video == '' && $project_pdf != '') {
                echo '<h1>Media</h1>';
                echo '<div>';
                echo '<a data-fancybox="single-project-gallery" href="' . wp_get_attachment_url($project_pdf) . '">';
                echo '<div class="button">View Poster</div>';
                echo '</a>';
                echo '</div>';
              }
              else if ($project_pdf == '' && $project_video != ''){
                echo '<h1>Media</h1>';
                echo '<div>';
                echo '<div class="video-container">';
                $embed_url = str_replace("watch?v=", "embed/", $project_video);
                echo '<iframe allow="fullscreen" width="420" height="345" src='. $embed_url. '>'. '</iframe>';
                echo '</div>';
                echo '</div>';
              } else {
              }
            ?>
          </section>
          <div class="carousel__skip-message" id="skip-link" tabindex="0">
          <section class="carousel" aria-label="carousel" Tabindex="0">
              <a class="carousel__skip-link" href="#skip-link">Skip the Carousel</a>
              <div class="slides">
                <?php
                  if ($project_testimonial  && ! is_wp_error( $project_testimonial )) {
                    // retrieve the id in the project content type
                    foreach( $project_testimonial as $key=>$project_testimonial_id) {
                      $inckey = $key + 1;
                      echo '<div class="slides-item slide-'. $inckey. '"'. 'id="slide-'. $inckey. '"'. 'aria-label="slide 1 of 5" tabindex="0">';
                      echo '<figure class="snip1192">';
                        // retrieve the id of the person in the testimonial content type
                        $testimonial_id = get_post_meta($project_testimonial_id, 'testimonial_person', true);
                        $testimonial_statement = get_post_meta($project_testimonial_id, 'testimonial_statement', true);
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
                    }
                  }
                ?>
              <div>
          </section>
          <div class="carousel__skip-message" id="skip-link" tabindex="0">
          <section class="carousel" aria-label="carousel" Tabindex="0">
            <a class="carousel__skip-link" href="#skip-link">Skip the Carousel</a>
            <div class="carousel__nav">
              <?php
                if ($project_testimonial) {
                  foreach($project_testimonial as $key=>$project_testimonial_id) {
                    $inckey = $key + 1;
                    echo '<a class="slider-nav"'. ' href="#slide-'. $inckey. '"'. ' aria-label="Go to Slide'. $inckey. '"'. '>'. $inckey. '</a>';
                  }
                }
              ?>
            </div>
            <div class="carousel__skip-message" id="skip-link" tabindex="0"></div>
          </section>
        <?php
      wp_reset_postdata();
  ?>

</main>

<?php get_footer(); ?>

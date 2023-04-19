<?php
    get_header();
  /**
   * Template Name: FAQ Page
   */
  $args = array(
    'post_type' => 'faqdescription', // replace 'project' with the name of your custom post type
  );
$project_query = new WP_Query( $args );
if ( $project_query->have_posts() ) :
  while ( $project_query->have_posts() ) :
    $project_query->the_post();
?>

<style>
@import url('https://fonts.googleapis.com/css?family=Roboto');

h1 {
  font-family: Roboto;
}

body{
  font-family: Roboto;
  color: black;
}

.container h1{
  text-align: center;
}

.container {
  padding-bottom: 5%;
}

details{
  font-size: 1.5rem;
  margin-left: 25%;
  width: 50%;
  margin-bottom: 1%;
}

summary {
  padding: .5em 0rem;
  list-style: none;
  display: flex;
  justify-content: space-between;  
  transition: height 1s ease;
}

summary::-webkit-details-marker {
  display: none;
}

summary:after{
  content: "\002B";
}

details summary {
  border-bottom: 1px solid #aaa;
  cursor: pointer;
  position: relative;
  transition: all 0.2s cubic-bezier(0.5, 0, 0.1, 1);
}

details[open] summary {
  margin-bottom: .5em;
}

details[open] summary::after {
  content: '\002B';
  transform: rotate(-45deg);
}

details summary::after {
  content: '\002B';
  color: #aaa;
  position: absolute;
  top: 50%;
  right: 10px;
  font-size: 20px;
  transition: all 0.2s cubic-bezier(0.5, 0, 0.1, 1);
}

@media (max-width: 767px) {
  details summary::after {
    right: 15px;
  }
}

details[open] summary::after {
  transform: rotate(-135deg);
}

details > div {
  padding: 0 0 10px;
  border-bottom: 1px solid #aaa;
}

</style>
<html>
  <div class="container">
    <h1><?php the_field('faq_page_main_title')?></h1>
    <?php
      // Get the post content
      echo '<div class="excerpt-text">';
      $post_content = get_post_field('post_content', get_the_ID());
      echo '<p>'. $post_content. '</p>';
      echo '</div>'
    ?>
  </div>
</html>
<?php
  endwhile;
  wp_reset_postdata();
  endif;
  get_footer();
?>
<?php
  get_header();
  /**
   * Template Name: Video Gallery
   *
   */
?>
<style>
  @import url('https://fonts.googleapis.com/css?family=Roboto');

body{
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

.section{
  display: flex;
  flex-direction: column;
  align-items: center;
  font-family: Roboto;
  padding-bottom: 5%;
  z-index: 2;
}

h1{
  font-size: 40pt;
  font-weight: 500;
  color: black;
}

.container {
  margin-top: 50px;
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  width: 100%;
}

.item {
  position: relative;
  float: left;
  overflow: hidden;
  margin: 10px 1%;
  min-width: 320px;
  max-width: 410px;
  width: 100%;
  text-align: center;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
  box-sizing: border-box;
}

.item:hover{
  cursor: pointer;
}

.item *{
  transition: all 0.35s ease-in-out;
}

img {
  max-width: 100%;
  vertical-align: top;
  height: 310px;
}

.item:hover img {
  opacity: 0;
}

.text{
  width: 80%;
  height: 90%;
  position: absolute;
  top: -100px;
  left: 10%;
  color: black;
}

.item:hover .text{
  top: 20%;
}

.item:hover .button{
  bottom: 45%;
  color: black;
}

.item .button{
  position: absolute;
  bottom: -100px;
  left: 25%;
  width: 50%;
  border: 3px solid #024731;
  padding: 15px;
  box-sizing: border-box;
  transition: all 0.3s ease-in-out;
}

.button:hover{
  background-color: #024731;
  color: white !important;
}

/* Close Button */
.close {
  color: #aaa;
  font-size: 28px;
  font-weight: bold;
  position: absolute;
  right: 10px;
}

.close:hover,
.close:focus {
  color: #363638;
  text-decoration: none;
  cursor: pointer;
}

.pagination {
    margin: 20px 0;
}

.pagination .page-numbers {
    display: inline-block;
    padding: 8px 16px;
    margin-right: 10px;
    border: 1px solid #024731;
    border-radius: 4px;
    color: #333;
    font-size: 14px;
    font-weight: bold;
    text-decoration: none;
}

.pagination .page-numbers:hover {
    background-color: #024731;
}

.pagination .current {
    background-color: #024731;
    color: #fff;
}
</style>
  <div class="section">
  <h1>Video Gallery</h1>
  <div class="container">
    <?php
      $args = array(
        'post_type' => 'project', // replace 'project' with the name of your custom post type
        'meta_query' => array(
          array(
            'key' => 'show_in_dropdown',
            'value' => true,
            'compare' => 'LIKE',
          ),
          array(
            'key' => 'project_video',
            'value' => '',
            'compare' => '!=',
          ),
        ),
        'posts_per_page'  => 10,
        'paged' => $paged
      );

      $project_query = new WP_Query( $args );

      if ( $project_query->have_posts() ) :
        while ( $project_query->have_posts() ) :
          $project_query->the_post();
          $post_id = get_the_ID();
          $project_video = get_post_meta($post_id, 'project_video', true);
          $project_students = get_post_meta($post_id, 'project_students', true);
    ?>

    <div class="item" id="1">
      <div>
        <?php the_post_thumbnail() ?>
      </div>
      <div class="text">
      </div>
      <a data-fancybox="video-gallery" href="<?php echo $project_video?>&amp;autoplay=1">
        <div class="button">WATCH</div>
      </a>
      <div>
        <p>
          <?php
            the_title();
          ?>
          <br/>
          Members:
          <?php
            $student_names = array();
            foreach($project_students as $student) {
                if ($student_name = get_post_meta($student, 'person_first_name', true)) {
                    $student_names[] = $student_name;
                }
            }
            echo implode(', ', $student_names);
          ?>
        </p>
      </div>
    </div>

    <?php
      endwhile;
      wp_reset_postdata();
    endif;
    ?>
  </div>
</div>
<?php
    // Display pagination links
    echo '<div class="pagination" style="text-align: center; color: black;">';
    $total_pages = $project_query->max_num_pages;
    if ( $total_pages > 1 ) {
      echo paginate_links( array(
        'total' => $project_query->max_num_pages,
        'prev_text' => '&laquo;',
        'next_text' => '&raquo;'
    ) );
    }
    echo '</div>';
  ?>
<?php
  wp_reset_postdata();
  get_footer();
?>
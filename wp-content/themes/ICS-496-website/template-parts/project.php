<?php get_header(); ?>

<style>
*,
*::before,
*::after {
  box-sizing: border-box;
}
img {
  height: auto;
  max-width: 100%;
  vertical-align: middle;
}
.btn {
  background-color: white;
  border: 1px solid #024731;
  color: black;
  padding: 0.5rem;
  text-transform: lowercase;
  margin-top: 10%;
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
.btn--block {
  display: block;
  width: 100%;
}
.cards {
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  margin: 0;
  padding: 0;
  justify-content: center;
}
.cards__item {
  display: flex;
  padding: 1rem;
}
@media (min-width: 40rem) {
  .cards__item {
    width: 50%;
  }
}
@media (min-width: 56rem) {
  .cards__item {
    width: 23%;
  }
}
.card {
  background-color: white;
  border-radius: 0.25rem;
  box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.25);
  display: flex;
  flex-direction: column;
  overflow: hidden;
}
.card:hover .card__image {
  filter: contrast(100%);
}
.card__content {
  display: flex;
  flex: 1 1 auto;
  flex-direction: column;
  padding: 1rem;
}
.card__image {
  display: flex;
  justify-content: center;
  background-position: center center;
  filter: contrast(70%);
  overflow: hidden;
  position: relative;
  transition: filter 0.5s cubic-bezier(0.43, 0.41, 0.22, 0.91);
}
@media (min-width: 40rem) {
  .card__image::before {
    padding-top: 66.6%;
  }
}
.card__title {
  color: #696969;
  font-size: 1.25rem;
  font-weight: 300;
  letter-spacing: 2px;
  text-transform: uppercase;
}
.card__text {
  flex: 1 1 auto;
  font-size: 1rem;
  line-height: 1.5;
  margin-bottom: 1.25rem;
}
.chip {
    /* Center the content */
    align-items: center;
    display: inline-flex;
    justify-content: center;

    /* Background color */
    background-color: #024731;
    color: white;

    /* Rounded border */
    border-radius: 9999px;

    /* Spacing */
    padding: 0.15rem 0.4rem;
    margin-bottom: 0.15rem;
    margin-right: 0.25rem;
}

.chip_content {
    margin-right: 0.25rem;
    font-size: 15px;
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

<ul class="cards">
  <?php
    /**
     * Template Name: Projects
     *
     */


    /**
     * TODO::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
     * MUST READ: IN ORDER TO GET THE CONTENT FROM 'person' or any other subcontent type we
     * must use this piece of code.
     *
     * // 'student' is the nameof ur content type
     * // the -><{}> is the name of your keys
     * $student_id = get_field('student');
     $student = get_post($student_id);
      $student_name = $student->post_title;
      echo "This project is assigned to student: $student_name";
      */

      // add filter functionality
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; // Get current page
    $args = array(
      'post_type' => 'project', // replace 'project' with the name of your custom post type
      'meta_query' => array(
          array(
            'key' => 'show_in_dropdown',
            'value' => true,
            'compare' => 'LIKE',
          ),
        ),
        'posts_per_page'  => 10,
        'paged' => $paged
    );

    $project_query = new WP_Query( $args );

    if ( $project_query->have_posts() ) :
      while ( $project_query->have_posts() ) :
        $project_query->the_post();
        // Retrieve the id of the post that corresponds to the instructor
        $project_instructor = get_post_meta(get_the_ID(), 'project_instructor', true);
        $project_sponsor = get_post_meta(get_the_ID(), 'project_sponsor', true);
        $instructor_first_name = get_post_meta($project_instructor, 'person_first_name', true );
        $instructor_last_name = get_post_meta($project_instructor, 'person_last_name', true );
        $sponsor_first_name = get_post_meta($project_sponsor, 'person_first_name', true );
        $sponsor_last_name = get_post_meta($project_sponsor, 'person_last_name', true );
        $sponsor_org = get_post_meta($project_sponsor, 'person_organization', true );
  ?>
  <li class="cards__item" >
    <div class="card">
      <div class="card__image"><?php the_post_thumbnail() ?></div>
      <div class="card__content">
        <div class="card__title"><?php the_title() ?></div>
        <div class="card__title"><?php the_field("project_semester") ?> <?php the_field("project_year") ?></div>
        <p class="card__text">
          Instructor: <?php echo $instructor_first_name?> <?php echo $instructor_last_name?>
          <br/>
          Sponsor: <?php echo $sponsor_first_name?> <?php echo $sponsor_last_name?>
          <br/>
          Sponsor Organization: <?php echo $sponsor_org?>
        </p>
        <?php
              // Get the terms for a specific taxonomy
              $taxonomy_terms = get_the_terms( get_the_ID(), 'tech-stack' );

              echo 'Tech Stack:';
              // Loop through the terms and display their names
              echo '<ul>';
              if ( $taxonomy_terms && ! is_wp_error( $taxonomy_terms ) ) {
                foreach ( $taxonomy_terms as $term ) {
                  echo '<div class="chip">';
                    echo '<div class="chip_content">'. $term->name . ' ' . '</div>';
                   echo '</div>';
                }
            }
              echo '</ul>';
              ?>
        <a href=<?php the_permalink(); ?> ><button id="btn-work" class="btn btn--block card__btn">View More</button></a>
      </div>
    </div>
  </li>
  <?php
    endwhile;
    wp_reset_postdata();
    endif;
  ?>

</ul>
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
<?php get_footer(); ?>

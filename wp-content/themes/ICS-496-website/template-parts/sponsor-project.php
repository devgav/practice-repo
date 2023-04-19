<!DOCTYPE html>
  <style>
    body {
      font-size: 14px;
      font-family: Lato;
    }

    #column1 {
      padding-top: 5%;
      text-align: center;
      font-size: 20px;
    }

    #column2 {
      padding-top: 5%;
      padding-bottom: 7%;
      padding-left: 7%;
      text-align: center;
      font-size: 20px;
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

    .button-56 {
      align-items: center;
      background-color: #024731;
      border: 2px solid #111;
      border-radius: 8px;
      box-sizing: border-box;
      color: white;
      cursor: pointer;
      display: flex;
      font-family: Inter,sans-serif;
      font-size: 16px;
      height: 48px;
      justify-content: center;
      line-height: 24px;
      max-width: 100%;
      padding: 0 25px;
      position: relative;
      text-align: center;
      text-decoration: none;
      user-select: none;
      -webkit-user-select: none;
      touch-action: manipulation;

    }

    .button-56:after {
      background-color: #111;
      border-radius: 8px;
      content: "";
      display: block;
      height: 48px;
      left: 0;
      width: 100%;
      position: absolute;
      top: -2px;
      transform: translate(8px, 8px);
      transition: transform .2s ease-out;
      z-index: -1;
    }

    .button-56:hover:after {
      transform: translate(0, 0);
    }

    .button-56:active {
      background-color: #346B5A;
      outline: 0;
    }

    .button-56:hover {
      outline: 0;
      background-color: #024731;
    }

    @media (min-width: 768px) {
      .button-56 {
        padding: 0 40px;
      }
    }

    .container {
      height: 200px;
      position: relative;
      margin-bottom: 3%;
    }

    .center {
      margin: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }
  </style>

<?php get_header(); ?>
<?php
  /**
   * Template Name: sponsor-project-page
   */
  $args = array(
      'post_type' => 'sponsordescription', // replace 'project' with the name of your custom post type
    );
  $project_query = new WP_Query( $args );
  if ( $project_query->have_posts() ) :
    while ( $project_query->have_posts() ) :
      $project_query->the_post();
?>
<body>
  <div class="responsive-two-columns">
    <div id="column1">
      <h1><?php the_field('sponsor_page_main_title') ?></h1>
      <p><?php the_field('sponsor_page_main_description') ?></p>
    </div>
    <div id="column2">
      <p class="p-header"><?php the_field('sponsor_page_title_1') ?></p>
      <p class="p-content"><?php the_field('sponsor_page_title_1_description') ?></p>
      <p class="p-header"><?php the_field('sponsor_page_title_2') ?></p>
      <p class="p-content"><?php the_field('sponsor_page_title_2_description') ?></p>
      <p class="p-header"><?php the_field('sponsor_page_title_3') ?></p>
      <p class="p-content"><?php the_field('sponsor_page_title_3_description') ?></p>
    </div>
  </div>
</body>
<br/><br/>
<div>
  <div class="container">
    <div class="center">
      <a href=<?php the_field('button_link') ?>> <button class="button-56" role="button"><?php the_field('button_title') ?></button></a>
    </div>
  </div>
</div>

<?php
  endwhile;
  wp_reset_postdata();
  endif;
  get_footer();
?>


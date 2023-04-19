<!DOCTYPE html>
<style>
    /* UTILITIES */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: cursive;
    }

    a {
        text-decoration: none;
    }

    li {
        list-style: none;
    }

    /* NAVBAR STYLING STARTS */
    .navbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px;
        background-color: #024731;
        color: #fff;
    }

    .nav-links a {
        color: #fff;
    }


    /* NAVBAR MENU */
    .menu {
        display: flex;
        gap: 1em;
        font-size: 18px;
        align-items: baseline;
    }

    .menu li:hover {
        background-color: #346B5A;
        border-radius: 5px;
        transition: 0.3s ease;
    }

    .menu li {
        padding: 5px 14px;
    }

    /* DROPDOWN MENU */
    .services {
        position: relative;
        color:rgba(255,255,255,.79);
    }

    .dropdown {
        background-color: #024731;
        padding: 1em 0;
        position: absolute; /*WITH RESPECT TO PARENT*/
        display: none;
        border-radius: 8px;
        top: 40px;
        z-index: 1;
    }

    .dropdown li + li {
        margin-top: 10px;
        padding: 5px;
    }

    .dropdown li {
        padding: 0.5em 1em;
        width: 8em;
        text-align: center;
    }

    .dropdown li:hover {
        background-color: #346B5A;
    }

    .services:hover .dropdown {
        display: block;
    }

    .services:hover {
        color:white;
    }

    /*RESPONSIVE NAVBAR MENU STARTS*/

    /* CHECKBOX HACK */
    input[type=checkbox]{
        display: none;
    }

    /*HAMBURGER MENU*/
    .hamburger {
        display: none;
        font-size: 24px;
        user-select: none;
    }

    /* APPLYING MEDIA QUERIES */
    @media (max-width: 1024px) {
        .menu {
            display:none;
            position: absolute;
            background-color:#024731;
            right: 0;
            left: 0;
            text-align: center;
            padding: 16px 0;
            z-index: 1;
            margin-top: 10px;
        }

        .menu li:hover {
            display: inline-block;
            background-color:#346B5A;
            transition: 0.3s ease;
        }

        .menu li + li {
            margin-top: 12px;
        }

        input[type=checkbox]:checked ~ .menu{
            display: block;
        }

        .hamburger {
            display: block;
        }

        .dropdown {
            left: 50%;
            top: 30px;
            transform: translateX(35%);
        }

        .dropdown li:hover {
            background-color: #346B5A;
        }

        #logo-img {
            height: 45px;
            width: 45px;
            margin-left: -10px;
        }
        .logo {
            margin-left: 10% !important;
        }
    }

    /* LOGO */
    .logo {
        margin-left: 5%;
        float:left;
        position: absolute;
        display: inline-block;
        font-size: 32px;
    }

    #logo-img {
        height: 45px;
        width: 45px;
        float:left;
        /* position: absolute; */
        /* margin-right: -45%; */
    }
</style>
<?php
  $args = array(
      'post_type' => 'navbarbuttons', // replace 'project' with the name of your custom post type
    );

    $project_query = new WP_Query( $args );

  if ( $project_query->have_posts() ) :
    while ( $project_query->have_posts() ) :
      $project_query->the_post();
      $navbar_image = get_post_meta(get_the_ID(), 'navbar_logo', true);
      ?>
        <html lang="en">
            <head>
                <meta charset="UTF-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <link rel="stylesheet" href="style.css" />
            </head>
            <body>
                <nav class="navbar">
                    <?php
                        add_image_size( 'custom-size', 75, 75, true );
                        if (wp_get_attachment_image($navbar_image, 'custom-size', false, array('class' => 'logo-img'))) {
                            echo wp_get_attachment_image($navbar_image, 'custom-size', false, array('class' => 'logo-img'));
                        } else {
                            echo '<div class="logo-img"></div>';
                        }
                    ?>
                     <!-- <img id="logo-img"src=<?php wp_get_attachment_image($navbar_image); ?>/> -->
                    <!-- LOGO -->
                    <div class="logo"><a href="<?php the_field('main_navbar_title_link')?>"><?php the_field('main_navbar_title')?></a></div>
                    <!-- NAVIGATION MENU -->
                    <ul class="nav-links">
                        <input type="checkbox" id="checkbox_toggle" />
                        <label for="checkbox_toggle" class="hamburger">&#9776;</label>
                        <!-- NAVIGATION MENUS -->
                        <div class="menu">
                            <li><a href="<?php the_field('navbar_button_1_link')?>"><?php the_field('navbar_button_1')?></a></li>
                            <li class="services">
                                <a><?php the_field('navbar_dropdown_button_title')?></a>
                                <!-- DROPDOWN MENU -->
                                <ul class="dropdown">
                                    <li><a href="<?php the_field('navbar_dropdown_1_link')?>"><?php the_field('navbar_dropdown_1_title')?></a></li>
                                    <li><a href="<?php the_field('navbar_dropdown_2_link')?>"><?php the_field('navbar_dropdown_2_title')?></a></li>
                                </ul>
                            </li>
                            <li><a href="<?php the_field('navbar_button_2_link')?>"><?php the_field('navbar_button_2')?></a></li>
                            <li><a href="<?php the_field('navbar_button_3_link')?>"><?php the_field('navbar_button_3')?></a></li>
                            <li><a href="<?php the_field('navbar_button_4_link')?>"><?php the_field('navbar_button_4')?></a></li>
                            <li><?php get_search_form(); ?></li>
                        </div>
                    </ul>
                </nav>
            </body>
        </html>
      <?php
    endwhile;
    wp_reset_postdata();
  endif;
?>

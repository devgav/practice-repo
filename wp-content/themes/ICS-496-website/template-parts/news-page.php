<?php
    /*
     * Template Name: News Page
    */
    get_header();
    ?>
<style>
    .page-numbers {
        background-color: #024731 !important;
        border-radius: 5px !important;
    }
    .grid-date-post a{
        color: black!important;
    }
    .news-title a{
        color: black !important;
    }
    .news-title a:hover{
        color: lightgrey !important;
    }
    .news-more-link {
        border-radius: 5px !important;
        background-color: #024731 !important;
        color: white !important;
    }
    .news-more-link:hover {
        color: lightgrey !important;
    }
    .news_grid {
        margin-top: 1%;
        width: 60%;
        left: 20%;
        position: relative;
        color: #000;
        font-size: 16px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 10%;
    }

    h1 {
        position: relative;
        left: 20.7%; 
        margin-top:5%;
    }

</style>

<html>
    <h1>News & Events</h1>
    <div class="news_grid">
        <!-- News grid content -->
        <?php
        wp_head();
        $news_grid = do_shortcode('[sp_news grid="list" limit="10"]');
        echo $news_grid;
    ?>
</div>
</html>

<?php
    get_footer();
?>
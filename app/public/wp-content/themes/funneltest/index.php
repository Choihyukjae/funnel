<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    .funnel_theme_blogname{
        text-align: center;
        margin-top: 50px;
    }
    /* .maincontent{
        width: 100%;
        height: 500px;
        display: inline-block;
        text-align: center;

    } */
</style>
<body>
    <?php get_header() ?>
    <hr>

    <h1 class="funnel_theme_blogname" ><?php echo get_option('blogname'); ?></h1>
    <?php  

    // query_posts('cat=1');
    //     if (have_posts()) :
    //         while(have_posts()) : the_post();
    //             echo ;
    //         endwhile;
    //     endif;
    //     wp_reset_query();


    
        if(have_posts()) :
            while(have_posts()) :
                the_post() ;

                ?><hr><a class="maincontent" href=<?php the_permalink(); ?> ><?php the_title();?></a>   <?php
                the_category();
            endwhile;
        endif;

    // $choipost = $wpdb->get_var( "SELECT post_title , post_content FROM {$wpdb->prefix}posts" ); 
    
    // var_dump($choipost);

    ?>

    

    <hr>
    <?php get_footer() ?>

</body>
</html>
<?php



?>
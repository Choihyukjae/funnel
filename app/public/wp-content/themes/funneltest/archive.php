<h1>상세페이지</h1>


<?php

the_archive_title('제목 : ', 'Archive');

    if(have_posts()) :
        while(have_posts()) :
            the_post() ;

            ?><hr><a class="maincontent" href=<?php the_permalink(); ?> ><?php the_title();?></a>   <?php
        endwhile;
    endif;
?>

<h2>년도별 archive</h2>
<?php wp_get_archives( 'type = yearly');  ?>
<h2>카테고리 archive</h2>
<?php wp_list_categories();  ?>
<h2>년도별 archive</h2>
<?php wp_get_archives( 'type = yearly');  ?>
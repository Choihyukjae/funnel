<h1>상세페이지</h1>


<?php
    if(have_posts()) :
        while(have_posts()) :
            the_post() ;

            ?> <span>게시글 번호 :</span> <?the_ID(); ?><br> <span>제목 : </span> <?php the_title(); ?> <br><br> <span>내용:</span><?php the_content(); ?> <br><br><br><br><br> <span>작성날짜:</span><?php the_time();?> <br><span>작성자:</span><?php the_author();
        endwhile;
    endif;

?>

<button  type="button" onclick= "choi_back()">돌아가기</button>
<script>
function choi_back(){
    history.back();
}

</script>
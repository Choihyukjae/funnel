<?php
/**
 * Plugin Name: test-plugin
 * Plugin URI: http://pracsite.local/
 * Description: 최혁재 테스트 플러그인.
 * Version: 0.1
 * Author: machine
 * Author URI: http://pracsite.local/
**/


function prac_test_menu(){

    add_menu_page(  'TEST',  
                'TEST',  
                'manage_options',  
                'test_menu', 
                'custom_menu_callback',  
                $icon_url = '',  
                $position = null 
                );
    }

    function custom_menu_callback(){
        echo '<h1>prac custom<h1>';
        }

add_action('admin_menu' , 'prac_test_menu');

function prac_add_menu() {
    add_submenu_page(
        'test_menu',          // 부모 메뉴의 슬러그
        'Practice Submenu',  // 하위 메뉴 제목
        'Practice Menu',     // 메뉴 이름 
        'manage_options',    //  권한 (일반적으로 manage_options)
        'test_menu',         // 하위 메뉴의 슬러그 (고유해야 함)
        'prac_callback'      // 출력할 내용을 처리하는 콜백 함수 이름
                );
    }

function prac_callback() {
    echo '<h3>Practice Submenu<h3>';
    global $wpdb;

    $num_a = $wpdb->get_var( "SELECT option_value FROM {$wpdb->prefix}options WHERE option_name = 'num_a'" ); 
    $num_b = $wpdb->get_var( "SELECT option_value FROM {$wpdb->prefix}options WHERE option_name = 'num_b'" ); 
    echo $num_a;
    echo $num_b;
    ?>
    
    <form action="http://pracsite.local/wp-admin/admin-post.php" method="post">
    <input type="hidden" name="action" value="add_foobar">
    <input type="hidden" name="data" value="foobarid">
    <input type="number" name="num_a" placeholder = <?php echo $num_a  ?>>
    <input type="number" name="num_b" placeholder = <?php echo $num_b  ?>>
    <input type="submit" value="Submit">
    </form>


    <?php
}
add_action( 'admin_post_add_foobar', 'prefix_admin_add_foobar' );

function prefix_admin_add_foobar() {
    
    global $wpdb;

    $num_a = $wpdb->get_var( "SELECT option_value FROM {$wpdb->prefix}options WHERE option_name = 'num_a'" ); 
    $num_b = $wpdb->get_var( "SELECT option_value FROM {$wpdb->prefix}options WHERE option_name = 'num_b'" ); 
    
        if (isset($num_a) && isset($num_b)) {

                $wpdb->update(
                        'wp_options',
                    array( 'option_value' => $_POST['num_a'] ),
                    array( 'option_name' => 'num_a' )
                );
                $wpdb->update(
                    'wp_options',
                    array( 'option_value' => $_POST['num_b'] ),
                    array( 'option_name' => 'num_b' )
                );
            // wpdb::update( 'wp_options', array( 'option_value' => $_POST['num_a'], 'option_name' => 'num_a'  ) );
            // wpdb::update( 'wp_options', array( 'option_value' => $_POST['num_b'], 'option_name' => 'num_b'  ) );

            // $wpdb->update(
            //     $wpdb->prefix . 'wp_options',
            //     array( 'option_name' => 'num_a',
            //             'option_value' => $_POST['num_a'] ),
            // );
            // $wpdb->update(
            //     $wpdb->prefix . 'wp_options',
            //     array( 'option_name' => 'num_b',
            //             'option_value' => $_POST['num_b'] ),
            // );
                ?> <script> history.back();  </script>  <?php
        }

        elseif (isset($num_a) && !isset($num_b) && $_POST['num_b'] != '' && $_POST['num_a'] == '' ) {
            
            $wpdb->insert( 
                'wp_options', 
                    array( 
                        'option_name' => 'num_b',
                        'option_value' => $_POST["num_b"],
                    ), 
                );
        }
        elseif (isset($num_a) && !isset($num_b) && $_POST['num_b'] == '' && $_POST['num_a'] != '' ) {
            
        
            $wpdb->update(
                $wpdb->prefix . 'options',
                array( 'option_value' => $_POST['num_a'] ),
                array( 'option_name' => 'num_a' )
            );
        }
        elseif (isset($num_a) && !isset($num_b) && $_POST['num_b'] != '' && $_POST['num_a'] != '' ) {
            
        
            $wpdb->update(
                $wpdb->prefix . 'options',
                array( 'option_value' => $_POST['num_a'] ),
                array( 'option_name' => 'num_a' )
            );
            $wpdb->insert( 
                'wp_options', 
                    array( 
                        'option_name' => 'num_b',
                        'option_value' => $_POST["num_b"],
                    ), 
                );
        }

        elseif (isset($num_b) && !isset($num_a) && $_POST['num_a'] != '' && $_POST['num_b'] == '' ) {
            
            $wpdb->insert( 
                'wp_options', 
                    array( 
                        'option_name' => 'num_a',
                        'option_value' => $_POST["num_a"],
                    ), 
                );
        }
        elseif (isset($num_b) && !isset($num_a) && $_POST['num_a'] == '' && $_POST['num_b'] != '' ) {
            
        
            $wpdb->update(
                $wpdb->prefix . 'options',
                array( 'option_value' => $_POST['num_b'] ),
                array( 'option_name' => 'num_b' )
            );
        }
        elseif (isset($num_b) && !isset($num_a) && $_POST['num_a'] != '' && $_POST['num_b'] != '' ) {
            
        
            $wpdb->update(
                $wpdb->prefix . 'options',
                array( 'option_value' => $_POST['num_b'] ),
                array( 'option_name' => 'num_b' )
            );
            $wpdb->insert( 
                'wp_options', 
                    array( 
                        'option_name' => 'num_a',
                        'option_value' => $_POST["num_a"],
                    ), 
                );
        }

        elseif($_POST['num_a'] != '' && $_POST['num_b'] == '' ){

            $wpdb->insert(
                
            'wp_options', 
                array( 
                    'option_name' => 'num_a',
                    'option_value' => $_POST["num_a"],
                ), 
            );
                

        }

        elseif($_POST['num_a'] == '' && $_POST['num_b'] != '' ){

            $wpdb->insert(
                
            'wp_options', 
                array( 
                    'option_name' => 'num_b',
                    'option_value' => $_POST["num_b"],
                ), 
            );
                

        }

        else{
            $wpdb->insert(
                
            'wp_options', 
                array( 
                    'option_name' => 'num_a',
                    'option_value' => $_POST["num_a"],
                ), 
            );
            $wpdb->insert( 
                'wp_options', 
                    array( 
                        'option_name' => 'num_b',
                        'option_value' => $_POST["num_b"],
                    ), 
                );
                ?> <script> history.back();  </script>  <?php
        }
    }

    


add_action('admin_menu', 'prac_add_menu');


// function testCodeFunc($attributes) {
//    $default = array(
//       'title' => '최혁재'
//    );
//    $attr = shortcode_atts($default, $attributes);
//    $html = <<<EOF

//    {$attr['title']}님 안녕하세요!

// EOF;
//    return $html;
// }


// add_shortcode('testCode', 'testCodeFunc');

function changeTestFunc($attributes) {

    $abuselist =  array('바보'
                        ,'멍청이'
                        ,'똥개'
                        ,'말미잘');

    $default =array(
        'test' => '최혁재'
    );
    $attr = shortcode_atts($default, $attributes);


    foreach ($abuselist as $value) {
        
        if($attr['test'] == $value){
            return '안녕하세요 만나서 반갑습니다 저는 ** 입니다';
        }
    } 

        return '안녕하세요 만나서 반갑습니다 저는'.$attr['test'].'입니다';
    

}
add_shortcode('choi', 'changeTestFunc');

function googlebutton_function( $atts, $content = null ) {
    return '<a href="http://google.com">' . $content . '</a>';
    }
    add_shortcode('google', 'googlebutton_function');

// update_option( 'blogname', 'practice', $autoload = null ) ;

function youtube($atts) {
    extract(shortcode_atts(array(
        "value" => 'http://',
        "width" => '475',
        "height" => '350',
        "name"=> 'movie',
        "allowFullScreen" => 'true',
        "allowScriptAccess"=>'always',
        "controls"=> '1',
        ), $atts));
        return '<object style="height: '.$height.'px; width: '.$width.'px"><param name="'.$name.'" value="'.$value.'"><param name="allowFullScreen" value="'.$allowFullScreen.'"><param name="allowScriptAccess" value="'.$allowScriptAccess.'"><embed src="'.$value.'" type="application/x-shockwave-flash" allowfullscreen="'.$allowFullScreen.'" allowScriptAccess="'.$allowScriptAccess.'" width="'.$width.'" height="'.$height.'"></object>';
    }
    add_shortcode("youtube", "youtube");

function wporg_custom_post_type() {
    register_post_type('wporg_product',
        array(
            'labels'      => array(
                'name'          => __('Products', 'textdomain'),
                'singular_name' => __('Product', 'textdomain'),
            ),
                'public'      => true,
                'has_archive' => true,
        )
    );
}
add_action('init', 'wporg_custom_post_type');
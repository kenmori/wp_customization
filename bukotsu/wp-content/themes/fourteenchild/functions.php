<?php
 
//ここに処理を記述していきます
 
// wp_deregister_script('jquery');
// wp_enqueue_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', array(), '1.11.1');


/*
絵文字がいらないので消去
*/
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/*
headerでjqueryを読み込まない設定(二重で読み込む対応)
*/

remove_action(‘wp_head’, ‘index_rel_link’);

// パンくずリスト
function breadcrumb(){
    global $post;
    $str ='';
    if(!is_home()&&!is_admin()){
        $str.= '<div id="breadcrumb" class="cf"><div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" style="display:table-cell;">';
        $str.= '<a href="'. home_url() .'" itemprop="url"><span itemprop="title">ホーム</span></a> &gt;&#160;</div>';
        if(is_category()) {
            $cat = get_queried_object();
            if($cat -> parent != 0){
                $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
                foreach($ancestors as $ancestor){
$str.='<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" style="display:table-cell;"><a href="'. get_category_link($ancestor) .'" itemprop="url"><span itemprop="title">'. get_cat_name($ancestor) .'</span></a> &gt;&#160;</div>';
                }
            }
$str.='<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" style="display:table-cell;"><a href="'. get_category_link($cat -> term_id). '" itemprop="url"><span itemprop="title">'. $cat-> cat_name . '</span></a> &gt;&#160;</div>';
        } elseif(is_page()){
            if($post -> post_parent != 0 ){
                $ancestors = array_reverse(get_post_ancestors( $post->ID ));
                foreach($ancestors as $ancestor){
                    $str.='<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" style="display:table-cell;"><a href="'. get_permalink($ancestor).'" itemprop="url"><span itemprop="title">'. get_the_title($ancestor) .'</span></a> &gt;&#160;</div>';
                }
            }
        } elseif(is_single()){
            $categories = get_the_category($post->ID);
            $cat = $categories[0];
            if($cat -> parent != 0){
                $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
                foreach($ancestors as $ancestor){
                    $str.='<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" style="display:table-cell;"><a href="'. get_category_link($ancestor).'" itemprop="url"><span itemprop="title">'. get_cat_name($ancestor). '</span></a>→</div>';
                }
            }
            $str.='<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" style="display:table-cell;"><a href="'. get_category_link($cat -> term_id). '" itemprop="url"><span itemprop="title">'. $cat-> cat_name . '</span></a> &gt;&#160;</div>';
        } else{
            $str.='<div>'. wp_title('', false) .'</div>';
        }
        $str.='</div>';
    }
    echo $str;
}


if (!is_admin()) {
//    function deregister_script(){  //登録解除の項目

//     }
    add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );
    function dequeue_jquery_migrate( $scripts){
        if(!is_admin()){
            $scripts->remove( 'jquery');
            // $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
        }
    }
    // function deregister_qjuery() {
    //     if ( !is_admin() ) {
    //         wp_deregister_script('jquery');
    //     }
    // }

// add_action('wp_enqueue_scripts', 'deregister_qjuery');
//    function register_script(){  //登録の項目
//         wp_register_script( 'bundle', get_stylesheet_directory_uri() . '/dist/fourteen.bundle.js', false, '', true);
//         }
    function add_script() {  // 装備の項目
        // deregister_script();
        // register_script();
        // wp_enqueue_script('bundle');

    }
    add_action('wp_enqueue_scripts', 'add_script');
}


//function my_styles() {
//    wp_enqueue_style( 'bootstrap', get_bloginfo( 'stylesheet_directory') . '/dist/style.css', array(), null, 'all');
//}
//add_action( 'wp_enqueue_scripts', 'my_styles');


if (!function_exists('remove_wp_open_sans')) :
    function remove_wp_open_sans() {
        wp_deregister_style( 'open-sans' );
        wp_register_style( 'open-sans', false );
    }
    add_action( 'wp_enqueue_scripts', 'remove_wp_open_sans');

    // Uncomment below to remove from admin
    // add_action('admin_enqueue_scripts', 'remove_wp_open_sans');
endif;

?>
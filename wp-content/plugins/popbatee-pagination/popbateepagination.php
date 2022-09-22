<?php
/*
Plugin Name:Popbatee Pagination
Description:It's a simple custom post type ajax Popbatee pagination plugin.
Version:1.0
Author:Son Nguyen
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function popbatee_pagination_enqueue() {

    wp_register_script( 'popbatee-pagination-custom-js', plugin_dir_url( __FILE__ ) .'js/popbatee_pagination.js');
    wp_localize_script( 'popbatee-pagination-custom-js', 'ajax_params', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    wp_enqueue_script( 'popbatee-pagination-custom-js' );
}

add_action('wp_enqueue_scripts', 'popbatee_pagination_enqueue');

add_action( 'wp_ajax_popbateepagination', 'popbatee_pagination_callback' );
add_action( 'wp_ajax_nopriv_popbateepagination', 'popbatee_pagination_callback' );

function popbatee_pagination_callback() {
    global $wpdb;
    $cptaNumber = absint($_POST['number']);
    $cptaLimit  = absint($_POST['limit']);
    $cptaType = sanitize_text_field($_POST['cptapost']);
    $cptaCatName = sanitize_text_field($_POST['cptacatname']);
    $cptataxname = sanitize_text_field($_POST['cptataxname']);
    if( $cptaNumber == "1" ){
        $cptaOffsetValue = "0";
        if( $cptataxname ) {
            $args = array('posts_per_page' => $cptaLimit,'post_type' => $cptaType,$cptataxname=>$cptaCatName,'post_status' => 'publish');
        }else{
            $args = array('posts_per_page' => $cptaLimit,'post_type' => $cptaType,'post_status' => 'publish');
        }
    }else{
        $cptaOffsetValue = ($cptaNumber-1)*$cptaLimit;
        if( $cptataxname ) {
            $args = array('posts_per_page' => $cptaLimit,'post_type' => $cptaType,$cptataxname=>$cptaCatName,'offset' => $cptaOffsetValue,'post_status' => 'publish');
        }else{
            $args = array('posts_per_page' => $cptaLimit,'post_type' => $cptaType,'offset' => $cptaOffsetValue,'post_status' => 'publish');
        }

    }
    // add pagination content
    echo '<div class="row">';
    $cptaQuery = new WP_Query( $args );
    if( $cptaQuery->have_posts() ){
        while( $cptaQuery->have_posts() ){ $cptaQuery->the_post();

            include plugin_dir_path(__DIR__). "popbatee-pagination/templates/items.php";

        } wp_reset_postdata();
    }
    echo '</div>';

    // add pagination navigation
    echo '<div class="row">
          <div class="col-md-12 justify-content-center">';
    if($cptataxname!=""){
        $cpta_args = array('posts_per_page' => -1,'post_type' => $cptaType,$cptataxname=>$cptaCatName,'post_status' => 'publish');
    }else{
        $cpta_args = array('posts_per_page' => -1,'post_type' => $cptaType,'post_status' => 'publish');
    }
    $cpta_Query = new WP_Query( $cpta_args );
    $cpta_Count = count($cpta_Query->posts);
    $cpta_Paginationlist = ceil($cpta_Count/$cptaLimit);
    $last = ceil( $cpta_Paginationlist );
    if( $cptaNumber>1 ){ $cptaprev = $cptaNumber-1;	}
    if( $cptaNumber < $last ){ $cptanext = $cptaNumber+1; }

    $adjacents = "2";
    $setPagination = "";
    if( $cpta_Paginationlist > 0 ){

        $setPagination .="<ul class='list-cptapagination pagination justify-content-center'>";
        //$setPagination .="<li class='pagitext'><a href='javascript:void(0);' onclick='javascript:cptaajaxPagination($cptaprev,$cptaLimit)'>Prev</a></li>";

        if ( $cpta_Paginationlist < 7 + ($adjacents * 2) ){

            for( $cpta=1; $cpta<=$cpta_Paginationlist; $cpta++){

                if( $cptaNumber ==  $cpta ){ $active="active"; }else{ $active=""; }
                $setPagination .="<li class='page-item ".$active."'><a href='javascript:void(0);' id='post' class='page-link $active' data-posttype='$cptaType' data-taxname='$cptataxname' data-cattype='$cptaCatName' onclick='cptaajaxPagination($cpta,$cptaLimit);'>$cpta</a></li>";

            }

        } else if ( $cpta_Paginationlist > 5 + ($adjacents * 2) ){

            if( $cptaNumber < 1 + ($adjacents * 2) ){

                for( $cpta=1; $cpta <=4 + ($adjacents * 2); $cpta++){

                    if( $cptaNumber ==  $cpta ){ $active="active"; }else{ $active=""; }
                    $setPagination .="<li class='page-item " .$active."'><a href='javascript:void(0);' id='post' class='page-link $active' data-posttype='$cptaType' data-taxname='$cptataxname' data-cattype='$cptaCatName' onclick='cptaajaxPagination($cpta,$cptaLimit);'>$cpta</a></li>";
                }
                $setPagination .="<li class='pagitext dots'>...</li>";
                $setPagination .="<li class='pagitext page-item ".$active."'><a href='javascript:void(0);'  class='page-link' onclick='javascript:cptaajaxPagination($last,$cptaLimit)'>".$last."</a></li>";

            } elseif( $cpta_Paginationlist - ($adjacents * 2) > $cptaNumber && $cptaNumber > ($adjacents * 2)) {

                $setPagination .="<li class='page-item'><a href='javascript:void(0);' id='post' class='page-link' data-posttype='$cptaType' data-taxname='$cptataxname' data-cattype='$cptaCatName' onclick='cptaajaxPagination(1,$cptaLimit);'>1</a></li>";
                $setPagination .="<li class='pagitext dots'>...</li>";

                for( $cpta=$cptaNumber - $adjacents; $cpta<=$cptaNumber + $adjacents; $cpta++){

                    if( $cptaNumber ==  $cpta ){ $active="active"; }else{ $active=""; }
                    $setPagination .="<li class='page-item $active'><a href='javascript:void(0);' id='post' class='page-link $active' data-posttype='$cptaType' data-taxname='$cptataxname' data-cattype='$cptaCatName' onclick='cptaajaxPagination($cpta,$cptaLimit);'>$cpta</a></li>";

                }

                $setPagination .="<li class='pagitext dots'>...</li>";
                $setPagination .="<li class='pagitext page-item'><a href='javascript:void(0);' class='page-link' onclick='javascript:cptaajaxPagination($last,$cptaLimit)'>".$last."</a></li>";

            } else {

                $setPagination .="<li class='page-item'><a href='javascript:void(0);' id='post' class='page-link $active' data-posttype='$cptaType' data-taxname='$cptataxname' data-cattype='$cptaCatName' onclick='cptaajaxPagination(1,$cptaLimit);'>1</a></li>";
                $setPagination .="<li class='pagitext dots'>...</li>";

                for ($cpta = $last - (2 + ($adjacents * 2)); $cpta <= $last; $cpta++){

                    if( $cptaNumber ==  $cpta ){ $active="active"; }else{ $active=""; }
                    $setPagination .="<li class='page-item $active'><a href='javascript:void(0);' id='post' class='page-link $active' data-posttype='$cptaType' data-taxname='$cptataxname' data-cattype='$cptaCatName' onclick='cptaajaxPagination($cpta,$cptaLimit);'>$cpta</a></li>";

                }

            }

        } else {

            for( $cpta=1; $cpta<=$cpta_Paginationlist; $cpta++){
                if( $cptaNumber ==  $cpta ){ $active="active"; }else{ $active=""; }
                $setPagination .="<li class='page-item $active'><a href='javascript:void(0);' id='post' class='page-link $active' data-posttype='$cptaType' data-taxname='$cptataxname' data-cattype='$cptaCatName' onclick='cptaajaxPagination($cpta,$cptaLimit);'>$cpta</a></li>";
            }

        }
        //$setPagination .="<li class='pagitext'><a href='javascript:void(0);' onclick='javascript:cptaajaxPagination($cptanext,$cptaLimit)'>Next</a></li>";
        $setPagination .="</ul>";
    }
    echo $setPagination;
    echo '</div></div>';
    wp_die();
}

function popbatee_pagination_default($atts) {
    global $wpdb;

    $atts = shortcode_atts(	array('custom_post_type' => '','cptataxname'=>'','cptacatname'=>'','post_limit' => ''),$atts,'cptapagination');

    if($atts['custom_post_type'] !="" ){
        $cptaType = sanitize_text_field($atts['custom_post_type']);
    }else{
        $cptaType ="post";
    }

    if($atts['cptacatname'] !="" ){
        $cptaCatName = sanitize_text_field($atts['cptacatname']);
    }else{
        $cptaCatName ="uncategorized";
    }

    if( $atts['post_limit'] !="" ){
        $cptaLimit= absint($atts['post_limit']);
    }else{
        $cptaLimit=5;
    }


    if($atts['cptataxname']!=""){
        $cptataxname =  sanitize_text_field($atts['cptataxname']);
        $args = array('posts_per_page' => $cptaLimit,'post_type' => $cptaType,$cptataxname=>$cptaCatName,'post_status' => 'publish');
    }else{
        $args = array('posts_per_page' => $cptaLimit,'post_type' => $cptaType,'post_status' => 'publish');
    }
    echo ' <div class="container-fluid p-5 cptapagination-content" id="cptapagination-content">';
    // add pagination content
    echo '<div class="row">';
    $cptaQuery = new WP_Query( $args );
    if( $cptaQuery->have_posts() ){
        while( $cptaQuery->have_posts() ){ $cptaQuery->the_post();
            include plugin_dir_path(__DIR__). "popbatee-pagination/templates/items.php";
        } wp_reset_postdata();
    }
    echo '</div>';
    // add pagination navigation
    echo '<div class="row">
          <div class="col-md-12 justify-content-center">';
    if($cptataxname!=""){
        $cpta_args = array('posts_per_page' => -1,'post_type' => $cptaType,$cptataxname=>$cptaCatName,'post_status' => 'publish');
    }else{
        $cpta_args = array('posts_per_page' => -1,'post_type' => $cptaType,'post_status' => 'publish');
    }
    $cpta_Query = new WP_Query( $cpta_args );
    $cpta_Count = count($cpta_Query->posts);
    $cpta_Paginationlist = ceil($cpta_Count/$cptaLimit);
    $last = ceil( $cpta_Paginationlist );

    $adjacents = "2";
    $setPagination = "";
    if( $cpta_Paginationlist > 0 ){

        $setPagination .="<ul class='list-cptapagination pagination justify-content-center'>";
        //$setPagination .="<li class='pagitext'><a href='javascript:void(0);' onclick='javascript:cptaajaxPagination(1,$cptaLimit)'>Prev</a></li>";

        if ( $cpta_Paginationlist < 7 + ($adjacents * 2) ){

            for( $cpta=1; $cpta<=$cpta_Paginationlist; $cpta++){

                if( $cpta ==  0 || $cpta ==  1 ){ $active="active"; }else{ $active=""; }
                $setPagination .="<li class='page-item ".$active."'><a href='javascript:void(0);' id='post' class='page-link $active' data-posttype='$cptaType' data-taxname='$cptataxname' data-cattype='$cptaCatName' onclick='cptaajaxPagination($cpta,$cptaLimit);'>$cpta</a></li>";

            }

        } else if ( $cpta_Paginationlist > 5 + ($adjacents * 2) ){

            for( $cpta=1; $cpta <= 4 + ($adjacents * 2); $cpta++){
                if( $cpta ==  0 || $cpta ==  1 ){ $active="active"; }else{ $active=""; }
                $setPagination .="<li class='page-item " .$active."'><a href='javascript:void(0);' id='post' class='page-link $active' data-posttype='$cptaType' data-taxname='$cptataxname' data-cattype='$cptaCatName' onclick='cptaajaxPagination($cpta,$cptaLimit);'>$cpta</a></li>";
            }
            $setPagination .="<li class='pagitext dots'>...</li>";
            $setPagination .="<li class='pagitext page-item ".$active."'><a href='javascript:void(0);' class='page-link' onclick='javascript:cptaajaxPagination($last,$cptaLimit)'>".$last."</a></li>";

        } else {

            for( $cpta=1; $cpta<=$cpta_Paginationlist; $cpta++){
                if( $cpta ==  0 || $cpta ==  1 ){ $active="active"; }else{ $active=""; }
                $setPagination .="<li class='page-item ".$active."'><a href='javascript:void(0);' id='post' class='page-link $active' data-posttype='$cptaType' data-taxname='$cptataxname' data-cattype='$cptaCatName' onclick='cptaajaxPagination($cpta,$cptaLimit);'>$cpta</a></li>";
            }

        }
        //$setPagination .="<li class='pagitext page-item'><a href='javascript:void(0);' onclick='javascript:cptaajaxPagination(2,$cptaLimit)'>Next</a></li>";
        $setPagination .="</ul>";
    }
    echo $setPagination;
    echo '</div></div>';

    echo '</div>';

}

add_shortcode( 'popbateepagination', 'popbatee_pagination_default' );
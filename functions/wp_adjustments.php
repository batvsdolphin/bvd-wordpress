<?php
/* ====================================================
	Add thumbnail (featured image) functionality
==================================================== */

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
}


/* ====================================================
	Add custom menu functionality
==================================================== */

function register_my_menus() {
	register_nav_menus(
	array(
		'mainmenu-header' => __( 'Header Menu' ),
		'mainmenu-footer' => __( 'Footer Menu' )
		));
	}
add_action( 'init', 'register_my_menus' );



/* ====================================================
	Remove WP's Default Gallery Styles
==================================================== */

    add_filter( 'use_default_gallery_style', '__return_false' );

/* ====================================================
	Add pagination in the footer of the blog pages.
	credit : http://www.kriesi.at/archives/how-to-build-a-wordpress-post-pagination-without-plugin
==================================================== */

function kriesi_pagination($range)
{
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>LAST &raquo;</a>";
         echo "</div>\n";
     }
}

?>

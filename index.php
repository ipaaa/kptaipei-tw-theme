<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package landscape
 */

get_header("home"); ?>

		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ 
					$post_ind = -1;
				?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						$post_ind ++;
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format()  );
					?>

				<?php endwhile; ?>


			<?php else : ?>

				<?php get_template_part( 'no-results', 'index' ); ?>

			<?php endif; ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

	 <?php landscape_content_nav( 'nav-below' ); ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>


<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.masonry.min.js" type="text/javascript"></script>
<script>
(function($){
	var $container = jQuery('.site-content');

	$container.imagesLoaded(function(){
		var msnry = new Masonry( $container[0], {
		  // options
		//  columnWidth: 200,
		  itemSelector: '.post-item'
		});
	   jQuery(".post-entry").each(function(){
	     if($(this).css("left") =="500px"){
	       $(this).css("margin-left","40px");
	     }
	   });		
	    $("#content").append("<div class='line'></div>");
	    $("#content .line").height($("#content").height());
	   
	})

     $("#masthead .more a").click(function(){
        $('html,body').animate({
            scrollTop: $("#main").offset().top
        }, 1000);
        //$(document).scrollTop($("#main").offset().top);
	return false;
     });
})(jQuery);
</script>



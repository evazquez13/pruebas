<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<h1>ok</h1>

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

?>
<h1>dentro del ciclo</h1>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading-<?php the_ID(); ?>">
      <h4 class="panel-title">
        <a  class="accordion-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php the_ID(); ?>" aria-expanded="true" aria-controls="collapse-<?php the_ID(); ?>">
          <li class="liPreFAQS"><?php echo the_title(); ?></li>
        </a>
      </h4>
    </div>
    <div id="collapse-<?php the_ID(); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-<?php the_ID(); ?>">
      <div class="panel-body">
        <?php echo the_content(); ?>
<div>
	<p style="text-align: right;">Comparte esta respuesta:
        <a target="_BLANK" href="https://www.facebook.com/bbvabancomerseguros/"><img style="display:inline; padding:5px;" src="http://ec2-52-49-166-51.eu-west-1.compute.amazonaws.com/wp-content/uploads/2016/11/FB.png" alt=""></a>
        <a target="_BLANK" href="https://www.youtube.com/user/segurosbbvabancomer"><img style="display:inline; padding:5px;" src="http://ec2-52-49-166-51.eu-west-1.compute.amazonaws.com/wp-content/uploads/2016/11/GP.png" alt=""></a>
        <a target="_BLANK" href="https://twitter.com/segurosbancomer"><img style="display:inline; padding:5px;" src="http://ec2-52-49-166-51.eu-west-1.compute.amazonaws.com/wp-content/uploads/2016/11/TW.png" alt=""></a></p>
</div>
      </div>
    </div>
<?php
			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
				'next_text'          => __( 'Next page', 'twentyfifteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer(); ?>

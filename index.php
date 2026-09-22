<?php defined( 'ABSPATH' ) || exit; get_header(); ?>
<main id="main" class="shell section content-page">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article <?php post_class(); ?>><?php if ( is_singular() ) : ?><h1><?php the_title(); ?></h1><?php the_content(); wp_link_pages(); else : ?><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php the_excerpt(); endif; ?></article>
<?php endwhile; the_posts_pagination(); else : ?><h1><?php esc_html_e( 'Nothing here yet.', 'iamgsbala' ); ?></h1><p><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Return home', 'iamgsbala' ); ?></a></p><?php endif; ?>
</main><?php get_footer(); ?>

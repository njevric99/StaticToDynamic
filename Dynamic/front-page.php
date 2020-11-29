<?php get_header(); ?>

	<?php 
	
	if( have_posts() ):
		
		while( have_posts() ): the_post(); ?>
		<div class="logo">
           <img src="<?php echo get_field('logo')['url']; ?>" alt="logo">
        </div>
        <section class="first-part">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"><h1><?php the_title(); ?></h1></div>
                    <div class="col-md-12 info"><p><?php the_content(); ?></p></div>
                    <div class="col-lg-12 button">
                        <?php $link = get_field('button');
                        if( $link ): ?>
                        <button type="button" class="btn">
                            <div class="button-wraper">
                                <a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
                                <img class="small-icon" src="<?php echo get_template_directory_uri(); ?>/dist/img/image.svg">
                            </div>                           
                        </button>
                        <?php endif; ?>
                    </div>
            </div>
                </div>
            </div>
        </section>
		<?php endwhile;
	endif;		
	?>



<div class="projects"> 
<h1><?php echo get_field('projecet-title'); ?></h1>
        <div class="row">	
                <?php 
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = array(
                            'post_type'=>'project', 
                            'posts_per_page' => 3,
                            'paged' => $paged,
                        );
                    $loop = new WP_Query( $args );
                        if ( $loop->have_posts() ) {
                             while ( $loop->have_posts() ) : $loop->the_post();?>
                                <?php get_template_part('dist/temp/content', 'archive'); ?>
                            <?php endwhile;
                                $total_pages = $loop->max_num_pages;
                            if ($total_pages > 1){
                                $current_page = max(1, get_query_var('paged'));
                            }    
                        }
                    wp_reset_postdata();?>
        </div>
</div>

<footer>
        <div class="container">
            <div class="row">
                <div class="address">
                    <div class="col-md-12"><h5><?php the_field('namecompany'); ?></h5></div>
                    <div class="col-md-12"><p><?php the_field('address'); ?></p></div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="copyright">
                <p><?php the_field('copyright'); ?></p>
            </div>
        </div>    
</footer>

<?php get_footer(); ?>
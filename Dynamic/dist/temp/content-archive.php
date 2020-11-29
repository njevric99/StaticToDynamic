<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="project-holder">
			<div class="row">
                        <?php if( has_post_thumbnail() ): ?>
                            <div class="col-md-12 img">
                                <div class="thumbnail">
									<?php the_post_thumbnail('project-post-thumbnail');  ?>
									<h3><?php the_title(); ?></h3>
								</div>
							</div>
                            <div class="col-md-12 info">
                            	<h5>CURRENT STATUS : <?php the_field('current_status'); ?></h5>
							</div>
							<div class="update-holder">
									<?php
											$connection = get_field('connection');
											if( $connection ): ?>
												
												<?php foreach( $connection as $post ): 
													setup_postdata($post);?>
													<?php if( has_post_thumbnail() ): ?>
													<?php get_template_part('dist/temp/content', 'update'); ?>
													<?php else: ?>
													<?php get_template_part('dist/temp/content', 'update-no-img'); ?>
													<?php endif; ?>
												<?php endforeach; ?>
												
												<?php 
												
												wp_reset_postdata(); ?>
											<?php endif; ?>
									</div>
                       		 </div>	
						<?php else: ?>	
							<div class="col-md-12">
                                <h5>CURRENT STATUS:<?php the_field('current_status'); ?></h5>
							</div>
							<div class="update-holder">
									<?php
											$connection = get_field('connection');
											if( $connection ): ?>
												
												<?php foreach( $connection as $post ): ?>
													
														<?php get_template_part('dist/temp/content', 'update-no-img'); ?>7
													</div>
												<?php endforeach; ?>
												</div>
												<?php 
												// Reset the global post object so that the rest of the page works correctly.
												wp_reset_postdata(); ?>
											<?php endif; ?>
							</div>
                       		 </div>	
                            </div>
						<?php endif; ?>
			</div>
		</div>
	</div>
</article>
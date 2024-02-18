<?php 
	

?>
<section class="heroBanner">
    <?php if( have_rows('banner_sildes') ): ?>
    <div class="sslider">
    <?php while( have_rows('banner_sildes') ): the_row(); 
    	$background_type = get_sub_field('background_type');
    	$bg_color = get_sub_field('bg_color');
    	$video = get_sub_field('video');
    	$video_webm = get_sub_field('video_webm');

    	$description = get_sub_field('description');
    	
    ?>
    	<div class="sslide hasBg <?php echo $background_type; ?>" style="">
    		<?php if( $background_type == 'video'): ?>
    			<div class="figWrap bgInst">

    			</div>
    		<?php elseif ($background_type == 'image'): ?>
    			<div class="figWrap bgInst">
    				
    			</div>
    		<?php endif; ?>

    		<div class="wrapper">
    		<div class="cont z2">
    		<?php if( have_rows('buttons') ): ?>
    			<?php while( have_rows('buttons') ): the_row(); 
    				$link = get_sub_field('link');
    				$link ? create_acf_link($link) : ''; ?>
    			<?php endwhile; ?>
    		<?php endif; ?>
    		</div>
    		</div>

    	</div>
    	<?php endwhile; ?>
	</div>
  <?php endif; ?>  
</section>
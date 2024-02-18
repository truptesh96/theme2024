<?php if ( post_password_required() ): ?>
	<section class="passProtected">
		<div class="wrapper">
		<h2 class="h2">This content is password protected.</h2>
    	<p>To access the page please enter the password below:</p>
    	<?php echo eveal_password_form(); ?>
	</section>

<?php
	elseif( have_rows('flexible_content') ):
		while(have_rows('flexible_content')): the_row();
			get_sub_field('block_visibility') != 'hide' ? get_template_part( 'template-parts/blocks/flex', get_row_layout() ) : '';
		endwhile;
	endif;
 ?>
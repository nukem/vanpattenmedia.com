<?php get_template_part('loop', 'page'); ?>

<?php
	$my_args = array(
		'post_parent'	=>	10,
		'post_type'		=>	'page',
		'orderby'		=>	'menu_order',
		'order'			=>	'ASC'
	);
	vpm_wp_query_slider($my_args, 'top');
?>
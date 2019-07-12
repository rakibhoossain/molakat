<?php

require get_template_directory() . '/inc/widgets/class-widget-magazil-posts-list-sidebar.php';

function magazil_companion_recent_posts(){
	
	register_widget('Widget_Magazil_Posts_List_Sidebar');					
}
add_action( 'widgets_init', 'magazil_companion_recent_posts' );


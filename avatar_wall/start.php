<?php
/**
 * Avatar Wall
 *
 * @package avatar_wall
 * @author ColdTrick IT Solutions
 * @copyright Coldtrick IT Solutions 2009-2014
 * @link http://www.coldtrick.com/
 *
 * for Elgg 1.8 by iionly (iionly@gmx.de)
 */

elgg_register_event_handler('init', 'system', 'avatar_wall_init');

function avatar_wall_init() {

	// Register a page handler, so we can have nice URLs
	elgg_register_page_handler('avatar_wall', 'avatar_wall_page_handler');

	// Extend system CSS with our own styles
	elgg_extend_view('css/elgg','avatar_wall/css');

	elgg_register_menu_item('site', array('name' => elgg_echo('avatar_wall:shorttitle'),
		'text' => elgg_echo('avatar_wall:shorttitle'),
		'href' => elgg_get_site_url() . 'avatar_wall'
	));
}

function avatar_wall_page_handler($page) {

	elgg_push_breadcrumb(elgg_echo('avatar_wall:title'));

	$title = elgg_echo('avatar_wall:title');

	$area = elgg_view('avatar_wall/wall');

	// Format page
	$body = elgg_view('page/layouts/one_column', array('content' => $area, 'title' => $title));

	// Draw it
	echo elgg_view_page(elgg_echo('avatar_wall:title'), $body);

	return true;
}

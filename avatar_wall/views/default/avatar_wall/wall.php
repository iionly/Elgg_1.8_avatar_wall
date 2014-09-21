<?php

$tab = get_input('tab') ? get_input('tab') : 'today';

$params = array(
	'tabs' => array(
		array('title' => elgg_echo('avatar_wall:today'), 'url' => "$url" . '?tab=today', 'selected' => ($tab == 'today')),
		array('title' => elgg_echo('avatar_wall:week'), 'url' => "$url" . '?tab=week', 'selected' => ($tab == 'week')),
		array('title' => elgg_echo('avatar_wall:all'), 'url' => "$url" . '?tab=all', 'selected' => ($tab == 'all')),
));

echo elgg_view('navigation/tabs', $params);

switch($tab) {
	case 'today':
		echo elgg_view("avatar_wall/today");
		break;
	case 'week':
		echo elgg_view("avatar_wall/week");
		break;
	case 'all':
		echo elgg_view("avatar_wall/all");
		break;
	default:
		echo elgg_view("avatar_wall/today");
		break;
}

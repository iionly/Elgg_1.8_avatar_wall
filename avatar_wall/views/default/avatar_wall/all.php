<?php

$users_max = elgg_get_plugin_setting("maxIcons", "avatar_wall");
if(!$users_max) {
	$users_max = 300;
}

$onlyWithAvatar = elgg_get_plugin_setting("onlyWithAvatar", "avatar_wall");
if(empty($onlyWithAvatar) || $onlyWithAvatar == "no") {
	$users = elgg_get_entities(array('type' => 'user', 'limit' => $users_max));
} else {
	$users = elgg_get_entities_from_metadata(array(
		'metadata_names' => 'icontime',
		'types' => 'user',
		'limit' => $users_max,
		'full_view' => false,
		'pagination' => false
	));
}
$wallIconSize = elgg_get_plugin_setting("wallIconSize", "avatar_wall");
if(!$wallIconSize) {
	$wallIconSize = "small";
}
shuffle($users);

?>
<div align='center'>
<?php
foreach($users as $user) {
	echo "<a href='" . $user->getURL() . "'><img class='wall_icons' alt='" . $user->name . "' src='". $user->getIconURL($wallIconSize) . "'><a/>";
}
?>
</div>

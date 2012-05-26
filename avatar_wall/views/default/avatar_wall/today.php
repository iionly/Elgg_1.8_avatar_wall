<?php

    $users_max = elgg_get_plugin_setting("maxIcons", "avatar_wall");
    if(!$users_max) {
        $users_max = 300;
    }

    $onlyWithAvatar = elgg_get_plugin_setting("onlyWithAvatar", "avatar_wall");
    if(empty($onlyWithAvatar) || $onlyWithAvatar == "no") {
        $users = find_active_users(86400, $users_max, 0, false);
    } else {
        $db_prefix = elgg_get_config('dbprefix');
        $time = time() - 86400;
        $users = elgg_get_entities_from_metadata(array('metadata_names' => 'icontime',
                                                       'types' => 'user',
                                                       'limit' => $users_max,
                                                       'offset' => 0,
                                                       'joins' => array("join {$db_prefix}users_entity u on e.guid = u.guid"),
                                                       'wheres' => array("u.last_action >= {$time}"),
                                                       'order_by' => "u.last_action desc",
                                                       'full_view' => false,
                                                       'pagination' => false));
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

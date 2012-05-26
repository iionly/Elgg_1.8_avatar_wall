<?php
/**
 * Avatar Wall - Admin settings
 *
 * @package avatar_wall
 * @author ColdTrick IT Solutions
 * @copyright Coldtrick IT Solutions 2009
 * @link http://www.coldtrick.com/
 *
 * for Elgg 1.8 by iionly (iionly@gmx.de)
*/
?>

<p>
    <?php echo elgg_echo("avatar_wall:settings:onlywithavatar");?>
    <select name="params[onlyWithAvatar]">
        <option value="yes" <?php if ($vars['entity']->onlyWithAvatar == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
        <option value="no" <?php if ($vars['entity']->onlyWithAvatar == 'no' || empty($vars['entity']->onlyWithAvatar)) echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
    </select>
    <br /><br />

    <?php echo elgg_echo("avatar_wall:settings:iconsize");?>
    <select name="params[wallIconSize]">
        <option value="tiny" <?php if ($vars['entity']->wallIconSize == 'tiny') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('avatar_wall:settings:tiny'); ?></option>
        <option value="small" <?php if ($vars['entity']->wallIconSize == 'small' || empty($vars['entity']->wallIconSize)) echo " selected=\"yes\" "; ?>><?php echo elgg_echo('avatar_wall:settings:small'); ?></option>
    </select>
    <br /><br />

    <?php echo elgg_echo("avatar_wall:settings:maxicons"); ?><br />
    <input type="text" name="params[maxIcons]" value="<?php if(!empty($vars['entity']->maxIcons)){ echo $vars['entity']->maxIcons; } else { echo "300"; }?>"/>
</p>

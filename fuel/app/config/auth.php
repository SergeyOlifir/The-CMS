<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.5
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2013 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * NOTICE:
 *
 * If you need to make modifications to the default configuration, copy
 * this file to your app/config folder, and make them in there.
 *
 * This will allow you to upgrade fuel without losing your custom config.
 */

return array(
	'driver' => 'SimpleAuth',
	'verify_multiple_logins' => false,
	'salt' => 'werUvxcd',
	'groups' => array(
		  -1   => array('name' => 'Banned', 'roles' => array('banned')),
		  0    => array('name' => 'Guests', 'roles' => array()),
		  1    => array('name' => 'Users', 'roles' => array('user')),
		  50   => array('name' => 'Moderators', 'roles' => array('user', 'moderator')),
		  100  => array('name' => 'Administrators', 'roles' => array('user', 'moderator', 'admin')),
	),
	
	'roles' => array(
		'user'  => array('comments' => array('create', 'read')),
		'moderator'  => array('comments' => array('update', 'delete')),
		'#'  => array('website' => array('read')),
		'banned' => false,
		'super' => true,
	),
);

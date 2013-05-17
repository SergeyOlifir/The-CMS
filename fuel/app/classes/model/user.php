<?php

use Orm\Model;

class Model_User extends Model {
    protected static $_properties = array(
	'id',
	'username',
	'password',
	'group',
	'email',
	'last_login',
	'login_hash',
	'profile_fields',
	'created_at'
    );
}

?>

<?php 

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
	//
}

/***************************************
To fix the issue with the api middleware
File: EntrustPermission.php
****************************************

if ($this->auth->guest() || !$request->user()->can(explode('|', $permissions))) {
	return redirect('/home');
}

*/
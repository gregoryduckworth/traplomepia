<?php 

namespace App\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'description',
    ];
}


/***************************
 Error on deletion of Role
 File: EntrustRoleTrait.php
****************************

Replace

Line 46:  ... Config::get('auth.model') ...

with

Line 46: ... Config::get('auth.providers.users.model') ...

*/

/***************************
 Speed up Cache 
 File: EntrustRoleTrait.php
 File: EntrustUserTrait.php
****************************

Update Line 21/22: 

Config::get('cache.ttl')

to 

Config::get('cache.ttl', 60)

*/

/*******************************
Fix for blade directives
File: EntrustServiceProvider.php
********************************

\Blade::directive('role', function($expression) {
    return "<?php if (\\Entrust::hasRole({$expression})) : ?>";
});

\Blade::directive('endrole', function($expression) {
    return "<?php endif; // Entrust::hasRole ?>";
});

// Call to Entrust::can
\Blade::directive('permission', function($expression) {
    return "<?php if (\\Entrust::can({$expression})) : ?>";
});

\Blade::directive('endpermission', function($expression) {
    return "<?php endif; // Entrust::can ?>";
});

// Call to Entrust::ability
\Blade::directive('ability', function($expression) {
    return "<?php if (\\Entrust::ability({$expression})) : ?>";
});

\Blade::directive('endability', function($expression) {
    return "<?php endif; // Entrust::ability ?>";
});

*/
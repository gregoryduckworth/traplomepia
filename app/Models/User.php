<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait, SoftDeletes, Notifiable;

    /**
     * Remove conflicts between the Traits
     */
    public static function boot()
    {
        parent::boot();

        // When the model is created, ensure we automatically
        // generate the following
        static::creating(function ($model) {
            $model->api_token = str_random(60);
        });
    }

    /**
     * Required to ensure we restore in the correct way
     */
    public function restore()
    {
        $this->sfRestore();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'first_name', 'last_name', 'email', 'dob', 'password', 'api_token', 'profile_picture',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /*protected $hidden = [
    'api_token', 'password', 'remember_token',
    ];*/

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Return the first name and last name in an easy way
     *
     * @return String
     */
    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Ensure that we always encrypt the password
     *
     * @param String
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * Generate a thumbnail for the user if they have not uploaded
     * a profile picture
     *
     * @return string
     */
    public function getPictureAttribute()
    {
        if ($this->profile_picture == null) {
            return '//placeholdit.imgix.net/~text?txtsize=30&amp;txt=' . $this->name . '&amp;w=180&amp;h=180';
        }
        return $this->profile_picture;
    }
}

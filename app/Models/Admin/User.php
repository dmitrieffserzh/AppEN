<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'nickname', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    // RELATIONS
	public function getProfile() {
		return $this->hasOne( Profile::class );
	}

	public function getNews() {
		return $this->hasMany( News::class );
	}


}

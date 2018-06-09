<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class News extends Model {

	public function getAuthor() {
		return $this->belongsTo(User::class, 'user_id');
	}

}

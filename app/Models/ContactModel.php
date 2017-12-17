<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
	protected $table = "contact";

	protected $fillable = ["name","email","message","seen"];

}

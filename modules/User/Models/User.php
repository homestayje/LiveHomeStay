<?php
namespace Modules\User\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends \App\User
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];

}

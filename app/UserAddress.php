<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
  protected $table = 'user_address';

  protected $fillable = ['name','email','company','city','address'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    use HasFactory;
    protected $fillable = [
      'name',
      'Town_id'
 ];

  public function User () 
  {
    return $this->hasMany(User::class,'Town_id', 'id');
  } 

}

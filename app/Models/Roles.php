<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'Roles_id'
   ];

    public function User()
    {
        return $this->hasMany(User::class, 'Roles_id', 'id');
    }
}

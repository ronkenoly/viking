<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCounty extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'SubCounty_id'
   ];

    public function User()
    {
        return $this->hasMany(User::class, 'sub_county_id', 'id');
    }
}

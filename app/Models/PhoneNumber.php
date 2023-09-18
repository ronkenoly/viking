<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\PhoneModels;
use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    use HasFactory;
    protected $fillable = [
        'number',
        'PhoneNumber_id'
   ];
    
    public function User ()
    {
        return $this->HasMany(Users::class, 'phoneid_', 'id');
    }
  
}

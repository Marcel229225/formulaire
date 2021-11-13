<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    use HasFactory;

    public $fillable = [
        'no_reference',
        'name',
        'details',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

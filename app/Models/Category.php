<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person;

class Category extends Model
{
    use HasFactory;

    public function persons(){
        return $this->hasMany(Person::class);
    }
}

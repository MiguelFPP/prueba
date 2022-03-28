<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Notifications\Notifiable;

class Person extends Model
{
    use Notifiable;
    use HasFactory;
    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone',
        'addres',
        'country',
        'identification',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

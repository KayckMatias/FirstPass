<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'category_name',
    ];

    protected $hidden = [
        'user_id',
    ];

    public function password()
    {
        return $this->hasMany('App\Models\Password', 'category_id', 'id');
    }
}

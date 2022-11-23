<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Book extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['name','author','description','year','category_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function usersFavourite(){
        return $this->belongsToMany(User::class);
    }

    public function isFavourite(){
        return $this->usersFavourite()->where('user_id', Auth::id())->exists();
    }
}

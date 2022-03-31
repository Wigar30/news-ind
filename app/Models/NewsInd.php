<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsInd extends Model
{
    use HasFactory;

    // public function category() {
    //     return $this->hasMany(Category::class);
    // }

    public function getRouteKeyName()
    {
        return 'id';
    }
    public static $_table = "NewsInd";

    protected $guarded = [];
    protected $table = 'newsind';
    public $timestamps = false;
}

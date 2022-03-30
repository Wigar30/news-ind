<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function newsind()
    {
        return $this->hasMany(NewsInd::class);
    }

    protected $guarded = [];
    protected $table = 'category';
    public $timestamps = false;
}

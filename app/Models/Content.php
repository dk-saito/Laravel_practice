<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    public function types(){
        return $this->belongsTo(Type::class);
    }

    public function categories(){
        return $this->belongsTo(Category::class);
    }

    public function generals(){
        return $this->belongsToMany(General::class);
    }

}

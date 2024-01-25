<?php

namespace App\Models;

use App\Models\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{

    public function jobs(){
       return $this->hasMany(Job::class);
    }
    use HasFactory;
}

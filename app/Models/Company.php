<?php

namespace App\Models;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{

    protected $fillable =[
        'cname','user_id','
        slug','address','phone',
        'website','logo','cover_photo',
        'slogan','description'
    ];
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function getRouteKeyName(){
        return 'slug';
    }
    use HasFactory;
}

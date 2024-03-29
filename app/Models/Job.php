<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{

    protected $fillable =['user_id','company_id',
                        'title','slug',
                        'description','roles',
                        'category_id','position',
                        'address','type',
                        'status','last_date',
                        'number_of_vacany','experience',
                        'gender','salary'];

    public function getRouteKeyName(){
      return 'slug';
}

public function company(){
    return $this->belongsTo(Company::class);
}

public function users(){
    return $this->belongsToMany(User::class)->withTimestamps();
}

public function checkApplication(){
    return DB::table('job_user')
        ->where('user_id',auth()->user()->id)
        ->where('job_id',$this->id)
        ->exists();
}

public function favourite(){
    return $this->belongsToMany(Job::class,'favourites','job_id','user_id')->withTimestamps();
}

public function checkSaved(){
    return DB::table('favourites')->where('user_id',auth()->user()->id)->where('job_id',$this->id)->exists();
}
    use HasFactory;
}

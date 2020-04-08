<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppointmentSchedule extends Model
{

    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $table ='appointment_schedule';

    protected $fillable =[
        'title',
        'date',
        'is_active',
        'slug',
        'user_id','end',
        'schedule_id'
    ];
    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function appointment(){
        return $this->hasOne(Appointment::class,'schedule_id');
    }
}

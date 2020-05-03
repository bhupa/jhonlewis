<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    USE SoftDeletes;
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $table ='content';

    protected $fillable =[
        'title',
        'image',
        'is_active',
        'description',
        'short_description',
        'slug',
        'created_by',
        'menu',
        'parent_id',
        'type'
    ];
    public function author(){
        return $this->belongsTo(User::class,'created_by');
    }
    public function parent()
    {
        return $this->belongsTo('App\Models\Content', 'parent_id')->where('is_active','1')->where('menu','header');
    }

    public function allChild()
    {
        return $this->hasMany('App\Models\Content', 'parent_id')->with('child');
    }

    public function child()
    {
        return $this->hasMany(Content::class, 'parent_id')->where('is_active','1')->where('menu','header');
    }

    public function getCreatedAt()
    {
        return $this->created_at->toFormattedDateString();
    }

    public function getUpdatedAt()
    {
        return $this->updated_at->toFormattedDateString();
    }

    public function getParentTitle()
    {
        return $this->parent ? $this->parent->title : "";
    }
}

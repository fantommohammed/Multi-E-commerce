<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use Translatable;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['translations'];


    protected $translatedAttributes = ['name'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['parent_id', 'is_active', 'slug'];
    /**
     * The attributes that should be hidden for serialization
     *
     * @var array
     */

    protected $hidden = ['translations'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeParent($query)
    {
        return $query -> whereNull('parent_id');
    }
    public function scopeChild($query)
    {
        return $query -> whereNotNull('parent_id');
    }

    public function getActive()
    {
       return $this->is_active==0 ? 'غير مفعل' : "{{__('admin/setting.active')}}";
    }
}
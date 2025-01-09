<?php

namespace App\Models;

use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;

class Brand extends Model
{
    use HasTranslations, Sluggable;
    public $translatable = ['name'];
    protected $fillable = ['name', 'slug', 'logo', 'status'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
        // Relationships
        public function products()
        {
            return $this->hasMany(Product::class , 'brand_id');
        }

        // Scopes
        public function scopeActive($query)
        {
            return $query->where('status' , 1);
        }
        public function scopeInactive($query)
        {
            return $query->where('status' , 0);
        }

        public function getStatus()
        {
            if(Config::get('app.locale') == 'ar'){
                return $this->status == 1 ? 'مفعل' : 'غير مفعل';
            }
            return $this->status == 1 ? 'Active' : 'Inactive';
        }


        // Accessors
        public function getCreatedAtAttribute($value)
        {
            return date('d/m/Y ', strtotime($value));
        }

        public function getLogoAttribute($logo)
        {
            return 'uploads/brands/' . $logo;
        }
 }

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'url',
        'parent_id',
        'position',
        'icon',
    ];

    protected static function booted()
    {
        static::saving(function (Menu $menu) {
            if (empty($menu->slug)) {
                $menu->slug = Str::slug($menu->name);
            }
        });
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('position');
    }

    public function scopeTopLevel($query)
    {
        return $query->whereNull('parent_id')->orderBy('position');
    }

    public function getHrefAttribute()
    {
        if (!empty($this->url)) {
            return $this->url;
        }

        return route('category.show', $this->slug);
    }
}

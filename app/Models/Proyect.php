<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proyect extends Model
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type_proyect',
        'title',
        'image',
        'description',
    ];

     protected $appends = [
        'image_url',
    ];

   
    public function getImageUrlAttribute()
    {
        if ($this->image && Storage::disk('storage')->exists($this->image)) {
            return Storage::disk('storage')->url($this->image);
        }

        return asset('img/boxed-bg.jpg');
    }

    public function scopeId($query, $id)
    {
        if (!is_null($id)) {
            return $query->where('id', '=', $id);
        }

        return $query;
    }
}

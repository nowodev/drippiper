<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }

    public function getThumbnailAttribute()
    {
        if ($this->cover_image) {
            return asset('uploads/product_cover_images/' . $this->cover_image);
        }

        return 'https://placehold.co/600x400@2x.png';
    }
}

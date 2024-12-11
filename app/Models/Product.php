<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    public function category(): BelongsTo 
    {
        return $this->belongsTo(related: Category::class);
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($product) {
            if ($product->photo && Storage::disk('public')->exists($product->photo)) {
                Storage::disk('public')->delete($product->photo);
            }
        });
    }

    public function setPhotoAttribute($value)
    {
        if ($this->photo && Storage::disk('public')->exists($this->photo)) {
            Storage::disk('public')->delete($this->photo);
        }

        $this->attributes['photo'] = $value;
    }

    protected $fillable = [
        'photo',
        'product_name',
        'description',
        'brand',
        'cpu',
        'gpu',
        'memory',
        'storage',
        'stock',
        'price',
        'category_id',
    ];
}

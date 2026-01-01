<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'title',
        'description',
        'price',
        'duration',
        'features',
        'is_active',
        'image',
        'order_count'
    ];

    protected $casts = [
    'price' => 'decimal:2',
    'is_active' => 'boolean',
    'features' => 'array',  // Ini akan auto-decode JSON
    'order_count' => 'integer'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopePopular($query)
    {
        return $query->orderBy('order_count', 'desc');
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function incrementOrderCount()
    {
        $this->increment('order_count');
    }

    // Setter untuk features
    public function setFeaturesAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['features'] = json_encode($value);
        } elseif (is_string($value)) {
            // Jika sudah string JSON, simpan langsung
            $this->attributes['features'] = $value;
        } else {
            $this->attributes['features'] = json_encode([]);
        }
    }

    // Getter untuk features
    public function getFeaturesAttribute($value)
    {
        if (is_array($value)) {
            return $value;
        }
        
        if (is_string($value)) {
            // Hapus quotes luar jika ada
            $value = trim($value, '"');
            $decoded = json_decode($value, true);
            
            return is_array($decoded) ? $decoded : [];
        }
        
        return [];
    }
}
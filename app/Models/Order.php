<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'user_id',
        'service_id',
        'status',
        'problem_description',
        'preferred_date',
        'preferred_time',
        'address',
        'total_price',
        'payment_status',
        'payment_method',
        'admin_notes',
        'completed_at'
    ];

    protected $casts = [
        'total_price' => 'decimal:2',
        'preferred_date' => 'date',
        'completed_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            // Membuat order code otomatis yang unik
            $order->order_code = 'TE' . date('Ymd') . strtoupper(bin2hex(random_bytes(4)));
        });
    }

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // Relasi ke Review
    public function review()
    {
        return $this->hasOne(Review::class, 'order_id');
    }

    // Accessor untuk Badge Status di UI
    public function getStatusBadgeAttribute()
    {
        $badges = [
            'pending'        => 'bg-yellow-100 text-yellow-800',
            'processing'     => 'bg-blue-100 text-blue-800',
            'completed'      => 'bg-green-100 text-green-800',
            'cancelled'      => 'bg-red-100 text-red-800',
            'cancel_pending' => 'bg-orange-100 text-orange-800',
        ];

        return $badges[$this->status] ?? 'bg-gray-100 text-gray-800';
    }

    // Accessor untuk Badge Status Pembayaran
    public function getPaymentStatusBadgeAttribute()
    {
        $badges = [
            'pending' => 'bg-yellow-100 text-yellow-800',
            'paid'    => 'bg-green-100 text-green-800',
            'failed'  => 'bg-red-100 text-red-800',
        ];

        return $badges[$this->payment_status] ?? 'bg-gray-100 text-gray-800';
    }
}
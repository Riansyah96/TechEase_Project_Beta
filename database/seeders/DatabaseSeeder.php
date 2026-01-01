<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Service;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create Admin User
        User::create([
            'name' => 'Admin TechEase',
            'email' => 'admin@techease.id',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'phone' => '+6281234567890',
            'address' => 'Jl. Teknologi No. 123, Jakarta',
            'company' => 'TechEase ID',
            'email_verified_at' => now(),
        ]);

        // Create Sample Customer
        User::create([
            'name' => 'John Doe',
            'email' => 'customer@example.com',
            'password' => Hash::make('password123'),
            'role' => 'customer',
            'phone' => '+628987654321',
            'address' => 'Jl. Contoh No. 456, Bandung',
            'email_verified_at' => now(),
        ]);

        // Create Sample Services
        $services = [
            [
                'category' => 'Troubleshooting',
                'title' => 'Perbaikan Sistem Operasi Error',
                'description' => 'Penanganan komprehensif untuk masalah sistem operasi seperti blue screen, boot loop, error registry, dan performa lambat.',
                'price' => 150000,
                'duration' => '2-3 jam',
                'features' => json_encode([
                    'Diagnosis sistem lengkap',
                    'Perbaikan error sistem',
                    'Optimasi performa',
                    'Backup data penting',
                    'Garansi 7 hari'
                ]),
                'is_active' => true,
                'order_count' => 45,
            ],
            [
                'category' => 'Security',
                'title' => 'Pembersihan Virus & Malware',
                'description' => 'Pembersihan menyeluruh virus, malware, spyware, dan ransomware dari perangkat Anda.',
                'price' => 100000,
                'duration' => '1-2 jam',
                'features' => json_encode([
                    'Scanning lengkap',
                    'Pembersihan malware',
                    'Instalasi antivirus',
                    'Konfigurasi firewall',
                    'Tips pencegahan'
                ]),
                'is_active' => true,
                'order_count' => 78,
            ],
            [
                'category' => 'Hardware',
                'title' => 'Upgrade RAM & SSD',
                'description' => 'Upgrade komponen hardware untuk meningkatkan performa perangkat secara signifikan.',
                'price' => 300000,
                'duration' => '1 jam',
                'features' => json_encode([
                    'Konsultasi kebutuhan',
                    'Pemilihan komponen',
                    'Instalasi profesional',
                    'Testing performa',
                    'Garansi komponen'
                ]),
                'is_active' => true,
                'order_count' => 32,
            ],
            [
                'category' => 'Business',
                'title' => 'Setup Email Bisnis',
                'description' => 'Setup email profesional dengan domain perusahaan menggunakan Google Workspace atau Zoho.',
                'price' => 200000,
                'duration' => '1-2 jam',
                'features' => json_encode([
                    'Setup domain email',
                    'Konfigurasi MX records',
                    'Setup di perangkat',
                    'Training penggunaan',
                    'Support 30 hari'
                ]),
                'is_active' => true,
                'order_count' => 56,
            ],
            [
                'category' => 'Network',
                'title' => 'Setup Jaringan Kantor',
                'description' => 'Setup jaringan WiFi, sharing printer, dan konfigurasi jaringan untuk kantor kecil.',
                'price' => 250000,
                'duration' => '2-3 jam',
                'features' => json_encode([
                    'Survey lokasi',
                    'Setup router/access point',
                    'Konfigurasi sharing',
                    'Testing jaringan',
                    'Dokumentasi jaringan'
                ]),
                'is_active' => true,
                'order_count' => 29,
            ],
            [
                'category' => 'Cloud',
                'title' => 'Backup Cloud Otomatis',
                'description' => 'Setup sistem backup otomatis ke cloud untuk keamanan data penting.',
                'price' => 180000,
                'duration' => '1 jam',
                'features' => json_encode([
                    'Setup software backup',
                    'Konfigurasi jadwal',
                    'Encryption data',
                    'Monitoring backup',
                    'Restore testing'
                ]),
                'is_active' => true,
                'order_count' => 41,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        // Create sample orders
        for ($i = 1; $i <= 10; $i++) {
            Order::create([
                'user_id' => 2, // Customer
                'service_id' => rand(1, 6),
                'status' => ['pending', 'processing', 'completed'][rand(0, 2)],
                'problem_description' => 'Masalah ' . $i . ': ' . ['laptop lambat', 'tidak bisa boot', 'virus', 'network error'][rand(0, 3)],
                'preferred_date' => now()->addDays(rand(1, 30))->format('Y-m-d'),
                'preferred_time' => ['09:00', '10:00', '13:00', '15:00'][rand(0, 3)],
                'address' => 'Jl. Contoh No. ' . $i . ', Jakarta',
                'total_price' => rand(100000, 300000),
                'payment_status' => ['pending', 'paid'][rand(0, 1)],
                'payment_method' => ['cash', 'transfer', 'qris'][rand(0, 2)],
                'created_at' => now()->subDays(rand(1, 60)),
            ]);
        }
    }
}
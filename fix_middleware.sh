#!/bin/bash

echo "=== Fixing Laravel Middleware Issues ==="

# Stop any running server
echo "Stopping existing servers..."
pkill -f "php artisan serve" 2>/dev/null || true
pkill -f "php -S" 2>/dev/null || true
sleep 2

# Fix permissions
echo "Fixing permissions..."
sudo chown -R $(whoami):$(whoami) storage bootstrap/cache 2>/dev/null || true
chmod -R 775 storage bootstrap/cache 2>/dev/null || true
chmod -R 777 storage/framework/sessions storage/framework/cache storage/framework/views 2>/dev/null || true

# 1. Clear semua cache dengan benar (tanpa artisan cache:clear dulu)
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan clear-compiled

# 2. Hapus semua file cache dan session secara manual
echo "Clearing cache files..."
rm -rf bootstrap/cache/* 2>/dev/null || true
rm -rf storage/framework/cache/* 2>/dev/null || true
rm -rf storage/framework/sessions/* 2>/dev/null || true
rm -rf storage/framework/views/* 2>/dev/null || true

# 3. Clear cache dengan artisan setelah file dihapus
php artisan cache:clear 2>/dev/null || echo "Cache clear skipped"

# 4. Regenerate autoload
echo "Regenerating autoload..."
composer dump-autoload -o

# 5. Start server baru
echo ""
echo "Starting new server..."
echo "----------------------------------------"
php artisan serve --host=127.0.0.1 --port=8000

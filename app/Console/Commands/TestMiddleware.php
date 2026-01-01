<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;

class TestMiddleware extends Command
{
    protected $signature = 'middleware:test';
    protected $description = 'Test middleware registration';

    public function handle()
    {
        $router = app('router');
        $middlewares = $router->getMiddleware();
        
        $this->info('=== Middleware Registration Test ===');
        $this->table(['Middleware', 'Class', 'Exists'], [
            [
                'admin',
                \App\Http\Middleware\AdminMiddleware::class,
                class_exists(\App\Http\Middleware\AdminMiddleware::class) ? '✅ Yes' : '❌ No'
            ],
            [
                'customer',
                \App\Http\Middleware\CustomerMiddleware::class,
                class_exists(\App\Http\Middleware\CustomerMiddleware::class) ? '✅ Yes' : '❌ No'
            ]
        ]);
        
        $this->info("\nRegistered Middlewares:");
        foreach ($middlewares as $key => $value) {
            $this->line("  {$key} => {$value}");
        }
        
        return 0;
    }
}
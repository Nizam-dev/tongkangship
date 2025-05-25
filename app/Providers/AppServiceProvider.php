<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
          Blade::directive('formatRupiah', function ($expression) {
            return "Rp <?php
                \$angka = $expression;
                if (\$angka >= 1000000000) {
                    \$nilai = \$angka / 1000000000;
                    echo round(\$nilai, 1) . ' miliar';
                } elseif (\$angka >= 1000000) {
                    \$nilai = \$angka / 1000000;
                    echo round(\$nilai, 1) . ' juta';
                } else {
                    echo number_format(\$angka, 0, ',', '.');
                }
            ?>";
        });
    }
}

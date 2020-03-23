<?php

namespace App\Providers;

use Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('money', function ($amount) {
            return "<?php echo '&euro;' . number_format($amount, 2,',','.'); ?>";
        });

        Blade::directive('date', function ($date) {
            return "<?php echo date('d-m-Y', strtotime($date)); ?>";
        });
    }
}

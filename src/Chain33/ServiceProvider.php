<?php

namespace Jason\Chain33;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{

    /**
     * Notes: 部署
     * @Author: <C.Jason>
     * @Date: 2020/1/14 5:21 下午
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/config.php' => config_path('chain33.php')], 'chain33');
        }
    }

    /**
     * Notes: 注册功能
     * @Author: <C.Jason>
     * @Date: 2020/1/14 5:21 下午
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/config.php', 'chain33');
    }

}

<?php
declare(strict_types=1);

namespace Exewen\ManoMano;

use Exewen\Di\ServiceProvider;
use Exewen\ManoMano\Contract\ManoManoInterface;

class ManoManoProvider extends ServiceProvider
{

    /**
     * 服务注册
     * @return void
     */
    public function register()
    {
        $this->container->singleton(ManoManoInterface::class);
    }

}
<?php
namespace App;

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use App\DependencyInjection\CompilerPass\CollectCommands;

final class AppKernel extends Kernel
{
    protected function build(ContainerBuilder $containerBuilder): void
    {
        $containerBuilder->addCompilerPass(new CollectCommands);
//        $containerBuilder->addCompilerPass(new ;
    }

    /**
     * In more complex app, add bundles here
     */
    public function registerBundles(): array
    {
        return [];
    }

    /**
     * Load all services
     */
    public function registerContainerConfiguration(LoaderInterface $loader): void
    {
        $loader->load(__DIR__ . '/../config/services.yml');
    }
}

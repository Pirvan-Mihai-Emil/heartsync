<?php

namespace ContainerZzadlXp;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDoctoriRepositoryService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Repository\DoctoriRepository' shared autowired service.
     *
     * @return \App\Repository\DoctoriRepository
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['App\\Repository\\DoctoriRepository'] = new \App\Repository\DoctoriRepository(($container->services['doctrine'] ?? self::getDoctrineService($container)));
    }
}

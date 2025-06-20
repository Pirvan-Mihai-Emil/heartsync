<?php

namespace ContainerZzadlXp;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Security_RequestMatcher_JSERJNService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.security.request_matcher.J_sERJN' shared service.
     *
     * @return \Symfony\Component\HttpFoundation\ChainRequestMatcher
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.security.request_matcher.J_sERJN'] = new \Symfony\Component\HttpFoundation\ChainRequestMatcher([($container->privates['.security.request_matcher.yPxnJrQ'] ??= new \Symfony\Component\HttpFoundation\RequestMatcher\PathRequestMatcher('^/api/doctor/login'))]);
    }
}

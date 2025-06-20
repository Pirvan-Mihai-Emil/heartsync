<?php

namespace ContainerFB1eGvM;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Command_DebugFirewallService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'security.command.debug_firewall' shared service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Command\DebugFirewallCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->privates['security.command.debug_firewall'] = $instance = new \Symfony\Bundle\SecurityBundle\Command\DebugFirewallCommand($container->parameters['security.firewalls'], ($container->privates['.service_locator.fY.zF6D'] ?? self::get_ServiceLocator_FY_ZF6DService($container)), ($container->privates['.service_locator.uVkNYqp'] ?? $container->load('get_ServiceLocator_UVkNYqpService')), ['login' => [($container->privates['debug.security.authenticator.json_login.login'] ?? $container->load('getDebug_Security_Authenticator_JsonLogin_LoginService'))], 'api' => [($container->privates['debug.security.authenticator.jwt.api'] ?? $container->load('getDebug_Security_Authenticator_Jwt_ApiService'))]], false);

        $instance->setName('debug:firewall');
        $instance->setDescription('Display information about your security firewall(s)');

        return $instance;
    }
}

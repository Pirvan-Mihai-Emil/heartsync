<?php

namespace ContainerFB1eGvM;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getLexikJwtAuthentication_GenerateKeypairCommandService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'lexik_jwt_authentication.generate_keypair_command' shared service.
     *
     * @return \Lexik\Bundle\JWTAuthenticationBundle\Command\GenerateKeyPairCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->privates['lexik_jwt_authentication.generate_keypair_command'] = $instance = new \Lexik\Bundle\JWTAuthenticationBundle\Command\GenerateKeyPairCommand(($container->privates['filesystem'] ??= new \Symfony\Component\Filesystem\Filesystem()), 'E:\\heartsync/config/jwt/private.pem', 'E:\\heartsync/config/jwt/public.pem', $container->getEnv('JWT_PASSPHRASE'), 'RS256');

        $instance->setName('lexik:jwt:generate-keypair');
        $instance->setDescription('Generate public/private keys for use in your application.');

        return $instance;
    }
}

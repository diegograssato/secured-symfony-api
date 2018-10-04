<?php
/**
 * Created by PhpStorm.
 * User: webby
 * Date: 03/10/2018
 * Time: 3:36 PM
 */

namespace App\Security\User;


use Auth0\JWTAuthBundle\Security\Core\AuthenticationException;
use Auth0\JWTAuthBundle\Security\Core\JWTUserProviderInterface;
use Symfony\Component\Intl\Exception\NotImplementedException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;

class WebServiceUserProvider implements JWTUserProviderInterface
{
    public function loadUserByJWT($jwt)
    {
        $data = ['sub' => $jwt->sub];
        $roles = array();
        $roles[] = 'ROLE_OAUTH_AUTHENTICATED';
        if (isset($jwt->scope)) {
            $scopes = explode(' ', $jwt->scope);

            if (array_search('read:messages', $scopes) !== false) {
                $roles[] = 'ROLE_OAUTH_READER';
            }
        }

        return new WebServiceUser($data, $roles);
    }

    public function getAnonymousUser()
    {
        return new WebServiceAnonymousUser();
    }

    public function loadUserByUsername($username)
    {
        throw new NotImplementedException('method not implemented');
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof WebServiceUser) {
            throw new UnsupportedUserException(
              sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return $class === 'App\Security\User\WebServiceUser';
    }


}
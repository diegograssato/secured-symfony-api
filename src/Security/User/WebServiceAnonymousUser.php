<?php
/**
 * Created by PhpStorm.
 * User: webby
 * Date: 03/10/2018
 * Time: 3:43 PM
 */

namespace App\Security\User;


class WebServiceAnonymousUser extends WebServiceUser
{
    public function __construct()
    {
        parent::__construct(null, array('IS_AUTHENTICATED_ANONYMOUSLY'));
    }

    public function getUsername()
    {
        return null;
    }
}
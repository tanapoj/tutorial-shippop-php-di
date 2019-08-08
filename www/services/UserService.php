<?php

namespace services;

use sys\BaseContext;

class UserService extends BaseContext{

    public function __construct(\database\Database $db, AuthService $auth)
    {
        parent::__construct();

        $db->testConnection();
    }

}
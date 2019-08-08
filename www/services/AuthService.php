<?php

namespace services;

use sys\BaseContext;

class AuthService extends BaseContext{
    
    public function __construct(\database\Database $db)
    {
        parent::__construct();
    }
}
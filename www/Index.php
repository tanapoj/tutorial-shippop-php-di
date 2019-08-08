<?php

use sys\BaseContext;

class Index extends BaseContext {

    public function __construct(\sys\Session $session, \services\UserService $userService)
    {
        parent::__construct();
    }

    public function index(){
        echo "Hello, a whole new World!<br/>";
    }

    //public function test(){
    //    $ses = new \sys\Session();
    //    $ses->get("key", 1, "done");
    //}

}
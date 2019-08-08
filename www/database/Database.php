<?php

namespace database;

use sys\BaseContext;

class Database extends BaseContext{

    private $con1;
    
    /**
     * @Inject("connection-2")
     */
    private $con2;

    public function __construct(Connection $con)
    {
        parent::__construct();
        $this->con1 = $con;
    }

    public function testConnection(){
        $this->con1->connect("123.45.67.89", "root");
        $this->con2->connect("cloud.host", "admin");
    }
}
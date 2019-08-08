<?php

namespace sys;

class DebugContext extends Context{
    public function __construct()
    {
        parent::__construct();
        $this->log();
    }

    protected function log(){
        //$className = __CLASS__;
        $className = get_called_class();
        echo "<pre>&gt; create <b>$className</b></pre><br/>";
    }

    public function __call($method, $params){
        // if(method_exists($this, $method)){
        //     return $this->{$method}(...$params);
        // }
        $className = get_called_class();
        $params = substr(json_encode($params), 1, -1);
        echo "<pre>&gt; &gt; call $className::<b>$method</b>($params)</pre><br/>";
    }
}
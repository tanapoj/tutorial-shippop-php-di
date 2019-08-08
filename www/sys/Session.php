<?php

namespace sys;

use sys\BaseContext;

class Session extends BaseContext{
    
    /**
     * @Inject({"sys.session.key"})
     */
    public function __construct(string $key)
    {
        parent::__construct();
        $this->setSessionKey($key);
    }

}
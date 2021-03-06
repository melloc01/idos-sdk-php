<?php

namespace idOS\Auth;

use Test\Unit\AbstractUnit;

class NoneTest extends AbstractUnit {
    /**
     * $auth object instantiates the None Class.
     */
    protected $auth;

    protected function setUp() {
        parent::setUp();

        $this->auth = new \idOS\Auth\None();
    }

    public function testGetToken() {
           $this->assertInternalType('string', $this->auth->getToken());
           $this->assertEmpty($this->auth->getToken());
    }
}

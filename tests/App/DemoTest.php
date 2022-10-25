<?php

namespace Test\App;

use App\App\Demo;
use App\Service\AppLogger;
use App\Util\HttpRequest;
use PHPUnit\Framework\TestCase;


class DemoTest extends TestCase
{

    public function test_foo()
    {
    }

    public function test_get_user_info()
    {
     
        $logger = new AppLogger('log4php');
        $httpclient =new HttpRequest;
        $demo = new Demo($logger,$httpclient);
        $resp = $demo->get_user_info();
        $expected =['id'=>1,'username'=>'hello world'];
        $this->assertEquals($expected['id'], $resp['id'],'error: id');
        $this->assertEquals($expected['username'], $resp['username'],'error: username');
      
    }   
    
    
}

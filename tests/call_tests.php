<?php

class bottledCallTests extends PHPUnit_Framework_TestCase
{

   public static function setUpBeforeClass()
   {
      
   }

   /**
    * 
    */
   public function test_call()
   {
      $storageFactory   = include('../base/storage_factory.php');
      $callFactory      = include('../base/call_factory.php');

      $storage          = $storageFactory();
      $storageCall      = $callFactory($storage);
      $storage('test_key/function1', function(){return 'hello world';} );
      $this->assertEquals('hello world', $storageCall('test_key/function1') );
   }

}


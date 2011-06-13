<?php

class bottledStorageTests extends PHPUnit_Framework_TestCase
{

   public static function setUpBeforeClass()
   {
      
   }

   /**
    * 
    */
   public function test_base_assigning()
   {
      $storage_factory = require('../base/storage_factory.php');
      $storage         = $storage_factory();
      
      $this->assertNull( $storage('test_key') );
      
      $storage('test_key', 'testvalue');
      
      $this->assertEquals('testvalue', $storage('test_key') );
   }

   /**
    * 
    */
   public function test_array_assigning()
   {
      $storage_factory = require('../base/storage_factory.php');
      $storage         = $storage_factory();
      
      $storage('test_key', array(
         'test1' => 'testvalue1',
         'test2' => 'testvalue2'
      ));
      
      
      $this->assertEquals('testvalue1', $storage('test_key/test1') );
      $this->assertEquals('testvalue2', $storage('test_key/test2') );
   }

   /**
    * 
    */
   public function test_array_retrive()
   {
      $storage_factory = require('../base/storage_factory.php');
      $storage         = $storage_factory();
      
      $storage('test_key/test1','testvalue1');
      $storage('test_key/test2','testvalue2');
      $this->assertTrue(
         is_array( $storage('test_key') )
      );
   }

}


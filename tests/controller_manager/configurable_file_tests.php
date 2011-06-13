<?php

class bottledControllerManagerConfigurableFileTests extends PHPUnit_Framework_TestCase
{

   public static function setUpBeforeClass()
   {
      
   }
   
   private function get_basic_config()
   {
      return array(
         'basepath'   => __DIR__ . '/configurable_file',
         'controller' => array(
            'test1'  => array(
               'path'   => 'test1.php',
               'config' => null,
            ),  
         ),
      );
      
   }

   /**
    * 
    */
   public function test_simple_execution()
   {
      $configuration = $this->get_basic_config();
      
      $controllerManager = include('../controller_manager/configurable_file.php');
      $_SERVER['REQUEST_URI'] = 'test1';
      $this->assertEquals('end', $controllerManager( $configuration ) );
      
   }

   /**
    * 
    */
   public function test_with_alias()
   {
      $configuration = $this->get_basic_config();
      $configuration['controller']['alias'] = array(
         'alias_of' => 'test1',
      );
      
      $controllerManager = include('../controller_manager/configurable_file.php');
      $_SERVER['REQUEST_URI'] = 'alias';
      $this->assertEquals('end', $controllerManager( $configuration ) );
      
   }

}


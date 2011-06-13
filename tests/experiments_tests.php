<?php

class bottledExperimentsTests extends PHPUnit_Framework_TestCase
{

   public static function setUpBeforeClass()
   {
      
   }

   /**
    * the static var is only referenced in this function, not in any way to the variable which contains the function
    */
   public function test_experiment_1()
   {

      // create two identical closures
      $test = function(){
            static $test = 1;
            return $test++;
      };
      $test1 = function(){
            static $test = 1;
            return $test++;
      };

      // test, if the static var inside is incremented independed from the other closure
      $this->assertEquals('1234',
         $test() . $test() . $test() . $test()
      );

      $this->assertEquals('1234',
         $test1() . $test1() . $test1() . $test1()
      );

      // overwrite the closure with a identical one
      $test = function(){
            static $test = 1;
            return $test++;
      };

      // the static var should act like its a new created closure
      $this->assertEquals('1234',
         $test() . $test() . $test() . $test()
      );
      
      // assign the closure to another var
      $test1 = $test;

      // the state of the static var should be hold, as the closure-var is always only a reference
      $this->assertEquals('5678',
         $test1() . $test1() . $test1() . $test1()
      );
   }

}


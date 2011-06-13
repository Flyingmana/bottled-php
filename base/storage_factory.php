<?php
/**
 * we dont really need this as factory, but it fits better to the call factory
 */
return function(){
   $storage = function( $name, $value=null ){
       static $store = array();

       $keys = \explode('/', $name);
       $result = &$store;
       foreach ($keys as $key){
           $result = &$result[$key];
       }
       if($value!=null) $result = $value;
       return $result;
   };
   return $storage;
};
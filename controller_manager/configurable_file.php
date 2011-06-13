<?php
/**
 * this controller manager use a configurations array for "url" - "controller location" linking.
 * it directly use the $_SERVER variables to grab needed information.
 * 
 * @param array $configuration configurations array for "url" - "controller location" linking and for add additional variables on per controller base
 * @param mixed $parameter and aditional parameter to add variables to controller scope
 * @return mixed the result of the executed controller
 *  
 */
return function( $configuration, $parameter = null){
   $_SERVER['REQUEST_URI'];
   $length = strpos( $_SERVER['REQUEST_URI'], '?');
   $controller_name = ($length > 0) ? substr( $_SERVER['REQUEST_URI'], 0, $length ) : $_SERVER['REQUEST_URI'];
   
   controllerStart:
   if( !isset($configuration['controller'][ $controller_name ]) ){
      goto controllerNotFound;
   }
   $controller = $configuration['controller'][ $controller_name ];
   if( isset( $controller['alias_of'] ) ){
      $controller_name = $controller['alias_of'];
      goto controllerStart;
   }
   
   $exec = function($path, $configuration ,$parameter ){
      return require($path);
   };
   
   return $exec(
      $configuration['basepath'] .DIRECTORY_SEPARATOR. $controller['path'],
      $controller['config'],
      $parameter
   );
   
   controllerNotFound:
      
   return 'not found';
};
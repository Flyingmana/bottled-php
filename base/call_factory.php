<?php
/**
 * we need this, for calling methods direct from the storage, without the need to assign them to a var before.
 */
return function($storage){
   return function($path) use ($storage){
      return call_user_func_array( $storage($path), array_slice(func_get_args(), 1) );
   };
};
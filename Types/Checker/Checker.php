<?php

/**
 * 
 */
namespace Vibius\Types\Checker;

use \ArrayObject;

/**
 * 
 */
class Checker implements \Vibius\Types\Checker\CheckerInterface{

	/**
	 * 
	 */
	public function arguments($requirements){

	}

	/**
	 * 
	 */
	public function check($requirements){

		$it = (new ArrayObject($requirements))->getIterator();
		
		while( $it->valid() ){
			$currentArgument = 0;
			
			//check for custom type classes/namespaces
			if( !preg_match('/(\\\)/', $it->key()) ){
				$typeClass = "Vibius\\Types\\".$it->key().'\\'.$it->key();
			}else{
				$typeClass = $it->key();
			}
			
			//get arguments of previous function
			$type = new $typeClass(debug_backtrace()[1]['args'][$currentArgument]);

			//validate by current's type rules, passing options as argument
			$type->validate($it->current());

			$currentArgument++;
			$it->next();
		}
	}
}
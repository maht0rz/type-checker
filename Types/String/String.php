<?php

namespace Vibius\Types\String;

use \Vibius\Types\Type\TypeMismatchException;

class String extends \Vibius\Types\Type\Type{

	public function ruleMustNotBeEmpty(){
		if( !empty($this->content) ) return true;
	}

	public function ruleMustBeString(){
		if( is_string($this->content) ) return true;
	}

	public function ruleCanHaveMin($options){
		
		if( empty($options['min']) ) return true;

		if( !is_numeric($options['min']) ){
			throw new TypeMismatchException(
				"Minimum for string must have numeric value"
				);
		}else if( strlen($this->content) < $options['min'] ){
			throw new TypeMismatchException(
				"Type rule has not been satisfied. String must be at least ".$options['min']." characters long. Currently it is ".strlen($this->content)." characters long."
				);
		}

		return true;
	}

	public function ruleCanHaveMax($options){
		
		if( empty($options['max']) ) return true;

		if( !is_numeric($options['max']) ){
			throw new TypeMismatchException(
				"Minimum for string must have numeric value"
				);
		}else if( strlen($this->content) > $options['max'] ){
			throw new TypeMismatchException(
				"Type rule has not been satisfied. String must be maximaly ".$options['max']." characters long. Currently it is ".strlen($this->content)." characters long."
				);
		}

		return true;
	}
}
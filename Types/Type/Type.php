<?php

namespace Vibius\Types\Type;

use \ArrayObject;

abstract class Type{

	public function __construct($content){
		$this->content = $content;
	}

	private function getRules(){
		return array_filter(get_class_methods($this), function($item){
			if( preg_match('/(rule)/', $item) ) return $item;
		});
	}

	public function validate($options){
		$it = (new ArrayObject($this->getRules()))->getIterator();

		while( $it->valid() ){
			if( !$this->{$it->current()}($options) );
			$it->next();
		}
	}
}
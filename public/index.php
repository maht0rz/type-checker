<?php

require('../bootstrap.php');



class Test{

	public function __construct(){

		$this->checker = new Vibius\Types\Checker\Checker();
	}

	public function sayHi($name){
		
		$this->checker->check([
			'String' => [
				'min' => 2
			]]);
		
		echo "Hi, $name";		
	}
}

(new Test)->sayHi('John');
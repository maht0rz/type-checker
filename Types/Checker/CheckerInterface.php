<?php

/**
 * 
 */
namespace Vibius\Types\Checker;

/**
 * 
 */
interface CheckerInterface{
	
	/**
	 * 
	 */
	public function arguments($requirements);

	/**
	 * 
	 */
	public function check($requirements);
}
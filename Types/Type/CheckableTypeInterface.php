<?php

namespace Vibius\Types\Type;

interface CheckableTypeInterface{
	public function validate($candidate)
}
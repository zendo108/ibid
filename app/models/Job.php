<?php

class Job extends Eloquent {
 
	public function user(){
		return $this->hasMany('User');
	}
 
}

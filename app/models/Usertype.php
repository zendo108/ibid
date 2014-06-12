<?php

class Usertype extends Eloquent {
 
	public function user(){
		return $this->belongsTo('User');
	}
 
}

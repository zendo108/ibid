<?php

class Bids_has_job extends Eloquent {
 
	public function bid(){
		return $this->hasMany('Bid');
	}

	public function job(){
		return $this->hasMany('Job');
	}

	public function rating(){
		return $this->belongsTo('Rating');
	}

	public function rating(){
		return $this->belongsTo('Rating');
	}
 
}

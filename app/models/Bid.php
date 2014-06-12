<?php

class Bid extends Eloquent {
 
	public function job(){
		return $this->hasMany('Job');
	}

	public function user(){
		return $this->hasMany('User');
	}

	public function bids_has_job(){
		return $this->belongsTo('Bids_has_job');
	}
 
}

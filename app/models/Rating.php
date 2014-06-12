<?php

class Rating extends Eloquent {
 
	public function bids_has_job(){
		return $this->hasMany('Bids_has_job');
	}
 
}

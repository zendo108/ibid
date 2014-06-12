<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface,RemindableInterface{
    use UserTrait, RemindableTrait;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

        protected $fillable = ['first','last','rut','email','phone','notes',
                                'username','password','remember_token','usertypes_id'];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
        
        /**
    * Get the unique identifier for the user.
    *
    * @return mixed
    */
   public function getAuthIdentifier()
   {
     return $this->getKey();
   }

   /**
    * Get the password for the user.
    *
    * @return string
    */
   public function getAuthPassword()
   {
     return $this->password;
   }

   /**
    * Get the e-mail address where password reminders are sent.
    *
    * @return string
    */
   public function getReminderEmail()
   {
     return $this->email;
   }
   
   public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}

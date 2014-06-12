<?php

class SessionsController extends BaseController{
    
    public function index(){
        
    }
    
    public function create(){
        if(Auth::check()) Return Redirect::to('/admin');//as opposed to Auth::guest()
        return View::make('sessions.create');
    }
    
    public function store(){
        if(Auth::attempt(Input::only('email','password'))){
            return 'Welcome '.Auth::user()->username;
        }
        return Redirect::back()->withInput();
    }
    
    public function show(){
        
    }
    
    public function edit(){
        
    }
    
    public function update(){
        
    }
    
    public function destroy(){
        Auth::logout();
        return Redirect::route('sessions.create');
    }
}
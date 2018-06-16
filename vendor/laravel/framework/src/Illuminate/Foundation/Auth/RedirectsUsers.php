<?php

namespace Illuminate\Foundation\Auth;

trait RedirectsUsers
{
    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if($this->guard()->user()->hasAnyRole('Admin')){
             return '/ThyroAdmin';
        }else{
            if (method_exists($this, 'redirectTo')) {
                return $this->redirectTo();
            }
        }

        //return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
	    return \Session::get('backUrl') ? \Session::get('backUrl') : $this->redirectTo;
    }
}

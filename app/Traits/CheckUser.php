<?php 

namespace App\Traits;


trait CheckUser
{

    public function CheckUserType()
    {
        define('USER_TYPE', session('usertype'));
        
        if(session()->has('usertype')){

            switch(USER_TYPE)
            {
                case 'Admin' : 
                    return redirect()->route('admin.index');
                    break;

                case 'Teacher' : 
                    return redirect()->route('teacher.index');
                    break;

                case 'User' : 
                    return redirect()->route('user.index');

                    break;
            }

        }
    }

}
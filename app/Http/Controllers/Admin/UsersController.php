<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller; // добавил

class UsersController extends Controller
{
    public function getUsers()
    {
    	$objUser = new User();
    	$users = $objUser->paginate(3);    	
        return view('admin/users/users', ['users' => $users]);
    }

     public function deleteUser($id) {
        $objUser = new User();
        $objUser->where('id', $id)->delete();
        return redirect()->route('users_edit');
    }
    
}

<?php


namespace App\Repository;


use App\User;
use phpseclib\Crypt\Hash;

class UsersRepository
{

    public function getAll()
    {
        $users = User::all();
        return $users;
    }

    public function getByid($id)
    {
        $users = User::find($id);
        return $users;
    }

    public function insertUser($input)
    {
        $user = new User();
        $user->first_name = $input['first_name'];
        $user->last_name = $input['last_name'];
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->city = $input['city'];
        $user->status = $input['status'];
        $user->save();
    }

    public function deleteUser($id){
        $users = User::find($id);
        $users->delete();
        return $users;
    }
}

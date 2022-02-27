<?php
function find_user_login_password(string $login,string $password):array
{
    $users = find_data("users");
    foreach ($users as $user) 
    {
        if($user['login'] == $login && $user['password'] == $password)
        {
            return $user;
        }
    }
    return [];
}
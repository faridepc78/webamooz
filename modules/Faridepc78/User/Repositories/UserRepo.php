<?php


namespace Faridepc78\User\Repositories;


use Faridepc78\User\Models\User;

class UserRepo
{
    public function findByEmail($email)
    {
        return User::query()->where('email', $email)->first();
    }
}

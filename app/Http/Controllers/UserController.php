<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    // Show the details of user:
    // name, email, phone number
    public function show($id)
    {
        $user = $this->user->findOrFail($id);
        return view('users.show')->with('user', $user);
    }
}

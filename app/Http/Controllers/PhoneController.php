<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;

class PhoneController extends Controller
{
    private $phone;

    public function __construct(Phone $phone)
    {
        $this->phone = $phone;
    }

    public function showUserInfo($phone_id)
    {
        $phone = $this->phone->findOrFail($phone_id);

        return view('phones.show')->with('phone', $phone);
    }
}

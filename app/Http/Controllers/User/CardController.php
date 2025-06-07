<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CardController extends Controller
{
      public function index()
    {
        return view('user.card.index');
    }
}

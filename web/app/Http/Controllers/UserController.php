<?php

namespace App\Http\Controllers;

use App\Services\User\BalanceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addMoney(Request $request)
    {
        if (!is_numeric($request->sum)){
            return false;
        }

        $balance_service = new BalanceService(Auth::user());

        $response = $balance_service->addMoney($request->sum);

        return $response;
    }
}

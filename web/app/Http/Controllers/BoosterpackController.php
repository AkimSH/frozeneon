<?php

namespace App\Http\Controllers;

use App\Models\Boosterpack;
use Illuminate\Http\Request;

class BoosterpackController extends Controller
{

    public function getBoosterpacks()
    {
        $boosterpacks = Boosterpack::select('id', 'price')->orderBy('time_created', 'DESC')->get();

        return response()->json(['status' => 'success', 'boosterpacks' =>$boosterpacks->toArray()]);
    }
}

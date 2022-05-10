<?php

namespace App\Http\Controllers;

use App\Http\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        #test
    }

    public function getLikeAjax($model_type, $id)
    {
        $user = Auth::user();

        $add_like = $user->sendLike();

        if ($add_like['status']) {
            $model = Helpers::getClassNameFromString(explode('_', $model_type)[1])::where('id', $id)->first();
            $model->likes++;
            $model->save();

            return [
                'status' => true
            ];
        }

        return [
            'status' => false
        ];
    }

    public function getLike($model_type, $id)
    {
        $user = Auth::user();

        $add_like = $user->sendLike();

        if ($add_like['status']) {
            $model = Helpers::getClassNameFromString(explode('_', $model_type)[1])::where('id', $id)->first();
            $model->likes++;
            $model->save();

            return back()->with(['status' => true]);
        }

        return back()->withErrors(['message' => 'Not enough balance']);
    }
}

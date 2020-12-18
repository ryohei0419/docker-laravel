<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Events\AttackEvent;

Route::post('/battle',function(Request $request){

    $battle = [
       'attacker_chara_id'=> $request->attacker_chara_id,
       'defender_chara_id'=> $request->defender_chara_id,
    ];

    event(new AttackEvent($battle));
    Log::debug($battle);

    return $battle;
});

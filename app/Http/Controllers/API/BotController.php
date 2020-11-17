<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bot;

class BotController extends Controller
{
    public function bots()
    {
        $auth_user_id = auth()->user()->id;
        $bots = Bot::where('user_id', $auth_user_id)->get();
        return response()->json($bots, 201);
    }


    public function bot($id)
    {
        return response()->json(Bot::findOrFail($id), 201);
    }


    public function store(Request $request)
    {
        $bot = Bot::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            'description' => $request->description,
        ]);
        return response()->json($bot, 201);
    }


    public function update(Request $request, $id)
    {
        $bot = Bot::findOrFail($id);

        if ($bot->user_id == auth()->user()->id) {
            $bot->update($request->all());
            return response()->json($bot, 200);
        } else {
            return response()->json('you can\'t edit this bot', 200);
        }
    }


    public function destroy($id)
    {
        $bot = Bot::findOrFail($id);
        if ($bot->user_id == auth()->user()->id) {
            Bot::destroy($id);
            return response()->json( "bot id: $id was removed", 200);
        } else {
            return response()->json('you can\'t delete this bot', 200);
        }
    }
}

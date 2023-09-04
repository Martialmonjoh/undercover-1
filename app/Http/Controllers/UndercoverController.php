<?php

namespace App\Http\Controllers;

use App\Models\Undercover;
use Illuminate\Http\Request;
use App\Models\Word;

class UndercoverController extends Controller
{
    public function index(Request $request)
    {
        $state = $request->state;
        $words = $state != null ? Word::all()->where('state', $state) : Word::all();
        return response()->json($words);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Undercover $undercover)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $id = $request->id;
            $state = $request->state;
            $word = Word::where('id', $id)->first();
        //    return  $word;

            if ($word) {
                $word->state = $state;
                $word->save();
                return response()->json($word);
            } else {
                return response()->json('not found', 401);
            }
        } catch (\Throwable $th) {

            return response()->json($th->getMessage(), 400);
        }
    }

    public function add(Request $request)
    {
        try {

            $word1 = $request->word1;
            $word2 = $request->word2;
            $word = new Word();

            $word->word1 = $word1;
            $word->word2 = $word2;


            $word->save();



            return response()->json($word);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 400);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Undercover $undercover)
    {
        //
    }
}

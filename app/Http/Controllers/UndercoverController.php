<?php

namespace App\Http\Controllers;

use App\Models\Undercover;
use Illuminate\Http\Request;
use App\Models\Word;

class UndercoverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $words = Word::all();

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
            $word = Word::where('id',$id)->first();
    
            if ($word) {
               $word->state = $state;
               $word->save();
               return response()->json($word);
            }
            else{
                return response()->json('not found',401);
            }
        } catch (\Throwable $th) {

            return response()->json($th->getMessage(),400);
        
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

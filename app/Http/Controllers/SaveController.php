<?php

namespace App\Http\Controllers;

use App\Models\UserCreature;
use Illuminate\Http\Request;

class SaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $creatures = UserCreature::where('student_id', $user->id)->get(['species_id', 'amount']);

        $save = [
            'id' => $user->id,
            'power' => $user->power,
            'evo' => $user->evo,
            'creatures' => $creatures
        ];
        return response()->json($save);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
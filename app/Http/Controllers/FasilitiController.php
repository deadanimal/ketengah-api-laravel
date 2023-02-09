<?php

namespace App\Http\Controllers;

use App\Models\Fasiliti;
use Illuminate\Http\Request;

class FasilitiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Fasiliti::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fasiliti = Fasiliti::create($request->all());
        return $fasiliti;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fasiliti  $fasiliti
     * @return \Illuminate\Http\Response
     */
    public function show(Fasiliti $fasiliti)
    {
        return $fasiliti;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fasiliti  $fasiliti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fasiliti $fasiliti)
    {
        $fasiliti->update($request->all());

        return $fasiliti;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fasiliti  $fasiliti
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fasiliti $fasiliti)
    {
        $result = $fasiliti->delete();

        if ($result) {
            return [
                'code' => 200,
                'message' => 'Fasiliti Berjaya Dibuang',
            ];
        }

        return [
            'code' => 500,
            'message' => 'Fasiliti Gagal Dibuang',
        ];

    }
}

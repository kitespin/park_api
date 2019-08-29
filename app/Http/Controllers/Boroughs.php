<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borough;
use App\Http\Resources\BoroughResource;



class Boroughs extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Borough $borough)
    {
        // return Borough::all();
        return BoroughResource::collection($borough->parks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get post request data for name
        $data = $request->only(["name"]);

        // create borough with data and store in DB
        $borough = Borough::create($data);

        // return the borough along with a 201 status code
        return response($borough, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          return Borough::find($id);
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

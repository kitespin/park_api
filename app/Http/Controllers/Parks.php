<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Park;
use App\Borough;

class Parks extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Park::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get post request data for title and article
        $data = $request->only(["name"]);

        // create article with data and store in DB
        $park = Park::create($data);

        // return the article along with a 201 status code
        $borough = Borough::find( $request->get("borough_id") );
        
        $borough->parks()->save($park);
        
        return response($park, 201);

        // store the borough on the parks
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Park::find($id);
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
        $park = Park::find($id);
        $park->delete();

    // use a 204 code as there is no content in the response
        return response(null, 204);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CoffeModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $coffe; // Remove the instantiation here

     public function __construct()
     {
         $this->coffe = new CoffeModel(); // Move the instantiation to the constructor
     }

     public function index(Request $request)
     {
         $data = $this->coffe->inRandomOrder()->get(); // Access the property using $this->coffe
        if(isset($request->vnp_Amount) && !empty($request->vnp_Amount)){
            $notifiction = 'success';
            return view('Home', compact('data'))->with('message', $notifiction);
        }
         return view('Home', compact('data'));
     }

     public function all_coffe(){
        $data = $this->coffe->all();
        return  response()->json($data);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

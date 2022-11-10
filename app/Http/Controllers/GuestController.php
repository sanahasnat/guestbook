<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Response;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guests = Guest::latest()->paginate(5);
    
        return view('guests.index',compact('guests'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'email' => 'unique:guests,email',
            'last_name' => 'required',
            'message' => 'required',
        ]);
    
        $guest = Guest::create($request->all());

        return Response::json($guest);
     
        // return redirect()->route('guests.index')
        //                 ->with('success','Guest created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(Guest $guest)
    {
        return view('guests.show',compact('guest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(Guest $guest)
    {
        return view('guests.edit',compact('guest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guest $guest)
    {
        $request->validate([
            'first_name' => 'required',
            'email' => 'unique:guests,email,' . $guest->id ,
            'last_name' => 'required',
            'message' => 'required',
        ]);
    
        $guest->update($request->all());
    
        return redirect()->route('guests.index')
                        ->with('success','Guest updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest)
    {
        $guest->delete();
    
        return redirect()->route('guests.index')
                        ->with('success','Guest deleted successfully');
    }
}

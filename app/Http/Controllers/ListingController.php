<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::latest()
                ->filter(request(['tag', 'search']))
                ->paginate(6),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listings.create');
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
            'title' => ['required'],
            'company' => ['required', Rule::unique('listings', 'company')],
            'email' => ['required', 'email'],
            'location' => 'required',
            'website' => 'required',
            'tags' => 'required'
        ]);

        $request['user_id'] = auth()->id();

        Listing::create($request->all());

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('listings.show', ['listing' => Listing::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing)
    {
        $request->validate([
            'title' => 'required',
            'company' => 'required',
            'email' => 'required',
            'local' => 'required',
            'website' => 'required',
            'tags' => 'required',
        ]);

        // dd("mlkqsjdf");
        $listing->fill($request->all())->save();

        return back()->with('message', 'Listing Successfully Updated!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        // $listing = Listing::find($listing);

        $listing->delete();

        return redirect('/')->with('message', 'Listing Successfully Deleted!');
    }

    public function manage()
    {
        dd('manage');
    }
}

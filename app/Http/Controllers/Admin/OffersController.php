<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
require_once(app_path().'/helpers.php');

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::all();
        $user = Auth::user();

        if (auth()->user()->hasRole(1)){
            return view('admin.offers.index', compact('offers', 'user'));
        } else {
            return view('offers.index', compact('offers', 'user'));
        }
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
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->storeAs('public/images', $imageName);

        $offer = new Offer;
        $offer->title = $request->input('title');
        $offer->user_id = Auth::id();
        $offer->post_id = $request->input('post_id');
        $offer->description = $request->input('description');
        $offer->image = $imageName;

        $offer->save();

        return response()->json([
            'success' => true,
            'message' => 'Offer added successfully.',
        ]);
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
        $offer = Offer::findOrFail($id);

        $offer->title = $request->input('title');
        $offer->description = $request->input('description');
        
        if ($request->hasFile('image')) {
            // Remove old image
            Storage::delete($offer->image);
            
            // Save new image
            $path = $request->file('image')->store('public/images');
            $offer->image = $path;
        }

        $offer->save();

        return response()->json([
            'success' => true,
            'message' => 'Offer edited successfully.',
            'title' => $offer->title,
            'description' => $offer->description,
            'image' => $offer->image,
        ]);
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

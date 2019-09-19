<?php

namespace Quotes\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Quotes\Models\Quote;
use Session;

class QuoteController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = Quote::paginate('20');
        return view('quotes::index',compact('quotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quotes::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->validate([
        'category'=>'required|string|min:3|max:50',
        'quote'=>'required|string|min:10|max:1000',
        'author'=>'required|string|min:3|max:191',
        'image'=>'nullable|image|mimes:jpg,png'
      ]);

      $quote = Quote::create($data);
      return redirect()->route('quotes.show',$quote->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        return view('quotes::show',compact('quote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Quote $quote)
    {
        return view('quotes::edit',compact('quote'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quote $quote)
    {
      $data = $request->validate([
        'category'=>'required|string|min:3|max:50',
        'quote'=>'required|string|min:10|max:1000',
        'author'=>'required|string|min:3|max:191',
        'image'=>'nullable|image|mimes:jpg,png'
      ]);

      $quote->update($data);
      Session::flash('success','Quotes Successfully Saved');
      return redirect()->route('quotes.show',$quote->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        $quote->delete();
        Session::flash('success','Quotes Successfully Deleted');
        return redirect()->route('quotes.index');
    }
}

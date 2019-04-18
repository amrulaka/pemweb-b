<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Quote::all();
        return view('quotes.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Hquotettp\Response
     */
    public function create()
    {
        return view('quotes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'title' => 'required|min:3',
        'subject'  => 'required|min:5',
      ]);

      $slug =str_slug($request->title, '-') . '-'. now();
        $data= Quote::create([

        'title'   => $request->title,
        'slug'    => $slug,
        'subject' => $request->subject,
        'user_id' => Auth::user()->id,

      ]);
        return redirect()->route('quotes.index')->with('alert-success','Berhasil Menambahkan Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
          $quote= Quote::where('slug', $slug)->first();
        if (empty($quote)) {
          abort(404);
        }
        return view('quotes.single', compact('quote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $quote= Quote::findOrFail($id);

      return view('quotes.ubah',compact('quote'));

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
      $data = Quote::where('id',$id)->first();
      if ($data->IsOwner()){
      $data->title = $request->title;
      $data->subject = $request->subject;
      $data->save();
    }
      else {abort(404);
      }

       return redirect()->route('quotes.index')->with('alert-success','Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data = Quote::where('id',$id)->first();
      if ($data->IsOwner()){
      $data->delete();
    }
      else {abort(404);
      }

       return redirect()->route('quotes.index')->with('alert-success','Data berhasil dihapus!');
    }
}

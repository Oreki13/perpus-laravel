<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Book::select('id','title', 'img', 'year')->get();
        return view('Home.Dashboard', compact(['tables']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Home.addBook');
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
            'title'=>'required|max:255',
            'year' =>'required|digits:4',
            'publisher'=>'required|max:100',
            'creator' =>'required|max:150',
            'description'=>'required|max:500',
            'language' => 'required|max:100',
            'img'=>'file|image|mimes:jpg,png',
        ]);
        $file = $request->file('img');
        $name_file = time()." "."cover";
        $file->getClientOriginalExtension();
        $folder = 'cover_book';
        $file->move($folder, $name_file);

        Book::create([
            'title'=>$request->title,
            'year' =>$request->year,
            'publisher'=>$request->publisher,
            'creator' =>$request->creator,
            'description'=>$request->description,
            'language' => $request->language,
            'img'=>$name_file,
        ]);

        return redirect()->route('dashboard')->with('success', 'Data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Book::where('id', $id)->first();
        return view('Home.detail', compact(['table']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $table = Book::where('id', $id)->first();
        return view('Home.editBook', compact(['table']));
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
        $request->validate([
            'title'=>'required|max:255',
            'year' =>'required|digits:4',
            'publisher'=>'required|max:100',
            'creator' =>'required|max:150',
            'description'=>'required|max:500',
            'language' => 'required|max:100',
            'img'=>'file|mimes:jpg,png',
        ]);
        $img = Book::where('id', $id)->first();
            if($request->file('img')){
                $file = $request->file('img');
                $name_file = time()." "."cover";
                
                if($img->img !== $name_file){
                   $file->getClientOriginalExtension();
                    $folder = 'cover_book';
                    $file->move($folder, $name_file);
                }
            }

        Book::where('id', $id)->update([
            'title'=>$request->title,
            'year' =>$request->year,
            'publisher'=>$request->publisher,
            'creator' =>$request->creator,
            'description'=>$request->description,
            'language' => $request->language,
            'img'=> $request->file('img') ? $name_file : $img->img,
        ]);

        return redirect()->route('detail', $id)->with('success', 'Data berhasil di edit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Book::find($id);
        $table->delete();
        return redirect()->route('dashboard')->with('success', 'Data Berhasil di hapus');
    }
}

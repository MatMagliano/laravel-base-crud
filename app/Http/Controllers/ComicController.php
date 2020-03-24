<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;

class ComicController extends Controller
{
    private $validationComic = [
            'title' => 'required|string|max:255',
            'number' => 'required|numeric',
            'page' => 'required|numeric',
            'publishing' => 'required|string|max:255',
            'price' => 'required|numeric',
        ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comics = Comic::all();
        // dd($comics);

        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->all();
        $request->validate([
            'title' => 'required|string|max:255',
            'number' => 'required|numeric',
            'page' => 'required|numeric',
            'publishing' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);
        // dd($data);
        $comic = new Comic;
        $comic->fill($data);
        $saved = $comic->save();
        if ($saved == true) {
            $comic = Comic::orderBy('id', 'desc')->first();
            return redirect()->route('comics.index', compact('comic'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        // $comic = Comic::find();
    
        if (empty($comic)) {
            abort('404');
        }

        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        if (empty($comic)) {
            abort('404');
        }
        return view('comics.create', compact('comic'));
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
        $comic = Comic::find($id);
        if (empty($comic)) {
            abort('404');
        }
        $data = $request->all();
        $request->validate($this->validationComic);
        // $comic->fill();
        $update = $comic->update($data);
        if($update) {
            $comic = Comic::find($id);
            return redirect()->route('comics.show', compact('comic'));
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return view('comics.index', compact('comic'));
    }
}

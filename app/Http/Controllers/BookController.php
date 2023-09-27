<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Return_;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::get();
        //$books = Books::findOrFail($id);
        return view ('index', compact('books'));         //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');        
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
        {
        $this->validate($request, [
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
        // 'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = Books::create($request->all());
        // if($request->hasFile('gambar')){
        //     $request->file('gambar')->move('gambarbuku/', $request->file('gambar')->getClientOriginalName());
        //     $data->foto = $request->file('foto')->getClientOriginalName(); 
        //     $data->save();
        // }   
        return redirect()->route('book')->with(['succes' => 'Data Berhasil Disimpan']);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) 
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Get By ID
        $books = Books::findOrFail($id);
        return view('edit', compact('books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
        ]);

        $book = Books::findOrFail($id);
        $book->update([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit            
        ]);
       return redirect()->route('book')->with(['succes' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Books::findOrFail($id);
        $book->delete();
        return redirect()->route('book')->with(['success' => 'Data Berhasil Dihapus!']);
        //
    }
}

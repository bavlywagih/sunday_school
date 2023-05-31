<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\library;


class LibraryController extends Controller
{

    public function library()
    {        
        return view('library.library' );
    }
    public function library_topics()
    {
        $librarys = library::orderBy('id', 'desc')->get();
        return view('library.library_topics' , compact('librarys'));
    }

    public function library_create(Request $request)
    {
        $validated = $request->validate([
            'address' => ['required'],
            'content' => ['required'],
            'user_id' => ['required'],
        ]);
        library::create([
            'address' =>   $validated['address'], 'content' => $validated['content'], 'user_id' =>   $validated['user_id']]);
            return redirect()->route("library_topics");
    }

    

    
}

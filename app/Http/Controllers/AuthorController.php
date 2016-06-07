<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller {

    public function index(Request $request) {
 
        $data = [
            'authors' => Author::all(),
            'success' => $request->session()->has('success') ? $request->session()->pull('success') : false,
        ];
        
        return view('authors/list')->with($data);
    }

    public function create(Request $request) {

        $data = [
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'birthdate' => $request->input('birthdate'),
            'bio' => $request->input('bio'),
            'slug' => '',
            'photo' => '',
        ];
                
        $data['slug'] = str_slug($data['name'] . ' ' . $data['surname'], '-');
        
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $filename = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(storage_path('app/public'), $filename);
            $data['photo'] = $filename;
        }
        
        Author::create($data);
        
        $request->session()->put('success', 'Author created');
        return redirect('/author');
    }
    
    public function edit($id) {
        
        $data = [
            'author' => Author::find($id),
        ];

        return view('authors/edit')->with($data);
    }
    
    public function update($id, Request $request) {

        $data = [
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'birthdate' => $request->input('birthdate'),
            'bio' => $request->input('bio'),
            'slug' => '',
            'photo' => null,
            'oldPhoto' => null,
        ];
                
        $data['slug'] = str_slug($data['name'] . ' ' . $data['surname'], '-');
        
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $filename = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(storage_path('app/public'), $filename);
            $data['photo'] = $filename;
        }
        
        $author = Author::find($id);
        
        $author->name = $data['name'];
        $author->surname = $data['surname'];
        $author->birthdate = $data['birthdate'];
        $author->bio = $data['bio'];
        $author->slug = $data['slug'];
                
        if (!empty($data['photo'])) {
            $data['oldPhoto'] = $author->photo;
            $author->photo = $data['photo'];
        }
        
        if ($author->save() && !empty($data['oldPhoto'])) {
            unlink(storage_path('app/public') . '/' . $data['oldPhoto']);
        }
                
        $request->session()->put('success', 'Author edited');
        return redirect('/author');        
    }
    
    public function remove($id, Request $request) {
        
        Author::find($id)->delete();
        
        $request->session()->put('success', 'Author deleted');
        return redirect('/author');
        
    }

    public function view($slug) {
    
        $data = [
            'author' => Author::where('slug', $slug)->first()
        ];
        
        return view('authors/view')->with($data);
    }

}

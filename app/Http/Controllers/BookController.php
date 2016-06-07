<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;

/**
 * Description of BookController
 *
 * @author rolando
 */
class BookController extends Controller {

    public function index(Request $request) {

        $data = [
            'authors' => Author::all(),
            'books' => Book::all(),
            'success' => $request->session()->has('success') ? $request->session()->pull('success') : false,
        ];
        
        return view('books/list')->with($data);
    }

    public function create(Request $request) {

        $data = [
            'title' => $request->input('title'),
            'extract' => $request->input('extract'),
            'author_id' => $request->input('author_id'),
            'slug' => str_slug($request->input('title'), '-'),
            'poster' => '',
        ];

        if ($request->hasFile('poster') && $request->file('poster')->isValid()) {
            $filename = time() . '_' . $request->file('poster')->getClientOriginalName();
            $request->file('poster')->move(storage_path('app/public'), $filename);
            $data['poster'] = $filename;
        }

        Book::create($data);

        return redirect('/book')->with('success', 'Book created');
    }

    public function edit($id) {

        $data = [
            'authors' => Author::all(),
            'book' => Book::find($id),
        ];

        return view('books/edit')->with($data);
    }

    public function update($id, Request $request) {

        $data = [
            'title' => $request->input('title'),
            'extract' => $request->input('extract'),
            'author_id' => $request->input('author_id'),
            'slug' => str_slug($request->input('title'), '-'),
            'poster' => null,
            'oldPoster' => null,
        ];        
        
        if ($request->hasFile('poster') && $request->file('poster')->isValid()) {
            $filename = time() . '_' . $request->file('poster')->getClientOriginalName();
            $request->file('poster')->move(storage_path('app/public'), $filename);
            $data['poster'] = $filename;
        }

        $book = Book::find($id);

        $book->title = $data['title'];
        $book->extract = $data['extract'];
        $book->author_id = $data['author_id'];
        $book->slug = $data['slug'];

        if (!empty($data['poster'])) {
            $data['oldPoster'] = $book->poster;
            $book->poster = $data['poster'];
        }

        if ($book->save() && !empty($data['oldPoster'])) {
            unlink(storage_path('app/public') . '/' . $data['oldPoster']);
        }
        
        $request->session()->put('success', 'Book edited');
        return redirect('/book');
    }

    public function remove($id) {

        Book::find($id)->delete();

        $request->session()->put('success', 'Book deleted');
        return redirect('/book');
    }

    public function view($slug) {

        $data = [
            'book' => Book::where('slug', $slug)->first()
        ];

        return view('books/view')->with($data);
    }

}

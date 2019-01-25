<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books=Book::all();
        return view('book.home',['books'=>$books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $categories = Category::pluck('name', 'id'); 
        return view('book.new', ['categories'=> $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        $input['image']='nophoto.jpg';
        if($file = $request->file('image')){
            $name = time().$file->getClientOriginalName();
            $file->move('uploads/images',$name);  
            $input['image']=$name;
        } 
        if($file = $request->file('file')){
            $name = time().$file->getClientOriginalName();
            $file->move('uploads/books',$name);  
            $input['file']=$name;
        } 
        $input['read']=0;
        Book::create($input);  
        return redirect('/admin/book');
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
        $book = Book::findOrFail($id);  
        $categories = Category::pluck('name', 'id'); 
        return view('book.edit', ['book'=>$book, 'categories'=> $categories]);
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
        $input = $request->all();
        $book = Book::findOrFail($id);
        $input['image']=$book->image;
        $input['file']=$book->file;
        if($file = $request->file('image')){
            $name = time().$file->getClientOriginalName();
            $file->move('uploads/images',$name);  
            $input['image']=$name;
        } 
        if($file = $request->file('file')){
            $name = time().$file->getClientOriginalName();
            $file->move('uploads/books',$name);  
            $input['file']=$name;
        }         
        $book->update($input);
        return redirect('/admin/book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        Book::findOrfail($id)->delete();  
        return redirect('/admin/book'); 
    }
}

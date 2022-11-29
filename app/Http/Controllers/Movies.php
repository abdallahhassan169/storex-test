<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Movie;

class Movies extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories=Category::all();
        $movies = Movie::where(function($q)use($request){
            if($request->has('search')){
              $q->where('title','like','%'.$request->search.'%')
              ->orWhere('rate','like','%'.$request->search.'%');

              }

            elseif($request->has('category')){
                $q->where('category_id','like','%'.$request->category.'%');  
              }
          })
          ->latest()->paginate(10); 
          
          return view('movies/index',compact('categories','movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('movies/create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules=['title'=>'required|max:200|unique:movies,title',
        'description'=>'required|max:1000',
        'rate'=>'required|max:10',
        'image'=>'mimes:jpeg,jpg,png,gif|required',
        'category_id'=>'required|exists:categories,id'];

        $messages=['title.required'=>'title is required',
        'description.required'=>'description is required',
        'rate.required'=>'rate is required',
        'image.required'=>'image is required',
        'category_id.required'=>'category_id is required',            
    ];
    $this->validate($request,$rules,$messages);

    if($request->hasFile('image')){
        $image=$request->file('image');
        $name=$image->getClientOriginalName();
        $image_name=time().'.'.$name;
        $request->image->move(public_path('images'),$image_name);
          }
    
    $movie=new Movie;
    $movie->create([
        'title'=>$request->title,
        'image'=>$image_name,
        'rate'=>$request->rate,
        'category_id'=>$request->category_id,
        'description'=>$request->description

    ]);

    return redirect()->route('movies.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = Movie::findOrFail($id);
        return view('movies/show',compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::all();
        $movie=Movie::findOrFail($id);
        return view('movies/edit',compact('movie','categories'));
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
        $movie=Movie::findOrFail($id);
        $movie->update($request->all());
        return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $movie=Movie::findOrFail($id);
        $movie->delete();
        return redirect()->back();
    }
}

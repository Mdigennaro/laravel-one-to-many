<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        $categories = Category::all();

        return view('admin.posts.index', compact('posts'), compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationForm(), $this->validationErrors());

        $data = $request->all(); 

        $new_post = new Post();
        $new_post->fill($data);
        $new_post->slug = Post::slugCreate($new_post->title);
        $new_post->save();

        return redirect()->route('admin.posts.show', $new_post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        if($post){
            return view('admin.posts.show', compact('post'));
        }

        abort(404,'Pagina non trovata');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::find($id);

        if($post){
            return view('admin.posts.edit', compact('post'), compact('categories'));
        }
        abort(404,'Pagina non trovata');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate($this->validationForm(), $this->validationErrors());

        $form_data = $request->all();

        if($form_data['title'] != $post->title){
            $form_data['slug'] = Post::slugCreate($form_data['title']);
        }

        $post->update($form_data);

        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('deleted','Post eliminato');
    }

    private function validationForm(){
        return[
            'title'=>'required|max:50|min:2',
            'content'=>'required|min:2'
        ];
    }

    private function validationErrors(){
        return[
            'title.required'=>'Il titolo è obbligatorio',
            'title.max'=>'Un titolo non può avere più di 50 caratteri',
            'title.min'=>'Un titolo deve contere almeno due caratteri',
            'content.required'=>'Devi scrivere qualcosa nel contenuto',
            'content.min'=>'Bisogna inserire almeno 2 caratteri'
        ];
    }
}

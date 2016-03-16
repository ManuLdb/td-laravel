<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'edit', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*Afficher liste*/
        /*$posts = DB::table('posts')->where('id', 10)->get();
        dd($posts);*/
        /*Trouver titre findorfail permet de voir erreur si faux*/
        /*$post = new Post;
        dd($post->findOrfail(2)->title);*/
       /*Creation manuel dans bdd*/
        /*$post = new Post;
        $post->title = "Mon nouveau titre";
        $post->content = "Mon nouveau contenu";
        $post->user_id = Auth::user()->id;
        $post->save();*/
        $list = Post::paginate(5);
        return view('posts.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'title' => 'required',
            'content'=>'required'
        ]);
        $post =new Post;
        $input = $request->input();
        $input['user_id'] = Auth::user()->id;

        $post->fill($input)->save();
        return redirect()->route('post.index')->with('success', 'bien créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrfail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
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
        $this->validate($request, [
            'title' => 'required',
            'content'=>'required'
        ]);
        $post=Post::findOrfail($id);
        $input =$request->input();
        $post->fill($input)->save();
        return redirect()
            ->route('post.index', $id)
            ->with('success', 'Votre article a bien été édité');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect() -> route('post.index') -> with('success', 'Votre article a bien été supprimé');
    }
}

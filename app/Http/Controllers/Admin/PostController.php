<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;//PER INSERIRE IMG


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $formData = $request->validated();
        //PER INSERIRE IMG
        if($request->hasfile('image')){
            $img_path = Storage::put('image', $formData['image']);
            $formData['image'] = $img_path;
        }
        // ALTRI PASSAGGI:
        // 1, su config/filesistem, cambiare default con valore da 'local' a 'public
        // 2, su .env, cambiare filesistem_disk = 'public', (riga 20)
        // 3, php artisan storege:link
        // 4, aggiungere use Illuminate\Support\Facades\Storage; -- poi cambiamenti su show, create, storeTableRequest ANDARE PER VEDERE COMMENTI
        $slug = Str::slug($formData['title'], '-');
        $formData['slug'] = $slug;
        $userId = Auth::id();
        $formData['user_id'] = $userId;
        $post = Post::create($formData);
        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //dopo aver messo i comandi per l'image, serve eliminare la precedente

        $formData = $request->validated();
        $slug= Str::slug($formData['title'],'-');
        $formData['slug'] = $slug;
        $userId = Auth::id;
        $formData['user_id'] = $slug;
        $post->update();
        return redirect()->route('admin.posts.show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->image){
            Storage::delete($post->image);
        }
        $post->delite();
        return to_route('admin.posts.index')->with('message',"$post->title eliminato");
    }
}

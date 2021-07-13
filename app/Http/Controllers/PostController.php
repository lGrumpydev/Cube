<?php
namespace App\Http\Controllers;

use App\Models;
use App\Models\Post;
use App\Models\Like;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Requests\LikeStoreRequest;
use Illuminate\support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Illuminate\support\Facades\File;

class PostController extends Controller
{

    /** 
     *Función que permite acomodar los post por orden de creador
     *Tambien permite visualizar cuantos likes tiene el post
     *
     */
    public function getDashboard(){
        //$posts = Post::orderBy('created_at', 'desc')->get();
        $posts = Post::withCount('likes')->orderBy('created_at', 'desc')->get();
        return view('dashboard', ['posts' => $posts]);
    }


    /** 
     *Función que permite crear un nuevo post
     * y mantiene las validaciones
     */
    public function postCreatePost(Request $request){
     
        /*
         *Validaciones
         */
        $this->validate($request, [
            'body' => 'required|max:1000',
        ]);
        
        /*
         *Creación del post
         */
        $post = new Post();

        /*
         *Guardando datos del post
         */
        $post->body = $request['body'];
        $message = 'There was an error';
        if($request->user()->posts()->save($post)){
            $message = 'Post succefully created!';
        }

        /*
         *Redirige a la ruta de dashboard
         */
        return redirect()->route('dashboard')->with(['message' => $message]);
    }


    /** 
     *Función que permite eliminar el post
     *Solo post personales
     */
    public function getDeletePost($post_id){

        /*
         *busca el id del post
         */
        $post = Post::where('id', $post_id)->first();

        /*
         *if para evitar que otros usuarios puedan borrar post que no sean suyos
         */
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }

        /*
         *elimina el post
         */
        $post->delete();

        /*
         *Redirige a la ruta de dashboard
         */
        return redirect()->route('dashboard')->with(['message' => 'Successfully deleted']);

    }

    public function postEditPost(Request $request){
        $this->validate($request, [
            'body' => 'required'
        ]);

        $post = Post::find($request['postId']);
        $post->body = $request['body'];
        $post->update();
        return response()->json(['new_body' => $post->body], 200);
    }

    public function postLikePost(Request $request){
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        if (!$post){
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like){
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }

    /*public function likeStore(LikeStoreRequest $request) 
{ 
   $user_id = Auth::id(); 
   $user = User::find($user_id);
   $user->likes()->attach($request->postId); 
   return $user; 
}*/

}
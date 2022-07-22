<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;


class SezPostController extends Controller{
 public function osservaPost($query){
        if(session('username') == null){
            return redirect('loginPage');
        }
        $posts =  Post::orderBy('IDpost','desc')->limit($query)->get();
        $count = Post::orderBy('IDpost','desc')->limit($query)->count();
        if($count ==  0){
            $array = array(['ricerca'=>false]);
            return $array;
        }
        foreach ($posts as $post){
            $user =  User::where('id',$post['IDutente'])->first();

            $array[] =  array(
                'IDpost' => $post['IDpost'],
                'username' => $user->username,
                'titolo' => $post['titolo'],
                'opinion' => $post['opinion'],
                'time'  => $post['time'],
                'numberOfPosts'  => $query


            );

            
        }
        return $array;
    }
public function inviopost(){
        $request=request();
        if($request["titolo"]== null || $request["opinion"]==null ){
           return redirect()->back()->withError(['erroreclear'=>'I campi sono vuoti']);
        }
        if(strlen($request["titolo"])>80 || strlen($request["opinion"]>4000)){
           return redirect()->back()->withError(['erroremaxcar'=>'I campi non rispettano i limiti massimi di caratteri']);
        }
        $AuthorName=User::where("username",Session::get("username"))->first();
        if($AuthorName==null){
           return redirect()->back()->withError(["erroreX"=>"Nessun utente registrato nell'opinione"]);
        }
        $AuthorId=$AuthorName->id;
        $nuovoPost=Post::create(
            [
                "IDutente"=>$AuthorId,
                "titolo"=>$request["titolo"],
                "opinion"=>$request["opinion"],
                
            ]);

            if($nuovoPost){
                return view("homePage")->with("status","Il tuo post è stato pubblicato correttamente!");
            }else return redirect()->back()->withError(["errorepost"=>"L'opinione non è stata postata!"]);
    }
public function eliminazione($id){
    if(!session::get("IDpost") || Post::find($id)->IDutente !=Session::get("IDpost"))
    return array("eliminato"=>false);
    $postEliminato=Post::where("IDpost",$id)->delete();
    if($postEliminato){return array("eliminato"=>true);
}else return array("eliminato"=>false);

}
}
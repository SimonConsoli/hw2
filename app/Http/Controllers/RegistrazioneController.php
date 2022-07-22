<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegistrazioneController extends Controller{
   public function registrazioneUtente(){
        $request= request();
        if($this->checkerrors($request) == 0) {
            $newUser =  User::create(
            ['name' => $request['name'],
             'surname' => $request['surname'],
             'username' => $request['username'],
             'email' => $request['email'],
             'password' => password_hash($request['password'],PASSWORD_BCRYPT),
             ]);
            if($newUser){
                Session::put("username",$newUser->username);
                return redirect("homePage");
            }
            else {
                return redirect("registrazione")->withInput();
            }
    }
   }

public function registrazione_csrf(){
    if(session("username")!=null){
        return redirect("homePage")->with("csrf_token",csrf_token());
    }
    else{
        return view("registrazione");
    }
}

//username
public function checkerrors($info){
if(!preg_match('/^[a-zA-Z0-9_]{1,16}$/', $info['username'])){
    $errori[]="Username non valido ";
}else
{
    $username=User::where("username",$info["username"])->first();
    if($username!==null)$errori="Username già presente nel database.";
}

//email
if(!filter_var($info["email"], FILTER_VALIDATE_EMAIL)){ 
    $errori[]="E-mail non valida";}
    else{
        $email=User::where("email",$info["email"])->first();
        if($email!==null)$errori[]="E-mail già presente nel database.";
    }
    
//password

if(strlen($info["password"])<8 || strlen($info["password"]>16)){
    $errori[]="La password deve contenere almeno 8 caratteri e non deve superarne i 16";
}

if(strcmp($info["password"], $info["confirm_password"]) !=0){
    $errori[]="Password non coincidenti. Riprova";
}

if(isset($errori))return 11;

}




public function checkUser($username){
    $exist= User::where("username", $username)->exists();
    return ["exists"=>$exist];
}

public function checkEmail($email){
    $exist=User::where("email",$email)->exists();
    return["exists"=>$exist];
    
}
}
?>
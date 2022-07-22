<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller{

    public function checklog(){
        if(session('username') != null){
            return redirect('homePage')
                ->with('csrf_token', csrf_token());
        }
        else{
            return view('loginPage');
        }
    }

/*public function checklog(){
    if(Session::get('username'))return redirect("homePage");
    if(strlen(request("username")==0) || strlen(request("password")==0)){
        return redirect('loginPage')->withInput();
    }
} */
 public function check(Request $request)    {
        $error  =  true;
        $user = User::where('username', $request->input('username'))->first();
        if($user !=null){
            if(!password_verify(request('password'),$user->password)){
                return back()->withInput()->withErrors(
                    [
                        'error' => 'true'
                    ] );
            }
            Session::put('username',$user->username);
            Session::put('id',$user->id);
            return redirect('homePage');
        }
    }
 public function logout(){
        Session::flush();
        return redirect('loginPage');
    }
}


?>
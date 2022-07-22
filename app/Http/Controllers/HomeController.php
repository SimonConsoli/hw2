<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;


class HomeController extends Controller{
public function index()
    {
        if(!Session::get('id')) return redirect('loginPage');

        $user = User::find(Session::get('id'));
        return view('homePage')->with('username', $user->username);
    }
 public function song($query){
         $client_id='b39fb5dda5fe4c38aabb9a9519267db1';
    $client_secret='3f0a280f63f5448ea9079ab9a133ba05';
     $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token' );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials'); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret))); 
        $token=json_decode(curl_exec($ch), true);
        curl_close($ch);    
    
        // $query_search = urlencode($query);
        $url = 'https://api.spotify.com/v1/search?type=track&q='.$query;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token'])); 
        $res=curl_exec($ch);
        curl_close($ch);
    
        echo $res;

    }
    
   


}
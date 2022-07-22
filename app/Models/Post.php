<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Post extends Model{
public $timestamps= false;
    protected $table='posts';
    protected $fillable=[
        "IDutente","titolo","opinion"
    ];

    public function user() {
        
        return $this->belongsToMany("app/Models/User");

}
}
?>
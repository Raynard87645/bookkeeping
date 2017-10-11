<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;
use App\Articles;


class Articles extends Model
{
    
    protected $fillable = [
      'user_id', 'content', 'live', 'post_on',
    ];
    protected $dates = ['post_on'];



       public function setliveAttributes($value){
        $this->attributes['live'] = (boolean)($value);
          }
        

         public function setPostOnAttributes($value){
	        $this->attributes['post_on'] = Carbon::parse($value);
	          }

        public function getShortContentAttribute(){
        	return substr( $this->content, 0, random_int(150, 200));
          } 
         
        //set the attribute of the user name
    public function setUserIdAttribute($value){
        //Take user name and change the first letter to uppercase
        $this->attributes['user_id'] = ucfirst($value);
    }
          
}
 /*public function getUserIdAttribute(){
        	return substr( $this->user_id, 0, random_int(150, 200));
        } */
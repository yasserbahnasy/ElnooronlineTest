<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Articale;
use App\like;

use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Articale = Articale::all();
        $topviews = Articale::orderBy('views','desc')->take(4)->get();
        $toplikes = Articale::orderBy('score','desc')->take(4)->get();

        //collect value of Percentage
        $Percentage = DB::table('articales')
                 ->select(DB::raw('score/views as sc , id , title'))
                 ->orderBy('sc','desc')->take(4)->get();
        
        //Send data To View
        $arr=array('Articale'=>$Articale , 'topviews'=>$topviews,
                   'toplikes'=>$toplikes , 'Percentage'=>$Percentage);
        return view('home',$arr);
    }

    public function newArticale(Request $request)
    {
    	if ($request->isMethod('post')) {
            
            //upload Images
    		$this->validate($request,['image_url' =>'required|image|mimes:jpg,png,jpeg|max:2048']);
    		$imageName= time().'.'.$request->image_url->getClientOriginalExtension();
    		$request->image_url->move(public_path('images'),$imageName);

            //Insert New Articale
            $newArticale = new Articale();
            $newArticale->title=$request->input('title');
            $newArticale->content=$request->input('content');
            $newArticale->views = 0;
            $newArticale->image_url = $imageName;
            $newArticale->user_id=Auth::user()->id;
            $newArticale->save();
            return redirect('home'); 
        }
    	
        return view('newArticale');
    }

    public function articale($id)
    {
        $Articale = Articale::find($id);

        // Add Views To DB
        $Articale->views =  ++$Articale->views;
        $Articale->save();

        //cheack if open articale vistor or member
        if(Auth::user()){
            $like = Like::where('articale_id',$id)->where('user_id',Auth::user()->id)->first();
            //cheack if choice like or dislike before or no
            if(count($like) == 1 ){
                $type =  $like->type;
            }else{
                $type = 0;
            }
            $arr=array('Articale'=>$Articale,'type'=>$type );
        }else{
            $arr=array('Articale'=>$Articale);
        }
        return view('articale',$arr);
    }

    // Add Likes And DisLike To Articale Or Edit Your Choice Too
    public function like($id)
    {  
        $Like = Like::where('articale_id',$id)->where('user_id',Auth::user()->id)->first();
        $Articale = Articale::find($id);
         //cheack if you choice like or dislike before or no
        if(count($Like) == 1 ){
            //cheack if you choice dislike before or no
            if($Like->type == 2){
                $Like->type = 1 ;
                $Like->save();

                $Articale->score =  ++$Articale->score;
                $Articale->save();
                return("You Choise a 'Like' Bottom");
            }else{
                return("You Choise it Befor");
            }
        }else{
            $newlike = new Like();
            $newlike->type = 1;
            $newlike->user_id =Auth::user()->id;
            $newlike->articale_id = $id;
            $newlike->save();

            $Articale->score =  ++$Articale->score;
            $Articale->save();
            return("You Click on 'Like'");
        }      
    }
    public function dislike($id)
    {
        $Like = Like::where('articale_id',$id)->where('user_id',Auth::user()->id)->first();
        $Articale = Articale::find($id);
        //cheack if you choice like or dislike before or no
        if(count($Like) == 1 ){
            //cheack if you choice like before or no
            if($Like->type == 1){
                $Like->type = 2 ;
                $Like->save();

                $Articale->score =  --$Articale->score;
                $Articale->save();
                return("You Choise a 'DisLike' Bottom");
            }else{
                return("You Choise it Befor");
            }
        }else{
            $newlike = new Like();
            $newlike->type = 2;
            $newlike->user_id =Auth::user()->id;
            $newlike->articale_id = $id;
            $newlike->save();

            $Articale->score =  --$Articale->score;
            $Articale->save();
            return("You Click on 'DisLike'");
        }  
    }
}

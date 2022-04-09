<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pain;
use App\Models\UserSelectedPain;
use Auth;
use App\Models\Paintype;
use App\Models\UserRecord;
use DB;
use DataTables;
use Yajra\DataTables\Html\Button;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
      return view('home');

    }

    public function list(Request $request){

        $search_words=$request->search_words;
        $pain_list= Pain::where('pain_in_english', 'LIKE', "%{$search_words}%")->get();
        // dd($e);

            return response()->json([
                'status' => true,
                'statue_code' => 200,
                'data'=>$pain_list
            ]);
    }

    public function submit(Request $request)
    {
        $user_id=auth()->user()->id;
        $pain_id=$request->pain_id;
        $severity=$request->severity;
       $user_pain= UserSelectedPain::where('user_id',$user_id)->where('pain_table_id',$pain_id)->update(['pain_table_id'=>$pain_id,'severity'=>$severity,'user_id'=>$user_id]);
       if(!$user_pain){
        $user_pain= new UserSelectedPain;
        $user_pain->pain_table_id=$pain_id;
        $user_pain->severity=$severity;
        $user_pain->user_id=$user_id;
        $user_pain->save();
       }
         if($user_pain){
            return response()->json([
                'status'=>true,
                'statue_code' => 200,
                'msg'=>"submitted"
            ]);

         }



    }
    public function paintypeList(Request $request){

        $data=Paintype::where('pain_id',$request->pain_id)->get();
        return response()->json([
            'status' => true,
            'statue_code' => 200,
            'data'=>$data
        ]);
    }
    public function selectPain(){

          $pain=Pain::all();

        return view('frontend.home',['pain'=>$pain]);
    }
   public function abc(){
       return view('test');
   }
   public function redirect(){

       if(auth()->user()->is_admin){
           return redirect()->route('admin.home');
       }

       return redirect('language');
   }
   public function test(){

    $user=UserRecord::orderBy('id','desc')->first()->html;


    return view('testfile',['image'=>$user]);

   }
}

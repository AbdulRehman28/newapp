<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Middleware;
use App\Models\Pain;
use Illuminate\Http\Request;
use Auth;

class HomeController
{

    public function index(Request $request)
    {

        if(auth()->user()->is_admin){

            return redirect('/admin');
         }

        $user_id=auth()->user()->id;
        $user_data=Pain::select('pains.pain_in_english','pains.pain_in_korean','user_selected_pains.user_id','user_selected_pains.severity')
        ->join('user_selected_pains','user_selected_pains.pain_table_id','=','pains.id')->get();
        $user_data=$user_data->where('user_id',$user_id);

        return view('userpain',['user_data'=>$user_data]);

    }


}

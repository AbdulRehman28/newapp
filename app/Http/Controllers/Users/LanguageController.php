<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Gender;
use App\Models\User;
use App\Models\Pain;
use App\Models\PainType;

class LanguageController extends Controller
{
    public function index(){

        $languages=Language::all();

        $genders=Gender::all();

        return view('users.language',compact('languages','genders'));

    }


    public function storeLanguage(Request $request){

        $selected_language=Language::where('id',$request->language_id)->first();
        $language=$selected_language->language;

        $categories= Pain::select('id',$selected_language->language)->get();



        $user=User::where('id',auth()->user()->id)->update(['language_id'=>$request->language_id,'gender_id'=>$request->gender_id]);

        $title='Pain';


        if($request->gender_id==1){


            return view('users.pain',compact('categories','selected_language','title','language'));
        }
        else{
            return view('users.female-pain',compact('categories','selected_language','title','language'));
        }

    }
}

<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\BodyPart;
use Illuminate\Http\Request;
use App\Models\Pain;
use App\Models\PainSeverity;
use App\Models\PainType;
use App\Models\UserRecord;
use App\Models\Language;

use Symfony\Component\HttpFoundation\Session\Session;


class PainController extends Controller
{
    private static $apiContext = '';
    public function index(){

        return view('users.pain');
    }

    public function painTypes(Request $request){


        // dd($request->selected_language);

        $language=$request->selected_language;

        $pain_types=PainType::where('pain_id',$request->pain_id)->select('id',$language)->get();


        $category=Pain::where('id',$request->pain_id)->select('id','english')->first();



        return response()->json([

            'status'=>true,
            'pain_types'=>$pain_types,
            'category'=>$category
        ]);

    }
    public function painTypeTranslate(Request $request){

        $language=$request->selected_language;

        $pain_type=PainType::where('id',$request->pain_type_id)->select('id','english')->first();


        return response()->json([

            'status'=>true,
            'pain_type'=>$pain_type,

        ]);
    }

    public function severity(Request $request){
// dd($request->selected_language);

        if($request->page_no >=1 && $request->page_no<=10 ){

            $severity=PainSeverity::where('id',$request->page_no)->select('id','english',$request->selected_language)->first();


            return response()->json([

                'status'=>true,
                'severity'=>$severity

            ]);
        }

    }

    public function userRecord(Request $request){

        // dd(json_encode($request->image));
        // Session::set('image', $request->image);

        try{

            $id= BodyPart::where('part',$request->body_part)->first()->id;
            $record=new UserRecord();
            $record->user_id=auth()->user()->id;
            $record->pain_id=$request->pain_id;
            $record->pain_type_id=$request->pain_type_id;
            $record->severity_id=$request->severity_id;
            $record->body_part_id=$id;
            $record->avatar=$request->avatar;
            $record->save();

            return response()->json([
                'status'=>true,

            ]);
        }
        catch(\Exception $e){

            return response()->json([
                'status'=>false,

            ]);
        }


    }
    public function generatePDF()
    {

        try{
            $language=Language::where('id',auth()->user()->language_id)->select('language')->first()->language;

            $record= UserRecord::with(['painTypes','pains','severity','bodypart'])->orderBy('id','desc')->first();

            $body_part=$record->bodypart->part;


            $pdf = \PDF::loadView('users.myPDF', ['record'=>$record,'language'=>$language,'body_part'=>$body_part]);

            $pdf->setOption('enable-javascript', true);
            $pdf->setOption('enable-smart-shrinking', true);
            $pdf->setOption('enable-local-file-access', true);
            $pdf->setOption('no-stop-slow-scripts', true);
            $pdf->setOption('encoding', 'UTF-8');
            $pdf->setOption('enable-external-links',true);
            $pdf->setOption('user-style-sheet', 'public/css/main2.css');

            return $pdf->download('painrecord.pdf');

        }
        catch(\Exception $e){
            dd("Something went wrong, please try again.");
        }
    }

}

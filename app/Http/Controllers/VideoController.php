<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\ScoresModel;
use App\QAModel;
use App\video_table;

Use Session;
use DB;

class VideoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
     public function getVideo(Request $request)
    {
         $reponse = $request->all();
         $subject=Arr::get($reponse, 'dta');
         $score=Arr::get($reponse,'dta1');
         #echo $subject;
         #echo $score;
        if ($score <= 10) {
            $Level = 'Basic';
        }
        elseif ($score > 10 && $score <= 20) {
            $Level = 'Medium';
        }
        elseif ($score > 20 && $score <= 30) {
            $Level = 'High';
        }

        if ($subject == 'Machine') {
            $sub = 'ML';
        }
        elseif ($subject == 'Data') {
            $sub = 'DSA';
        }
        elseif ($subject == 'Java') {
            $sub = 'Java';
        }

        $data = $sub . ' ' . $Level;
        //echo $data;

        $model = new video_table;

        $video = DB::table('video_tables')->select('url', )->where([['Type', '=', $data],])->get();
        //dd($video);
        return view('video')->with('data', $video);


    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ScoresModel;
use App\QAModel;
Use Session;
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

    public function testCandidate() {
        // making a model object
        $model = new QAModel;

        // check if all categories of question exist
        $all_categories_exist = DB::table('qa_db')->where([
            ['subject','=','DSA'],
            ['subject','=','ML'],
            ['subject','=','Java'],
        ])->get(); // This will check whether Questions with all categories exist


        
        // if all category doesn't exist, get any questions
        if($all_categories_exist->isEmpty()) {
            $any_questions = QAModel::all()->random()->get();
            $total = count($any_questions);
            // if total number of question is less than 9, get them ALL!
            if($total < 9) {
                $any_questions = QAModel::all()->random($total);
            }
            else {
                // else only get 9 questions.
                $any_questions = QAModel::all()->random(9);
            }
            return view('test')->with('data' ,$any_questions);
        }
        
        else {
            $dsa_questions= QAModel::all()->random(3)->where('subject', 'DSA');
            $ml_questions=QAModel::all()->random(3)->where('subject','ML');
            $java_questions= QAModel::all()->random(3)->where('subject','Java');


            $test_questions = [
                'dsa'  => $dsa_questions,
                'ml'   => $ml_questions, 
                'java' => $java_questions
            ];
            return view('test')->with('data', $test_questions);

            
        }
    }

    public function checkScore(Request $request) {

        // retrieving scores
        $total_response = $request->all();
        $token_removed = array_shift($total_response);

        $index=0;
        $q = [];
        $a = [];

        foreach($total_response as $data) {
            if($index % 2 == 0) {
                $q[$index] = $data;
            }
            else if($index %2 != 0){
                $a[$index] = $data;
            }
            $index++;
        }
        $question_array = array_values($q);
        $answer_array = array_values($a);

        $newindex = 0; // for answers array
        //Positive Scores
        $score_positive = 0;
        $dsa_score = 0;
        $ml_score = 0;
        $java_score = 0;

        //Negative Scores
        /*$score_negative = 0;
        $dsa_score_negative = 0;
        $ml_score_negative = 0;
        $java_score_negative = 0;*/
        $CDB = 0;
        $CDM = 0;
        $CDH = 0;
        $CMB = 0;
        $CMM = 0;
        $CMH = 0;
        $CJB = 0;
        $CJM = 0;
        $CJH = 0;

        foreach($question_array as $question_array) {
            $question = QAModel::where('question', $question_array)->first();
            if($question) {
                if ($question->correct_option == $answer_array[$newindex]) {
                    $score_positive += 5;
                    $subject = $question->subject;
                    $subject_level = $question->level;
                    if ($subject === 'DSA' and $subject_level==='Basic') { $dsa_score += 5; $CDB +=1; }
                    else if ($subject === 'DSA' and $subject_level==='Medium') { $dsa_score += 10; $CDM +=1; }
                    else if ($subject === 'DSA' and $subject_level==='High') { $dsa_score += 15; $CDH +=1; }
                    else if ($subject === 'ML' and $subject_level ==='Basic') { $ml_score += 5; $CMB +=1; }
                    else if ($subject === 'ML' and $subject_level ==='Medium') { $ml_score += 10; $CMM +=1; }
                    else if ($subject === 'ML' and $subject_level ==='High') { $ml_score += 15; $CMH +=1; }
                    else if ($subject === 'Java'and $subject_level === 'Basic') { $java_score += 5; $CJB +=1; }
                    else if ($subject === 'Java'and $subject_level === 'Medium') { $java_score += 10; $CJM +=1; }
                    else if ($subject === 'Java'and $subject_level === 'High') { $java_score += 15; $CJH +=1; }
                    else {Session::flash('message', 'One Subject not found'); } 
                }
                
                $newindex++; // To increment answers array
            }
            else {
                // echo "One question not found";
                Session::flash('message', 'One question not found. check db for errors'); 
            }
        }

        $ml_eval = ($ml_score)/3;
        $dsa_eval = ($dsa_score)/3;
        $java_eval = ($java_score)/3;

        $array = array("Machine Learning"=>$ml_eval, "Data Structures"=>$dsa_eval, "Java"=>$java_eval);
        asort($array);
        $first_priority = array_key_last($array);
        //echo $first_priority;
        $first_priority_key = last($array);
        //echo $first_priority_key;
        $view_array= array($first_priority=>$first_priority_key);
        $ml_eq = 3;
        $java_eq = 1;
        $data_struct_eq = 2;
        switch ($first_priority) {
            case "Java":
                $view_java=array('java_eq'=>$java_eq,'CJB'=>$CJB,'CJM'=>$CJM,'CJH'=>$CJH,'avg'=>$first_priority_key);
                #echo '<pre>'; print_r($view_java); echo '</pre>';
            break;
            case "Data Structures":
                $view_dsa=array('dsa_eq'=>$data_struct_eq,'CDB'=>$CDB,'CDM'=>$CDM,'CDH'=>$CDH,'avg'=>$first_priority_key);
                #echo '<pre>'; print_r($view_dsa); echo '</pre>';
            break;
            case "Machine Learning":
                $view_ml=array('ml_eq'=>$ml_eq,'CMB'=>$CMB,'CMM'=>$CMM,'CMH'=>$CMH,'avg'=>$first_priority_key);
                #echo '<pre>'; print_r($view_ml); echo '</pre>';
            break;
            default:
            echo "Retest";
        }
        // Saving scores to db
        $score = new ScoresModel;

        // dd(auth()->user()->id);
        $score->uid = auth()->user()->id;
        
        $score->score_positive = (integer)$score_positive;
        $score->ml_score_positive = (integer)$ml_score;
        $score->dsa_score_positive = (integer)$dsa_score;
        $score->java_score_positive = (integer)$java_score;
        $score->correct_java_basic = (integer)$CJB;
        $score->correct_java_medium = (integer)$CJM;
        $score->correct_java_high = (integer)$CJH;
        $score->correct_ml_basic = (integer)$CMB;
        $score->correct_ml_medium = (integer)$CMM;
        $score->correct_ml_high = (integer)$CMH;
        $score->correct_dsa_basic = (integer)$CDB;
        $score->correct_dsa_medium = (integer)$CDM;
        $score->correct_dsa_high = (integer)$CDH;
        $score->average_score = (float)$first_priority_key;
        $score->java_eq = (integer)$java_eq;
        $score->dsa_eq = (integer)$data_struct_eq;
        $score->ml_eq = (integer)$ml_eq; 
        $score->recommended_course = (string)$first_priority;
        $score->save();
        return view('recommend')->with('data', $view_array);
        // return view('recommend')->with('data', $first_priority_key);

    }
}

<?php

namespace App\Http\Livewire\Teacher\Tables;

use App\Models\Score;
use App\Models\ScoreSubject;
use Livewire\Component;
use Livewire\WithPagination;
use Symfony\Component\CssSelector\Node\FunctionNode;

class StudentsGrading extends Component
{
    use WithPagination;

    public $search = '';
    public $class_participation;
    public $hw ;
    public $midterm ;
    public $slidehandbook;
    public $major_assignment ;
    public $presentation ;
    public $final;
    public $total;



    public $campus = 1;
    public $shift = 1;
    public $grade = 0;
    public $changedProps = [];

    public function updatedSearch($value){

         $this->scores = Score::whereHas('student',function($query)use($value){
            $query->where('name','like','%' . $this->search . '%')
                  ->where('shift_id',$this->shift)
                  ->where('campus_id',$this->campus);
                 
        })->get();

        $this->render();
    }

    public function updatedShift($value){


        $this->scores = Score::whereHas('student',function($query) use($value) {
            $query->where('shift_id', $value);
                 
        })->get(); 
        

    }
    

    public function updatedCampus(){
        $this->scores = Score::whereHas('student',function($query) {
            $query->where('campus_id', $this->campus);
                 
        })->get(); 
    }

    //life cycle
 

    public function updated($key,$value){


        $parts = explode(".",$key);

        if(count($parts) == 3 && $parts[0] == 'scores'){

            array_push($this->changedProps,$parts[2]);
            $this->changedProps = array_unique($this->changedProps);

            $total = 0;
            $class_participation = $this->scores[$parts[1]]['class_participation'];
            $midterm = $this->scores[$parts[1]]['midterm'];
            $slidehandbook = $this->scores[$parts[1]]['slidehandbook'];
            $major_assignment = $this->scores[$parts[1]]['major_assignment'];
            $presentation = $this->scores[$parts[1]]['presentation'];
            $final = $this->scores[$parts[1]]['final'];
            $hw = $this->scores[$parts[1]]['hw'];


            $total = $class_participation + $midterm + $slidehandbook + $major_assignment + $presentation + $final + $hw;
            
            $this->scores[$parts[1]]->total = $total;

            $this->validate();

            $score = Score::where('score_tag',$this->scores[$parts[1]]['score_tag'])->first();
            $score_subject = ScoreSubject::where('score_id', $score->id)->first();
            

            //udpate in database
            if($score){
                $score->update([
                    "$parts[2]" => $value,
                    "total" => $total
                ]);

                $score_subject->update([
                    "grade" => $score->CalculateGrade(),
                ]);
            }
            
          
            
            
        }
        
        
    }

    public function save(){

        // session()->flash('message', 'Post successfully updated.');

        // $this->render();
        // return redirect()->route('teacher.grading');
    }

    public function clearSession(){
        // session()->flush();
        // return redirect()->route('teacher.grading');

    }

    

    public $scores = [''];


    protected $rules =[
        'scores.*.class_participation' => 'required|numeric',
        'scores.*.hw' => 'required|numeric',
        'scores.*.midterm' => 'required|numeric',
        'scores.*.slidehandbook' => 'required|numeric',
        'scores.*.major_assignment' => 'required|numeric',
        'scores.*.presentation' => 'required|numeric',
        'scores.*.final' => 'required|numeric',
        'scores.*.total' => 'required|numeric',
    ];

    public function mount(){

        $this->scores = Score::all();

        //  //binding probs
        //  foreach($this->pre_scores as $index => $score ){
        //     $this->fill(["items.{$index}" => $score]);
        // }

        
    }
  

    public function render()
    {
        return view('livewire.teacher.tables.students-grading');
        
    }

    public $isCheck = false;


   

    
}

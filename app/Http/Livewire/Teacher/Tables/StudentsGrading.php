<?php

namespace App\Http\Livewire\Teacher\Tables;

use App\Models\Score;
use App\Models\ScoreSubject;
use App\Models\Student;
use App\Models\SubjectClass;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use PHPUnit\Framework\MockObject\Builder\Stub;
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


    public $select_class;
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
            $query->where('campus_id', $this->campus);
        })
        ->where('class_tag',$this->select_class)
        ->get(); 
        
    }
    

    public function updatedCampus(){

        $this->scores = Score::whereHas('student',function($query) {
            $query->where('campus_id', $this->campus);
            $query->where('shift_id', $this->shift);
        })
        ->where('class_tag',$this->select_class)
        ->get(); 
    }

    //life cycle
 

    public function updated($key,$value){

        if($value == ''){
            return;
        }
        if($key == 'select_class')
        {
            $this->select_class = $value;
            $this->scores = Score::where('class_tag',$value)->get();
        }

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
        
        // //call methods
        // $this->RefreshStudent($value);
        
    }

    public function RefreshStudent($value){

        if($value != 0){
            $this->students =  $this->SearchStudentWithClassTag($value);
        }
    }

    public function clearSession(){
        // session()->flush();
        // return redirect()->route('teacher.grading');

    }

  

    

    public $scores = [''];
    public $students = [''];
    public $classes = [];

   


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

    
        //user session id for teacher because user type alrady check beforehand
        $this->classes = SubjectClass::where('teacher_id',session('user.id'))->get();



        $this->select_class = $this->classes[0]->class_tag;
        $this->students = $this->SearchStudentWithClassTag($this->select_class);

        //InitializeScore For Student
        $this->InitializeScoreForStudent($this->students,$this->select_class);

        $this->scores = Score::where('class_tag', $this->select_class)->get();
    
        //  //binding probs
        //  foreach($this->pre_scores as $index => $score ){
        //     $this->fill(["items.{$index}" => $score]);
        // }
        
    }
    public function SearchStudentWithClassTag($classtag){

       $students = $this->students = Student::whereHas('student_class',function($query) use($classtag)
        {
            $query->where('class_tag',$classtag);
        })->get();

        return $students;
    }

    public function InitializeScoreForStudent($students,$classtag){

        foreach($students as $student)
        {
            if($student->score == null)
            {
                Score::create([
                    'student_id' => $student->id,
                    'class_tag' => $classtag,
                    'score_tag' => \Illuminate\Support\Str::random(6),
                    'class_participation' => 0,
                    'hw' => 0,
                    'midterm' => 0,
                    'slidehandbook' => 0,
                    'major_assignment' => 0,
                    'presentation' => 0,
                    'final' => 0,
                    'total' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);


                ScoreSubject::create([
                    'subject_id' => 1,
                    'class_tag' => $classtag,
                    'score_id'=> Score::where('class_tag',$classtag)->where('student_id',$student->id)->first()->id,
                    'shift_id' => 1,
                    'grade' => $this->CalculateGrade( Score::where('class_tag',$classtag)->first()->total),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
            

          
        }

    }
    public function CalculateGrade($total):string{

        $grade = '';

        if($total <50 ){
            $grade = 'F';
        }
        if($total>=0 &&$total<=50)
            $grade="E";
        if($total>50 &&$total<=70)
            $grade="D";
        if($total>70 &&$total<=80)
            $grade="C";
        if($total>80 &&$total<=90)
            $grade="B";
        if($total>90 && $total <= 100)
            $grade="A";

        return $grade;
    }
  

    public function render()
    {
        return view('livewire.teacher.tables.students-grading');
        
    }

    public $isCheck = false;
    

    
}

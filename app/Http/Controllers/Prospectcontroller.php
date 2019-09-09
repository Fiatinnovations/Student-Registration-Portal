<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use Auth;
use App\Prospect;
use App\User;
use App\Gender;
use App\Title;
use App\Program;
use App\School;
use App\Commence;
use App\Graduation;


class Prospectcontroller extends Controller
{
    public function index(){
        $user = Auth::User();
        $userProspects = $user->prospects()->get();
        return view('prospects.index', compact('userProspects', 'user'));
    }

    public function createProspect(){
        $genders = Gender::pluck('name', 'id')->all();
        $titles = Title::pluck('name', 'id')->all();
        if(Auth::check()){
            return view('prospects.create', compact('genders', 'titles'));
        }   

    }

     public function store(Request $request){
      

         $this->validate($request, [
           'title_id' => 'required',
           'gender_id' =>'required', 
           'first_name' =>'required',
           'last_name' =>'required',
           'middle_name'=>'required',
           'identification' =>'required|unique:prospects'       
       ]);

         $gender_id = $request['gender_id'];
         $title_id = $request['title_id'];
         $first_name =$request['first_name'];
         $last_name = $request['last_name'];
         $middle_name = $request['middle_name'];
         $identification = $request['identification'];
         $strx = strtolower($request['first_name']); 
         $stry = strtolower($request['last_name']);
         $strz = $strx . $stry ;

         $prospect = new Prospect();
         $prospect->gender_id = $gender_id;
         $prospect->title_id = $title_id;
         $prospect->first_name = $first_name;
         $prospect->last_name = $last_name;
         $prospect->middle_name = $middle_name;
         $prospect->identification = $identification;
         $prospect->slug = preg_replace('/\s+/', '-', $strz);
         
         $prospect->progress = 10;

         if(Auth::check()){
            if($request->user()->prospects()->save($prospect)){
                return redirect()->route('programReg', $prospect->id)->with(['message'=>'Prospect created Successfully']);
                    }
         }

        
    }

    public function show(Request $request, $slug){
        $prospect = Prospect::where('slug', $slug)->first();
        return view('prospects.profile', compact('prospect'));


    }

     public function admission(Request $request, $slug){
        $prospect = Prospect::where('slug', $slug)->first();
        $prospect->update([
            'student' => $request->input('student'),
            'progress' => $request->input('progress')

        ]);
        return redirect()->route('prospect', $prospect->slug)->with(['message'=>'Prospect has been offered an admission']);


    }

    public function editFirst($id){
        $prospect = Prospect::findOrFail($id);
        $programs = Program::pluck('name', 'id')->all();
        if(Auth::check()){
            return view('prospects.program', compact('programs', 'prospect'));

        }

    }


    public function updateFirst(Request $request, $id){
        $this->validate($request, [
            'program_id' => 'required'
        ]);

        $prospect = Prospect::findOrFail($id);
        $prospect->update(
            [
            'program_id' => $request->input('program_id'),
            'progress' => $request->input('progress')
            ]
        );

        if(Auth::check()){
            return redirect()->route('educationUpdate', $prospect->id)->with(['message'=>'Student Program updated successfully']);

        }
        

    }

    public function edu($id){
        $prospect = Prospect::findOrFail($id);
        $commences = Commence::pluck('period', 'id')->all();
        $graduations = Graduation::pluck('period', 'id')->all();
        return view('prospects.portfolio', compact('commences', 'graduations', 'prospect'));
    }

    public function updateEdu(Request $request, $id){
        $this->validate($request, [
            'school_a' => 'required',
            'degree_a' => 'required',
            'field_a' => 'required',
            'commence_id' => 'required',
            'graduation_id'=>'required',
            'grade_a'=>'required',
        ]);

        $prospect = Prospect::findOrFail($id);
        $prospect->update(
            [
                'school_a' => $request->input('school_a'),
                'degree_a' => $request->input('degree_a') ,
                'field_a' =>  $request->input('field_a'),
                'commence_id' => $request->input('commence_id') ,
                'graduation_id'=> $request->input('graduation_id'),
                'grade_a'=> $request->input('grade_a') ,
                'progress' => $request->input('progress')  
            ]
        
        );

        return redirect()->route('documents', $prospect->id)->with(['message' => 'Portfolio updated Successfully']);

    }

    public function documentUpload($id){
        $prospect = Prospect::findOrFail($id);
        return view('prospects.documents', compact('prospect'));

    }

    public function saveCertificates(Request $request, $id){
        
        $this->validate($request, [
            'certificate' => 'required|'
        ]);

        if($request->hasFile('certificate')){
            $allowedFileExtension = ['pdf', 'jpg', 'png', 'docx', 'doc'];
            $file = $request->file('certificate');
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedFileExtension);
            if($check){
                       $file->storeAs('public/uploads/certificates', $filename);
                       $prospect = Prospect::findOrFail($id);
                       $prospect->certificate = $filename;
                       $prospect->save();
                       return redirect()->route('documents', $prospect->id)->with(['message'=>'Certificate uploaded Successfully']);
            
            }else{
                return redirect()->back()->withErrors(['message'=>'Please choose from pdf, jpg, png, docx or doc'])->withInput();
            }

            }
    



    }

     public function saveTranscripts(Request $request, $id){
          $this->validate($request, [
            'transcript' => 'required|'
        ]);

        if($request->hasFile('transcript')){
            $allowedFileExtension = ['pdf', 'jpg', 'png', 'docx', 'doc'];
            $file = $request->file('transcript');
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedFileExtension);
            if($check){
                       $file->storeAs('public/uploads/transcripts', $filename);
                       $prospect = Prospect::findOrFail($id);
                       $prospect->transcript = $filename;
                       $prospect->save();
                       return redirect()->route('documents', $prospect->id)->with(['message'=>'Transcript uploaded Successfully']);
            
            }else{
                return redirect()->back()->withErrors(['message'=>'Please choose from pdf, jpg, png, docx or doc'])->withInput();
            }

            }



    }

     public function saveResume(Request $request, $id){
         $this->validate($request, [
            'resume' => 'required|'
        ]);

        if($request->hasFile('resume')){
            $allowedFileExtension = ['pdf','docx', 'doc'];
            $file = $request->file('resume');
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedFileExtension);
            if($check){
                       $file->storeAs('public/uploads/resumes', $filename);
                       $prospect = Prospect::findOrFail($id);
                       $prospect->resume = $filename;
                       $prospect->save();
                       return redirect()->route('documents', $prospect->id)->with(['message'=>'Resume uploaded Successfully']);
            
            }else{
                return redirect()->back()->withErrors(['message'=>'Please choose from pdf, docx or doc'])->withInput();
            }

            }



    }

     public function saveMotivation(Request $request, $id){
          $this->validate($request, [
            'motive' => 'required|'
        ]);

        if($request->hasFile('motive')){
            $allowedFileExtension = ['pdf', 'docx', 'doc'];
            $file = $request->file('motive');
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedFileExtension);
            if($check){
                       $file->storeAs('public/uploads/motivation', $filename);
                       $prospect = Prospect::findOrFail($id);
                       $prospect->motivation = $filename;
                       $prospect->progress= $request->input('progress');
                       $prospect->save();
                       return redirect()->route('getPayment', $prospect->id)->with(['message'=>'Resume uploaded Successfully']);
            
            }else{
                return redirect()->back()->withErrors(['message'=>'Please choose from pdf, docx or doc'])->withInput();
            }

            }



    }

    public function getPayment($id){
        $prospect = Prospect::findOrFail($id);
        return view('prospects.payment', compact('prospect'));
    }



    public function savePayment(Request $request, $id){
          $this->validate($request, [
            'receipt' => 'required|'
        ]);
        $prospect = Prospect::findOrFail($id);

        if($request->hasFile('receipt')){
            $allowedFileExtension = ['pdf', 'jpg', 'doc', 'docx'];
            $file = $request->file('receipt');
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedFileExtension);
            if($check){
                       $file->storeAs('public/uploads/receipts', $filename);
                       $prospect = Prospect::findOrFail($id);
                       $prospect->receipt = $filename;
                  
                       $prospect->progress= $request->input('progress');
                       $prospect->save();
                       return redirect()->route('admissionOffer', $prospect->id)->with(['message'=>'Payment uploaded Successfully']);
            
            }else{
                return redirect()->back()->withErrors(['message'=>'Please choose from pdf, jpg, docx or doc'])->withInput();
            }

            }

    }

    public function offer($id){
        $prospect = Prospect::findOrFail($id);      
        return view('prospects.offer', compact('prospect'));
    }

    public function updateProspect($id){
         $prospect = Prospect::findOrFail($id);
         $genders = Gender::pluck('name', 'id')->all();
         $titles = Title::pluck('name', 'id')->all();
        return view('prospects.update', compact('prospect', 'titles', 'genders'));
    }

    public function saveProspectUpdate(Request $request, $id){
        $prospect = Prospect::findOrFail($id);
        $prospect->update([
        'gender_id' => $request->input('gender_id'),
        'title_id' => $request->input('title_id'),
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'middle_name' => $request->input('middle_name'),
        'identification' => $request->input('identification')
        ]);

        return redirect()->route('prospects')->with(['message' => 'Updated Successfully']);

    }


    public function delete($id){
        $prospect = Prospect::findOrFail($id);
        $prospect->delete();
        return redirect()->route('prospects')->with(['message' => 'Prospect deleted Successfully']);
    }

    public function students(){
        $prospects = Prospect::all();
        $students = $prospects->where('student', '=', '2');
        return view('students.index', compact('students'));
    }




   
}

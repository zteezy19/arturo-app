<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;

class SubjectController extends Controller
{

    /**
     *
     * @return response()
     */
    public function index()
    {
        $subjects = Subject::all();
        $educatorSubjects = [];
        $studentSubjects = [];

        if(Auth::user()->type != 'Admin'){
            $subjects = Subject::where('status', 'active')->get();
        }

        if(Auth::user()->type == 'Educator'){
            $educatorSubjects = \DB::table('educators_subjects')->where('educator_id', Auth::user()->id)->pluck('subject_id')->toArray();
        }

        if(Auth::user()->type == 'Student'){
            $studentSubjects = \DB::table('students_subjects')->where('student_id', Auth::user()->id)->pluck('subject_id')->toArray();
        }

        return view('subjects.index', compact('subjects', 'educatorSubjects', 'studentSubjects'));
    }

    /**
     *
     * @return response()
     */
    public function create()
    {
        return view('subjects.create');
    }

    /**
     *
     * @return response()
     */
    public function postCreate(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
    
        $data = $request->all();

        $subject = Subject::create([
            'name' => $data['name'],
            'status' => $data['status']
        ]);

        return redirect()->route('subjects.index')->with('Great! You have Successfully Created Subject');
    }

    /**
     *
     * @return response()
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
    
        $data = $request->all();

        $subject = Subject::where('id', $id)
            ->update([
            'name' => $data['name'],
            'status' => $data['status']
        ]);

        return redirect()->route('subjects.index')->with('Great! You have Successfully Created Subject');
    }

    /**
     *
     * @return response()
     */
    public function view($id)
    {
        $subject = Subject::whereId($id)->first();
        $studentIds = \DB::table('students_subjects')->where('subject_id', $id)->pluck('student_id')->toArray();

        $students = User::whereIn('id', $studentIds)->get();
        $availableStudents = User::whereNotIn('id', $studentIds)->where('type', 'Student')->get();

        return view('subjects.view', compact('subject', 'students', 'availableStudents'));
    }

    /** 
     *
     * @return response()
     */
    public function edit($id)
    {
        $subject = Subject::whereId($id)->first();

        return view('subjects.edit', compact('subject'));
    }

    /**
     *
     * @return response()
     */
    public function teach($id)
    {
        $userId = Auth::user()->id;
    
        \DB::table('educators_subjects')->insert([
            'educator_id' => $userId,
            'subject_id' => $id
        ]);

        return redirect()->route('subjects.index')->with('Great! You have Successfully Teaching Subject');
    }


    /**
     *
     * @return response()
     */
    public function unteach($id)
    {
        $userId = Auth::user()->id;
    
        \DB::table('educators_subjects')->where([
            'educator_id' => $userId,
            'subject_id' => $id
        ])->delete();
        
        return redirect()->route('subjects.index')->with('Great! You have Successfully Stopped Teaching Subject');
    }

        /**
     *
     * @return response()
     */
    public function enroll($id)
    {
        $userId = Auth::user()->id;
    
        \DB::table('students_subjects')->insert([
            'student_id' => $userId,
            'subject_id' => $id
        ]);

        return redirect()->route('subjects.index')->with('Great! You have Successfully Enrolled Subject');
    }


    /**
     *
     * @return response()
     */
    public function unenroll($id)
    {
        $userId = Auth::user()->id;
    
        \DB::table('students_subjects')->where([
            'student_id' => $userId,
            'subject_id' => $id
        ])->delete();
        
        return redirect()->route('subjects.index')->with('Great! You have Successfully Dropped Out a Subject');
    }

    /**
     *
     * @return response()
     */
    public function kick($subjectId, $studentId)
    {
    
        \DB::table('students_subjects')->where([
            'student_id' => $studentId,
            'subject_id' => $subjectId
        ])->delete();
        
        return redirect()->route('subjects.view', $subjectId)->with('Great! You have Successfully Kicked a Student');
    }

    /**
     *
     * @return response()
     */
    public function enrollStudent($subjectId, $studentId)
    {
    
        \DB::table('students_subjects')->insert([
            'student_id' => $studentId,
            'subject_id' => $subjectId
        ]);
        
        return redirect()->route('subjects.view', $subjectId)->with('Great! You have Successfully Enrolled a Student');
    }


        /** 
     *
     * @return response()
     */
    public function search()
    {
        return view('subjects.search');
    }

    /**
    *
     * @return response()
     */
    public function searchPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $subjects = Subject::where('name', 'like', '%'.$request->name.'%')
            ->get();

        return view('subjects.searchResult', compact('subjects'));
    }
}

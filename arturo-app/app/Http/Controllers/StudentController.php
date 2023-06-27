<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class StudentController extends Controller
{

    /**
     *
     * @return response()
     */
    public function index()
    {
        $students = User::where('type', 'Student')->get();

        return view('students.index', compact('students'));
    }

    /**
     *
     * @return response()
     */
    public function create()
    {
        return view('students.create');
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

        $Student = Student::create([
            'name' => $data['name'],
            'status' => $data['status']
        ]);

        return redirect()->route('students.index')->with('Great! You have Successfully Created Student');
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

        $Student = Student::where('id', $id)
            ->update([
            'name' => $data['name'],
            'status' => $data['status']
        ]);

        return redirect()->route('students.index')->with('Great! You have Successfully Created Student');
    }


    /**
     *
     * @return response()
     */
    public function view($id)
    {
        $student = User::whereId($id)->first();

        return view('students.view', compact('student'));
    }

    /**
     *
     * @return response()
     */
    public function search()
    {
        return view('students.search');
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

        $students = User::where('type', 'Student')
            ->where('name', 'like', '%'.$request->name.'%')
            ->get();

        return view('students.searchResult', compact('students'));
    }
}

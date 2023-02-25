<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Session;
use App\Models\User;
use App\Models\Attentance;




class attendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function attendance()
    {
        return view('attendance.attendance', [
            'grades' => Grade::all(),
            'sessions' => Session::with('attentances', 'grade', 'grade.users')->get(),
            'users' => User::all()
        ]);
    }

    public function Grade($id)
    {
        return view('attendance.ShowPage.grade', ['grades' => grade::findorfail($id)]);
    }

    public function Session($id)
    {
        return view('attendance.ShowPage.session', ['sessions' => session::findorfail($id)]);
    }
    public function create_session()
    {
        $grades = Grade::all();

        return view('attendance.create.create-session' , compact('grades'));
    }

    public function CreateGrade(Request $request)
    {
        Grade::create(['title' => $request->title]);
        return redirect('/attendance');
    }

    public function CreateSession(Request $request  )
    {
        // dd($request->file);

        if ($request->grade_id == '0') {
            return redirect()->back();
        }else{

            if ($request->file == null) {
                $validated = $request->validate([
                    'title' => ['required'],
                    'body' => ['required'],
                    'grade_id' => ['required'],
                    'point' => ['required'],
                ]);

                Session::create([
                    'title' =>   $validated['title'], 'body' => $validated['body'],
                    'grade_id' =>   $validated['grade_id'], 'point' => $validated['point'],
                ]);
            } else {
                $validated = $request->validate([
                    'title' => ['required'],
                    'body' => ['required'],
                    'grade_id' => ['required'],
                    'point' => ['required'],
                    'file' => ['required'],
                ]);

                // dd($validated['file']);
                $file_extension = $validated['file']->getClientOriginalExtension();
                $filename = time() . '.' . $file_extension;
                $path = 'images\session';
                $file = $validated['file']->move($path, $filename);
                Session::create([
                    'title' =>   $validated['title'], 'body' => $validated['body'],
                    'grade_id' =>   $validated['grade_id'], 'point' => $validated['point'],
                    'file' => $file,
                ]);
            }}

        return redirect('/attendance');
    }

    public function CollectAttendance(Request $request)
    {
        if ($request->session_id == '0') return redirect()->back();
        $allowedUsers = Session::find($request->session_id)->grade->users;
        foreach ($request->users as $userId) {
            foreach ($allowedUsers as $user) {
                if ($userId == $user->id) Attentance::create(['session_id' => $request->session_id, 'user_id' => $userId]);
            }
        }

        return redirect('/attendance');
    }
}

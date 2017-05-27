<?php

namespace App\Http\Controllers;

use App\Helpers\ExportClass;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Students;


class ExportController extends Controller
{

    public function welcome()
    {
        return view('hello');
    }

    /**
     * View all students found in the database
     */
    public function viewStudents()
    {
        $students = Students::with('course')->get();
        return view('view_students', compact(['students']));
    }

    public function viewAttendence()
    {
        $courses = Course::all()->load('students');
        return view('view_courses',compact(['courses']));
    }


    /**
     * Exports all student data to a CSV file
     */
    public function exportStudentsToCSV(Request $request, ExportClass $exportClass)
    {
        //Getting all IDs that were checked
        $arrayOfids = explode(",",$request->input('arrayOfids'));

        return response()->download($exportClass->exportStudentsToCsv($arrayOfids));

    }

    /**
     * Exports the total amount of students that are taking each course to a CSV file
     */

    public function exporttCourseAttendenceToCSV(Request $request, ExportClass $exportClass)
    {
        //Getting all IDs that were checked
        $arrayOfids = explode(",",$request->input('arrayOfids'));

        return response()->download($exportClass->exportCoursesToCsv($arrayOfids));
    }
}

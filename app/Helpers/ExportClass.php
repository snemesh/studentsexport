<?php

namespace App\Helpers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Course;

/**
 * Created by PhpStorm.
 * User: sergeynemesh
 * Date: 28.05.17
 * Time: 12:33
 */


class ExportClass
{

    private $glue = ";";

    /**
     * @param string $glue
     */
    public function setGlue($glue)
    {
        $this->glue = $glue;
    }

    /**
     * @return string
     */
    public function getGlue()
    {
        return $this->glue;
    }

    public function exportStudentsToCsv($ids)
    {
        //It was chose all records?
        $itWasCheckedAll = array_search("on",$ids);

        if ($itWasCheckedAll !== false){

            //Deleting first element
            unset($ids[$itWasCheckedAll]);

        };

        //Getting all students with their course
        $students = Students::with('course')->find($ids)->toArray();

        //To redefine $glue parameter use setGlue($glue) and new string value
        $glue = $this->getGlue();

        //Setting header for .csv table
        $headerForTable = array('First Name', 'Last Name', 'Email','University','Course');

        //Setting output data that we will take to file later
        $output = implode($glue, $headerForTable) . "\n";

        //Adding rows to output
        foreach ($students as $row) {
            // iterate over each tweet and add it to the csv
            $output .=  implode($glue, array($row['firstname'], $row['surname'], $row['email'], $row['course']['university'], $row['course']['course_name']))."\n"; // append each row
        }

        //Setting filename for exporting
        $fileName = 'Students.csv';

        //Setting path where we are going to store our file
        $pathToFile = storage_path().'/app/public/'.$fileName;

        //Creating new file if it's not exist
        $file = fopen($pathToFile, 'w');

        //Write output to just created file
        fwrite($file, $output);

        //Closing descriptor
        fclose($file);


        return $pathToFile;

    }

    public function exportCoursesToCsv($ids)
    {

        //It was chose all records?
        $itWasCheckedAll = array_search("on",$ids);

        if ($itWasCheckedAll !== false){

            //Deleting first element
            unset($ids[$itWasCheckedAll]);

        };

        //Getting all students with their course
        $courses = Course::all()->load('students')->find($ids)->toArray();

        //To redefine $glue parameter use setGlue($glue) and new string value
        $glue = $this->getGlue();

        //Setting header for .csv table
        $headerForTable = array('Course name', 'Number of students');

        //Setting output data that we will take to file later
        $output = implode($glue, $headerForTable) . "\n";

        //Adding rows to output
        foreach ($courses as $course) {
            // iterate over each tweet and add it to the csv
            $output .=  implode($glue, array($course['course_name'], count($course['students']) ))."\n"; // append each row
        }

        //Setting filename for exporting
        $fileName = 'CourseAttandence.csv';

        //Setting path where we are going to store our file
        $pathToFile = storage_path().'/app/public/'.$fileName;

        //Creating new file if it's not exist
        $file = fopen($pathToFile, 'w');

        //Write output to just created file
        fwrite($file, $output);

        //Closing descriptor
        fclose($file);

        return $pathToFile;

    }

}
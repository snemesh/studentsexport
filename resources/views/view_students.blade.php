@extends('layouts.app')
    @section('content')
        {!! Form::open(array('url' => '/exportstudents', 'method' => 'post')) !!}
        <div class="header">
            {{--<div><img src="/images/logo_sm.jpg" alt="Logo" title="logo"></div>--}}
            <div  style='margin: 10px;  text-align: left'>

                <input type="submit" id="checkid" value="Export" href="exportstudents">
                <button><a href="/exportcourses"> >>> Attendence</a></button>
                <input type="hidden" id="arrayOfids" name="arrayOfids" value="">
            </div>
        </div>

        <div style='margin: 10px; text-align: center;'>
            <table class="student-table">
                <tr>
                    <th><input id="checkAll" type="checkbox" class="chk-all chk"></th>
                    <th>First name</th>
                    <th>Last ame</th>
                    <th>Email</th>
                    <th>University</th>
                    <th>Course</th>
                </tr>

                @if(  count($students) > 0 )
                    @foreach($students as $student)
                        <tr>
                            <td><input id="check" type="checkbox" name="body" value="{{$student['id']}}"></td>
                            <td style=' text-align: left;'>{{$student['firstname']}}</td>
                            <td style=' text-align: left;'>{{$student['surname']}}</td>
                            <td style=' text-align: left;'>{{$student['email']}}</td>
                            <td style=' text-align: left;'>{{$student['course']['university']}}</td>
                            <td style=' text-align: left;'>{{$student['course']['course_name']}}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" style="text-align: center">Oh dear, no data found.</td>
                    </tr>
                @endif
            </table>
        </div>
        {!! Form::token() . Form::close() !!}
    @endsection()
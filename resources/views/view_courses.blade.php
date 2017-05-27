@extends('layouts.app')
@section('content')
    {!! Form::open(array('url' => '/exportcourses', 'method' => 'post')) !!}
    <div class="header">
        {{--<div><img src="/images/logo_sm.jpg" alt="Logo" title="logo"></div>--}}
        <div  style='margin: 10px;  text-align: left'>

            <input type="submit" id="checkid" value="Export..." href="attendence">
            <button><a href="/view"> >>> Students</a></button>
            <input type="hidden" id="arrayOfids" name="arrayOfids" value="">
        </div>
    </div>

    <div style='margin: 10px; text-align: center;'>
        <table class="student-table">
            <tr>
                <th><input id="checkAll" type="checkbox" class=chk-all></th>
                <th>Course name</th>
                <th>University name</th>
                <th>Total students</th>
            </tr>

            @if(  count($courses) > 0 )
                @foreach($courses as $course)
                    <tr>
                        <td><input id="check" type="checkbox" name="body" value="{{$course['id']}}"></td>
                        <td style=' text-align: left;'>{{$course['course_name']}}</td>
                        <td style=' text-align: left;'>{{$course['university']}}</td>
                        <td style=' text-align: left;'>{{$course->students->count()}}</td>

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

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Export data</title>

    </head>

    <body>
        {!! Form::open(array('url' => '/exportstudents', 'method' => 'post')) !!}
        <div class="header">
            {{--<div><img src="/images/logo_sm.jpg" alt="Logo" title="logo"></div>--}}
            <div  style='margin: 10px;  text-align: left'>

                <input type="submit" id="checkid" value="Export" href="exportstudents">
                <a href="/attendence">Attendence</a>
                <input type="hidden" id="arrayOfids" name="arrayOfids" value="">
            </div>
        </div>

            <div style='margin: 10px; text-align: center;'>
                <table class="student-table">
                    <tr>
                        <th><input id="checkAll" type="checkbox" class=chk-all value="0"></th>
                        <th>Forename</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>University</th>
                        <th>Course</th>
                    </tr>

                    @if(  count($students) > 0 )
                    @foreach($students as $student)
                    <tr>
                        <td><input id="check" type="checkbox" name="studentId" value="{{$student['id']}}"></td>
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

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/myscript.js') }}"></script>

    </body>

</html>

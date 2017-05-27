@extends('layouts.app')
    @section('content')
        <div class="row">
            <div class="col-lg-12">

                <h1>Welcome to the export challenge.</h1>

                <div class="block-1">
                    <p>What we have here is an incomplete export system based on a small set of student data. The mission, if you choose to accept it, is to fill in the missing parts and finish the application to the best of your ability. How you do this is completely down to you and we have only provided the bare bones. </p>
                    <p>There is no right or wrong however we would prefer you didn't rely on third party packages, don't be afraid to impress us. Although this is a relatively small task we believe there is enough here for you to be able to demonstrate your ability to follow best practices and show your understanding of the Laravel framework.</p>
                    <p>Oh and there may be some 'deliberate' errors in the code... Enjoy.</p>
                </div>

                <p><a href="{{url('view')}}" title="task">Click <span>here</span> to continue to the challenge</a></p>

            </div>
        </div>


    @endsection




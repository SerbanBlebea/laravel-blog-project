@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="jumbotron p-5">
                @include('partials._page-title', [
                    'title' => 'Ever been stuck on some piece of code with no solution in sight?',
                    'subtitle' => '...the solution is just 2 clicks away'
                ])
            </div>

            <div class="row">
                @foreach($categories as $category)

                    <div class="col-md-6 mb-3 animated fadeIn delay-1">
                        @include('partials._category-card')
                    </div>

                @endforeach
            </div>

        </div>
    </div>

</div>
@endsection

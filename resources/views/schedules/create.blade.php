@extends('layouts._admin')

@section('admin_panel')

@include('partials.titles._page-title', ['title' => 'Schedule'])

<div class="row justify-content-center">
    <div class="card col-md-8">
        <div class="card-body">
            <form action="{{ route('schedule.store') }}" method="POST">
                @csrf

                @include('forms._create-schedule-form')

                <div class="mt-5">
                    @include('partials._form-button', ['cta' => 'Save'])
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

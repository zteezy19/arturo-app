@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
  
                    @if(auth()->user()->type == 'Admin')
                        
                        <a href="{{ route('educators.index') }}" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                            Educators
                        </a>
                        <a href="{{ route('students.index') }}" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                            Students
                        </a>
                        <a href="{{ route('subjects.index') }}" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                            Subjects
                        </a>
                    @endif

                    @if(auth()->user()->type == 'Educator')
                        <a href="{{ route('students.index') }}" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                            Students
                        </a>
                        <a href="{{ route('subjects.index') }}" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                            Subject
                        </a>
                    @endif

                    @if(auth()->user()->type == 'Student')
                        <a href="{{ route('subjects.index') }}" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                            Subjects
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('students') }}</div>
  
                <div class="card-body">
                    @if(auth()->user()->type == 'Admin')
                        <a href="{{ route('students.create') }}" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                            Create Student
                        </a>
                    @endif
                        <a href="{{ route('students.search') }}" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                            Search Student
                        </a>
                <table id="students-table" class="datatable table table-bordered table-striped table-custom">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
            
                    <tbody class="tbody-custom">
                        @foreach($students as $student)
                            <tr>
                                <td> {{ $student->name }} </td>
                                <td>        
                                    @if(auth()->user()->type == 'Admin')
                                        <a href="{{ route('students.view', $student) }}" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                                            Edit
                                        </a>
                                    @endif 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
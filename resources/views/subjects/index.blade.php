@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Subjects') }}</div>
  
                <div class="card-body">
                    @if(auth()->user()->type == 'Admin')
                        <a href="{{ route('subjects.create') }}" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                            Create Subject
                        </a>
                    @endif
                    <a href="{{ route('subjects.search') }}" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                        Search Subject
                    </a>
                <table id="subjects-table" class="datatable table table-bordered table-striped table-custom">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
            
                    <tbody class="tbody-custom">
                        @foreach($subjects as $subject)
                            <tr>
                                <td> {{ $subject->name }} </td>
                                <td> {{ $subject->status }}  </td>
                                <td>        
                                    @if(auth()->user()->type == 'Admin')
                                        <a href="{{ route('subjects.edit', $subject) }}" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                                            Edit
                                        </a>
                                        <a href="{{ route('subjects.view', $subject) }}" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                                            View
                                        </a>
                                    @endif
                                    @if(auth()->user()->type == 'Educator')
                                        @if(in_array($subject->id, $educatorSubjects))
                                            <a href="{{ route('subjects.view', $subject) }}" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                                                View
                                            </a>
                                            <a href="{{ route('subjects.unteach', $subject) }}" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                                                Unteach
                                            </a>
                                            
                                        @else
                                            <a href="{{ route('subjects.teach', $subject) }}" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                                                Teach
                                            </a>
                                        @endif 
                                    @endif 
                                    @if(auth()->user()->type == 'Student')
                                        @if(in_array($subject->id, $studentSubjects))
                                            <a href="{{ route('subjects.unenroll', $subject) }}" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                                                Withdraw
                                            </a>
                                        @else
                                            <a href="{{ route('subjects.enroll', $subject) }}" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                                                Enroll
                                            </a>
                                        @endif 
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
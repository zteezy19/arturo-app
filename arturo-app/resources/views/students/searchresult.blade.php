@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Search Results') }}</div>
  
                <div class="card-body">
                    <a href="{{ route('students.search') }}" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                        Search Again
                    </a>
                    @if(count($students) != 0)
                        <table id="students-table" class="datatable table table-bordered table-striped table-custom">
                            <thead>
                                <tr>
                                    <th>Name</th>
            
                                </tr>
                            </thead>
                    
                            <tbody class="tbody-custom">
                                @foreach($students as $student)
                                    <tr>
                                        <td> {{ $student->name }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        No Students Found
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
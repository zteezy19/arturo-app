@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Search Results') }}</div>
  
                <div class="card-body">
                    <a href="{{ route('subjects.search') }}" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                        Search Again
                    </a>
                    @if(count($subjects) != 0)
                        <table id="subjects-table" class="datatable table table-bordered table-striped table-custom">
                            <thead>
                                <tr>
                                    <th>Name</th>
            
                                </tr>
                            </thead>
                    
                            <tbody class="tbody-custom">
                                @foreach($subjects as $student)
                                    <tr>
                                        <td> {{ $student->name }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        No subjects Found
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
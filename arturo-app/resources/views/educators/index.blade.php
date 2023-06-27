@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Educators') }}</div>
  
                <div class="card-body">

                <table id="subjects-table" class="datatable table table-bordered table-striped table-custom">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
            
                    <tbody class="tbody-custom">
                        @foreach($educators as $educator)
                            <tr>
                                <td> {{ $educator->name }} </td>
                                <td>        
                                    @if(auth()->user()->type == 'Admin')
                                        <a href="{{ route('educators.view', $educator) }}" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
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
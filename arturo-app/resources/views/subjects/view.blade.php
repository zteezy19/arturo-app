@extends('layout')
@section('content')

<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">View</div>
                  <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <span type="text">{{ $subject->name }} </span>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
                            <div class="col-md-6">
                                <span type="text" >{{ $subject->status }} </span>
                            </div>
                        </div>                        
                  </div>
                  <div class="card">
                  <div class="card-header">Class List</div>
                  <div class="card-body">
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
                                        @if(auth()->user()->type != 'Student')
                                            <a href="{{ route('subjects.kick', [$subject->id, $student->id]) }}" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                                                Withdraw
                                            </a>
                                        @endif 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>

                  <div class="card-header">Available Students</div>
                  <div class="card-body">
                    <table id="students-table" class="datatable table table-bordered table-striped table-custom">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                
                        <tbody class="tbody-custom">
                            @foreach($availableStudents as $student)
                                <tr>
                                    <td> {{ $student->name }} </td>
                                    <td>        
                                        @if(auth()->user()->type != 'Student')
                                            <a href="{{ route('subjects.enrollStudent', [$subject->id, $student->id]) }}" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                                                Enroll
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
</main>
@endsection
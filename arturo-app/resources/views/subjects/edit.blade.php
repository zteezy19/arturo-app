@extends('layout')
@section('content')

<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">View</div>
                  <div class="card-body">
  
                      <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                              <div class="col-md-6">
                                  <input type="text" id="name" class="form-control" name="name" value='{{ $subject->name }} 'required autofocus>
                                  @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                              </div>
                          </div>
  
  
                          <div class="form-group row">
                              <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
                              <div class="col-md-6">

                                <select name="status" id="status">
                                    <option value="Active" @if($subject->status == 'Active') selected @endif>Active</option>
                                    <option value="Inactive" @if($subject->status == 'Inactive') selected @endif>Inactive</option>
                                    <option value="Removed" @if($subject->status == 'Removed') selected @endif>Removed</option>
                                </select>   
                              </div>
                          </div>
  
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Update
                              </button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection
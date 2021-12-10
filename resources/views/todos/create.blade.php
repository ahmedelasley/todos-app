@extends('layouts.app')
@section('title', 'Create Todo')
@section('content')

    <div class="container pt-5">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1>Create a New Todo</h1>
                    </div>
                    <div class="card-body">
                    
                        <form action="/create" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="todoTitle" class="form-control" placeholder="Enter Todo Title" class="@error('todoTitle') is-invalid @enderror" value="{{old('todoTitle')}}">
                            </div>
                            @error('todoTitle')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="todoDescription" placeholder="Enter Todo Description"  class="@error('todoDescription') is-invalid @enderror">{{old('todoDescription')}}</textarea>
                            </div>
                            @error('todoDescription')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success" style="width:40%">Create Todo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Employee</div>
                <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- <form method="post" action="{{ route('employees.update', $employee->id)}}"> --}}
                {!! Form::open([
                'url' => route('employees.update', $employee->id),
                'method' => 'post'
                ])!!}
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        {{-- <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" value="{{ $employee->first_name }}"> --}}
                        {!!Form::text('first_name', '$employee->first_name',[
                                'id' => "first_name", 'class' => "form-control", 'placeholder' => ""
                            ])!!}
                        @error('first_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        {{-- <input type="text" class="form-control" id="last_name" name="last_name" placeholder="" value="{{ $employee->last_name }}"> --}}
                        {!!Form::text('last_name', '$employee->last_name',[
                            'id' => "last_name", 'class' => "form-control", 'placeholder' => ""
                        ])!!}
                        @error('last_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="company_id">Company</label>
                        <select id="company_id" name="company_id" class="custom-select">
                            @foreach ($companies as $company)
                            <option value="{{ $company->id }}" {{ $company->id === $employee->company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                            @endforeach
                        </select>
                        @error('company_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        {{-- <input type="email" class="form-control" id="email" name="email" placeholder="" value="{{ $employee->email }}"> --}}
                        {!!Form::email('email', '$employee->email',[
                            'id' => "email", 'class' => "form-control", 'placeholder' => ""
                        ])!!}
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        {{-- <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="{{ $employee->phone }}"> --}}
                        {!!Form::text('phone', '$employee->phone',[
                            'id' => "phone", 'class' => "form-control", 'placeholder' => ""
                        ])!!}
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                {{-- </form> --}}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

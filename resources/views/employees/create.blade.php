@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Employee</div>
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

                    {{-- <form method="post" action="{{ route('employees.store')}}"> --}}
                    {!! Form::open([
                    'url' => route('employees.store'),
                    'method' => 'post'
                    ]) !!}
                        @csrf
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            {{-- <input type="text" class="form-control" id="first_name" name="first_name" placeholder=""> --}}
                            {!!Form::text('first_name', '',[
                                'id' => "first_name", 'class' => "form-control", 'placeholder' => ""
                            ])!!}
                            @error('first_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            {{-- <input type="text" class="form-control" id="last_name" name="last_name" placeholder=""> --}}
                            {!!Form::text('last_name', '',[
                                'id' => "last_name", 'class' => "form-control", 'placeholder' => ""
                            ])!!}
                            @error('last_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="company_id">Company</label>
                            <select id="company_id" name="company_id" class="custom-select">
                                <option selected disabled value="">Select company</option>
                                @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                            @error('company_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            {{-- <input type="email" class="form-control" id="email" name="email" placeholder=""> --}}
                            {!!Form::email('email', '',[
                                'id' => "email", 'class' => "form-control", 'placeholder' => ""
                            ])!!}

                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            {{-- <input type="text" class="form-control" id="phone" name="phone" placeholder=""> --}}
                            {!!Form::text('phone', '',[
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
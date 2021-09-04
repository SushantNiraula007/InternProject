@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Company</div>
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

                    {{-- <form method="post" action="{{ route('companies.store') }}" enctype="multipart/form-data"> --}}
                    {!! Form::open([
                        'url' => route('companies.store'),
                        'method' => 'post',
                        'enctype' => 'multipart/form-data'
                    ]) !!}
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            {{-- <input type="text" class="form-control" id="name" name="name" placeholder=""> --}}
                            {!!Form::text('name', '',[
                                'id' => "name", 'class' => "form-control", 'placeholder' => ""
                            ])!!}
                            @error('name')
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
                            <label for="logo">Logo</label>
                            {{-- <input type="file" class="form-control-file" id="logo" name="logo"> --}}
                            {!!Form::file('logo', '',[
                                'id' => "logo", 'class' => "form-control-file"
                            ])!!}
                            @error('logo')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            {{-- <input type="url" class="form-control" id="website" name="website" placeholder=""> --}}
                            {!!Form::url('website', '',[
                                'id' => "website", 'class' => "form-control", 'placeholder' => ""
                            ])!!}
                            @error('website')
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
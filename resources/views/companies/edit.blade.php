@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Company</div>
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

                    {{-- <form method="post" action="{{ route('companies.update', $company->id)}}" enctype="multipart/form-data"> --}}
                    {!! Form::open([
                        'url' => route('companies.update', $company->id),
                        'method' => 'post',
                        'enctype' => 'multipart/form-data'
                    ]) !!}
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            {{-- <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ $company->name }}"> --}}
                            {!!Form::text('name', '$company->name',[
                                'id' => "name", 'class' => "form-control", 'placeholder' => ""
                            ])!!}
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $company->email }}">
                            {!!Form::text('email', '$company->email',[
                                'id' => "email", 'class' => "form-control"
                            ])!!}
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <img alt="" class="img-fluid" src="{{ $company->logo_url }}" />
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
                            {{-- <input type="url" class="form-control" id="website" name="website" value="{{ $company->website }}"> --}}
                            {!!Form::url('website', '$company->website',[
                                'id' => "website", 'class' => "form-control"
                            ])!!}
                            @error('website')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                         {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                    {{-- </form> --}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
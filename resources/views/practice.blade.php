{!!Form::text('name', '$company->name',[
    'id' => "name" 'required' => "" 'placeholder' => ""
])!!}

{!!Form::password('password', '',[
'id' => "password" 'class' => "form-control @error('password') is-invalid @enderror" 'required autocomplete' => "current-password"
])!!}


{!! Form::open([
    'url' => route('password.email'),
    'method' => 'POST'
]) !!}

{{-- </form> --}}
{!! Form::close() !!}
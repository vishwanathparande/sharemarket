@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Video') }}</div>

                <div class="card-body">
                    {{ Form::open(array('url' => 'files','files'=>'true')) }}

                    <div class="form-group row">
                        <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('File Name') }}</label>
                        <div class="col-md-8">
                            <input id="name" type="text" placeholder="File Name" class="form-control input-circle {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}">

                            @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-3 col-form-label text-md-right">{{ __('Description') }}</label>
                        <div class="col-md-8">
                            <input id="description" type="text" placeholder="description" class="form-control input-circle {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}">

                            @if ($errors->has('description'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="file" class="col-md-3 col-form-label text-md-right">{{ __('File') }}</label>
                        <div class="col-md-8">
                            <input id="file" type="file" style="border:0" accept="video/*" capture=camcorder" class="form-control {{ $errors->has('file') ? ' is-invalid' : '' }}" name="file" value="{{ old('file') }}">

                            @if ($errors->has('file'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('file') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <!--<div class="form-group">
                        {{ Form::label('nerd_level', 'Nerd Level') }}
                        {{ Form::select('nerd_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), Input::old('nerd_level'), array('class' => 'form-control')) }}
                    </div>-->

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            {{ Form::submit('Add Video', array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>

                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

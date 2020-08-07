@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Создать маркер</div>
                    <div class="card-body">
                        <object-edit-form
                            @if ($errors->any()) server_errors="{{ collect($errors->all()) }}" @endif
                            _name='{{ $marker->name }}'
                            _desc="{{ $marker->desc }}"
                            _coords="{{ $marker->coords }}"
                            _status="{{ $marker->status }}"
                            _id="{{ $marker->id }}"
                        ></object-edit-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

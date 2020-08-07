@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Создать маркер</div>
                    <div class="card-body">
                        <object-create-form @if ($errors->any()) :server_errors="{{ collect($errors->all()) }}" @endif></object-create-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

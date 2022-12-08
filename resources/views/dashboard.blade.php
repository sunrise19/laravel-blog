@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1>
                {{ $user->name}}
            </h1>
            <h3>
                {{ $user->email}}
            </h3>
        </div>
    </div>

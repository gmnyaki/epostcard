<!-- resources/views/recipients/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div id="app">
        <recipient-form></recipient-form> <!-- Vue component -->
    </div>
@endsection

@section('scripts')
    
    @vite('resources/js/app.js')

@endsection
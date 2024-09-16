@extends('layouts.master_admin')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

@endsection

@section('title')
    jobs 
@endsection

@section('content')
        @livewire('job-admin')
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>

@endsection
@section('js')
@endsection
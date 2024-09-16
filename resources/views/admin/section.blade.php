@extends('layouts.master_admin')
@section('css')
    
    <style>
        .navbar-custom {
            background-color: #343a40;
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #ffffff;
        }

        .navbar-custom .nav-link:hover {
            color: #d4d4d4;
        }
    </style>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('title')
    section 
@endsection

@section('content')
        @livewire('SectionJob')
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>

@endsection
@section('js')
<script>
  window.addEventListener('close-modal', event => {
      $('#addSectionModal').modal('hide');
      $('#updateSectionModal').modal('hide');
      $('#deleteSectionModal').modal('hide');
  });
</script>
@endsection
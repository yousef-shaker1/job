@extends('layouts.master_admin')
@section('css')
    <style>
      .btn-custom {
    width: 100px; /* أو القيمة التي تحتاجها */
    height: 40px; /* أو القيمة التي تحتاجها */
}

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

@endsection

@section('title')
    hr 
@endsection

@section('content')
        @livewire('blog-admin')
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>

@endsection
@section('js')
<script>
  window.addEventListener('close-modal', event => {
      $('#addBlogModal').modal('hide');
      $('#updateBlogModal').modal('hide');
      $('#deleteBlogModal').modal('hide');
  });
</script>
@endsection
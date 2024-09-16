@extends('layouts.master_admin')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('title')
show_question 
@endsection

@section('content')
<div class="container mt-5">
  <header class="mb-4">
      <h1 class="text-center">Job Questions</h1>
  </header>
  <main>
      <section>
          <form>
            @csrf
              @csrf
              <div class="mb-4">
                  @foreach($questionsWithOptions as $question)
                      <div class="card mb-3">
                          <div class="card-body">
                              <!-- Display question text -->
                              <div class="mb-3">
                                  <label for="question_{{ $question['id'] }}" class="form-label">{{ $question['question_text'] }}</label>
                              </div>
                              @if($question['question_type'] == 'multiple_choice')
                                  <!-- Display multiple choice options -->
                                  @foreach($question['options'] as $option)
                                      <div class="form-check">
                                          <input type="radio" id="option_{{ $question['id'] }}_{{ $loop->index }}" name="option_{{ $question['id'] }}" value="{{ $option }}" class="form-check-input">
                                          <label for="option_{{ $question['id'] }}_{{ $loop->index }}" class="form-check-label">{{ $option }}</label>
                                      </div>
                                  @endforeach
                              @elseif($question['question_type'] == 'text')
                                  <input type="text" id="question_text_{{ $question['id'] }}" name="question_text_{{ $question['id'] }}" class="form-control">
                              @endif
                          </div>
                      </div>
                  @endforeach
                  <a href="{{ route('jobs_index') }}" class="btn btn-sm btn-info">
                    Back to All Jobs
                </a>
              </div>
          </form>
      </section>
  </main>
  <footer class="text-center mt-4">
      <p>&copy; 2024 Job Site</p>
  </footer>
</div>
@endsection
@section('js')
@endsection
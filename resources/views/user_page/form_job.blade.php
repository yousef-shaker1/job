<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Questions</title>
    <link rel="stylesheet" href="{{URL::asset('assets/css/multi_step_form.css')}}">

</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Job Questions</h1>
        </header>
        <main class="content">
            <section class="job-info">
                <h2> Please answer the questions about the job</h2>
            </section>
            <section class="questions">
              <form id="questions-form" method="POST" action="{{ route('save_request_job') }}">
                @csrf
                <div class="container">
                    @foreach($questionsWithOptions as $question)
                        <div class="question mb-4">
                            <!-- عرض نص السؤال -->
                            <div class="mb-2">
                                <label class="form-label">{{ $question['question_text'] }}</label>
                            </div>
            
                            @if($question['question_type'] == 'multiple_choice')
                                <!-- عرض خيارات الاختيار المتعدد -->
                                @foreach($question['options'] as $option)
                                    <div class="form-check mb-2">
                                        <input type="radio" id="option_{{ $question['id'] }}_{{ $loop->index }}" name="option_{{ $question['id'] }}" value="{{ $option }}" class="form-check-input">
                                        <label for="option_{{ $question['id'] }}_{{ $loop->index }}" class="form-check-label">{{ $option }}</label>
                                    </div>
                                @endforeach
            
                            @elseif($question['question_type'] == 'text')
                                <input type="text" id="question_text_{{ $question['id'] }}" name="question_text_{{ $question['id'] }}" class="form-control">
                            @endif
                        </div>
                    @endforeach
            
                    <!-- زر الإرسال -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
            
            </section>
        </main>
        <footer class="footer">
            <p>&copy; 2024 Job Site</p>
        </footer>
    </div>
    <script src="scripts.js"></script>
</body>
</html>

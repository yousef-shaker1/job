<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Questions</title>
    <link rel="stylesheet" href="styles.css">
    <style>
      body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.header {
    text-align: center;
    padding: 10px 0;
    border-bottom: 1px solid #ddd;
}

.content {
    padding: 20px;
}

.job-info {
    margin-bottom: 20px;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #fafafa;
}

.job-info h2 {
    margin: 0;
    font-size: 20px;
}

.apply-btn {
    background-color: #00bfa6;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.questions {
    margin-top: 20px;
}

.question {
    margin-bottom: 15px;
}

.question label {
    display: block;
    margin-bottom: 5px;
}

.question input {
    width: 2%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 3px;
}

.submit-btn {
    background-color: #007bff;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.footer {
    text-align: center;
    padding: 10px 0;
    border-top: 1px solid #ddd;
    margin-top: 20px;
}

#questions-form {
    max-width: 800px;
    margin: 0 auto;
}

.question {
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 15px;
    background-color: #f9f9f9;
}

.question label {
    font-weight: bold;
}

.form-check {
    margin-bottom: 10px;
}

input[type="text"] {
    width: 95%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
}

.btn {
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    color: white;
    background-color: #007bff;
    cursor: pointer;
}

.btn:hover {
    background-color: #0056b3;
}

    </style>
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

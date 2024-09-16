<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Requests</title>
  <!-- إضافة Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4 text-center">Requests for Job: {{ $job->title }}</h2> <!-- عرض عنوان الوظيفة -->

    <table class="table table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Client Name</th>
                <th>Question</th>
                <th>Answer</th>
            </tr>
        </thead>
        <tbody>
            @php
                $previousUserId = null;
                $userAnswers = collect();
                foreach ($job->questions as $question) {
                    foreach ($question->answers as $answer) {
                        $userAnswers->push($answer);
                    }
                }
                $userAnswers = $userAnswers->groupBy('user_id');
            @endphp

            @foreach ($userAnswers as $userId => $answers)
                @php
                    $user = $answers->first()->user;
                @endphp
                @foreach ($answers as $index => $answer)
                    <tr>
                        @if ($index === 0)
                            {{-- <td rowspan="{{ $answers->count() }}">{{ $user->name }}</td> <!-- اسم العميل --> --}}
                            <td rowspan="{{ $answers->count() }}"> <a href='{{ route('view_profile_user', $user->id) }}'>{{ $user->name }}</a></td>
                        @endif
                        <td>{{ $answer->question->question_text }}</td> <!-- نص السؤال -->
                        <td>
                            @if ($answer->question->question_type === 'text')
                                {{ $answer->text_answer }} <!-- الإجابة النصية -->
                            @else
                                {{ $answer->selected_option }} <!-- الخيار المختار -->
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
  </div>

  <!-- إضافة Bootstrap JS وjQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

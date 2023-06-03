<!DOCTYPE html>
<html>

<head>
    <title>Question List</title>
    <style>
        /* Your CSS styles here */
        .question {
            margin-bottom: 20px;
        }

        .question-header {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .options {
            display: flex;
            flex-direction: column;
        }

        .option {
            margin-bottom: 8px;
        }

        .option input {
            margin-right: 8px;
        }
    </style>
</head>

<body>
    <h1>Question List</h1>

    @foreach ($questions as $question)
    <div class="question">
        <div class="question-header">{{ $question->title }}</div>
        <div class="options">
            @foreach ($question->options()->get() as $option)
            <div class="option">
                <input type="checkbox" name="question_{{ $question->id }}" value="{{ $option->id }}" {{
                    $option->isCorrect ? 'checked' : '' }}>
                <label>{{ $option->name }}</label>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</body>

</html>
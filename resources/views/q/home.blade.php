<div id="content">

    <div class="container">
        {{-- success --}}
        @if (session()->has('SUCCESS_MESSAGE'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('SUCCESS_MESSAGE') }}
        </div>
        @endif
        <h1>Quiz Result</h1>
        <p>Your score: {{ $score }} out of {{ $questions->count() }}</p>
    </div>
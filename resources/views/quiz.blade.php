<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('quiz.result', $quiz->slug) }}">
                @csrf
                @foreach ($quiz->questions as $question)
                    <strong> # {{ $loop->iteration }}.</strong> {{ $question->question }}
                    @if ($question->image)
                        <img src="{{ asset($question->image) }}" style="width: 200px; height: 200px;" class="img-fluid">
                    @endif
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}" value="answer1" required>
                        <label class="form-check-label" for="quiz{{ $question->id }}-1">
                            {{ $question->answer1 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}" value="answer2" required>
                        <label class="form-check-label" for="quiz{{ $question->id }}-2">
                            {{ $question->answer2 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}" value="answer3" required>
                        <label class="form-check-label" for="quiz{{ $question->id }}-3">
                            {{ $question->answer3 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}" value="answer4" required>
                        <label class="form-check-label" for="quiz{{ $question->id }}-4">
                            {{ $question->answer4 }}
                        </label>
                    </div>
                    @if (!$loop->last)
                        <hr>
                    @endif
                @endforeach


                <button type="submit" class="btn btn-primary btn-block">Quiz'i Bitir</button>
            </form>

        </div>
    </div>
</x-app-layout>

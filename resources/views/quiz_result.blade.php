<x-app-layout>
    <x-slot name="header">{{ $quiz->title }} Sonucu</x-slot>

    <div class="card">
        <div class="card-body">
            @foreach ($quiz->questions as $question)
                @if ($question->correct_answer == $question->my_answer->answer)
                    <i class="fa fa-check text-success"></i>
                @else
                    <i class="fa fa-times text-danger"></i>
                @endif
                <strong> # {{ $loop->iteration }}.</strong> {{ $question->question }}
                @if ($question->image)
                    <img src="{{ asset($question->image) }}" style="width: 200px; height: 200px;" class="img-fluid">
                @endif

                <div class="form-check mt-2">
                    <label
                        class="form-check-label @if ($question->correct_answer == 'answer1') text-success fw-bold @endif @if ($question->my_answer->answer == 'answer1' && $question->correct_answer != 'answer1') text-danger @endif"
                        for="quiz{{ $question->id }}-1">
                        {{ $question->answer1 }}
                        @if ($question->correct_answer == 'answer1')
                            <i class="fa fa-check text-success"></i>
                        @endif
                        @if ($question->my_answer->answer == 'answer1' && $question->correct_answer != 'answer1')
                            <i class="fa fa-times text-danger"></i>
                        @endif
                    </label>
                </div>

                <div class="form-check">
                    <label
                        class="form-check-label @if ($question->correct_answer == 'answer2') text-success fw-bold @endif @if ($question->my_answer->answer == 'answer2' && $question->correct_answer != 'answer2') text-danger @endif"
                        for="quiz{{ $question->id }}-2">
                        {{ $question->answer2 }}
                        @if ($question->correct_answer == 'answer2')
                            <i class="fa fa-check text-success"></i>
                        @endif
                        @if ($question->my_answer->answer == 'answer2' && $question->correct_answer != 'answer2')
                            <i class="fa fa-times text-danger"></i>
                        @endif
                    </label>
                </div>

                <div class="form-check">
                    <label
                        class="form-check-label @if ($question->correct_answer == 'answer3') text-success fw-bold @endif @if ($question->my_answer->answer == 'answer3' && $question->correct_answer != 'answer3') text-danger @endif"
                        for="quiz{{ $question->id }}-3">
                        {{ $question->answer3 }}
                        @if ($question->correct_answer == 'answer3')
                            <i class="fa fa-check text-success"></i>
                        @endif
                        @if ($question->my_answer->answer == 'answer3' && $question->correct_answer != 'answer3')
                            <i class="fa fa-times text-danger"></i>
                        @endif
                    </label>
                </div>

                <div class="form-check">
                    <label
                        class="form-check-label @if ($question->correct_answer == 'answer4') text-success fw-bold @endif @if ($question->my_answer->answer == 'answer4' && $question->correct_answer != 'answer4') text-danger @endif"
                        for="quiz{{ $question->id }}-4">
                        {{ $question->answer4 }}
                        @if ($question->correct_answer == 'answer4')
                            <i class="fa fa-check text-success"></i>
                        @endif
                        @if ($question->my_answer->answer == 'answer4' && $question->correct_answer != 'answer4')
                            <i class="fa fa-times text-danger"></i>
                        @endif
                    </label>
                </div>

                @if (!$loop->last)
                    <hr>
                @endif
            @endforeach
        </div>
    </div>
</x-app-layout>

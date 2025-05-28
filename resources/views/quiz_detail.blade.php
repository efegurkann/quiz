<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>

    <div class="card">
        <div class="card-body">
            <p class="card-text">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if ($quiz->my_result)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Puan: </strong>
                            <span class="badge text-bg-primary rounded-pill">{{ $quiz->my_result->point }}</span>
                        </li>
                        @endif
                        @if ($quiz->my_result)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Doğru Yanlış:    </strong>
                            <span class="badge text-bg-primary rounded-pill">{{ $quiz->my_result->correct }} Doğru - {{ $quiz->my_result->wrong }} Yanlış</span>
                        </li>
                        @endif
                        @if ($quiz->my_result)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Katılımcı Sayısı
                            <span class="badge text-bg-secondary rounded-pill">{{ $quiz->details['join_count'] }}</span>
                        </li>
                        @endif
                        @if ($quiz->finished_at)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Son Katılım Tarihi
                                <span title="{{ $quiz->finished_at }}"
                                    class="badge text-bg-secondary rounded-pill">{{ $quiz->finished_at->diffForHumans() }}</span>
                            </li>
                        @endif
                        @if ($quiz->details)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Ortalama Puan
                            <span class="badge text-bg-primary rounded-pill">{{ $quiz->details['average'] }}</span>
                        </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Soru Sayısı
                            <span class="badge text-bg-primary rounded-pill">{{ $quiz->questions->count() }}</span>
                        </li>
                    </ul>
                </div>

                <div class="col-md-8">
                    {{ $quiz->description }}</p>
                    @if (!$quiz->my_result)
                    <a href="{{ route('quiz.join', $quiz->slug) }}" class="btn btn-primary btn-block">Quiz'e Katıl</a>
                    @else
                    <a href="{{ route('quiz.join', $quiz->slug) }}" class="btn btn-primary btn-block">Quiz'e Tekrar Katıl</a>
                    @endif

                </div>


            </div>
        </div>
</x-app-layout>

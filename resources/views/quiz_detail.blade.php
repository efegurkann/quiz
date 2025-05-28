<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if ($quiz->my_rank)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>Sıralama: </strong>
                                <span class="badge text-bg-primary rounded-pill">#{{ $quiz->my_rank }}</span>
                            </li>
                        @endif
                        @if ($quiz->my_result)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>Puan: </strong>
                                <span class="badge text-bg-primary rounded-pill">{{ $quiz->my_result->point }}</span>
                            </li>
                        @endif
                        @if ($quiz->my_result)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>Doğru Yanlış: </strong>
                                <span class="badge text-bg-primary rounded-pill">{{ $quiz->my_result->correct }} Doğru -
                                    {{ $quiz->my_result->wrong }} Yanlış</span>
                            </li>
                        @endif
                        @if ($quiz->my_result)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Katılımcı Sayısı
                                <span
                                    class="badge text-bg-secondary rounded-pill">{{ $quiz->details['join_count'] }}</span>
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
                    @if ($quiz->topTen->count() > 0)
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">İlk 10</h5>
                            <ul class="list-group">
                                @foreach ($quiz->topTen as $result)
                                    <li class="list-group-item">
                                        <img src="{{ $result->user->profile_photo_url }}" alt="" class="w-8 h-8 rounded-circle">
                                        <span @if(auth()->user()->id === $result->user_id) class="text-success" @endif>
                                            {{ $loop->iteration }}. {{ $result->user->name }}
                                        </span>
                                        <span class="badge text-bg-primary rounded-pill">{{ $result->point }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-md-8">
                    <p class="card-text">{{ $quiz->description }}</p>
                    @if (!$quiz->my_result)
                        <a href="{{ route('quiz.join', $quiz->slug) }}" class="btn btn-primary btn-block w-100">Quiz'e
                            Katıl</a>
                    @else
                        <a href="{{ route('quiz.join', $quiz->slug) }}" class="btn btn-primary btn-block w-100">Quiz'e
                            Tekrar Katıl</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

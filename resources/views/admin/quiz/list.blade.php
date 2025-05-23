<x-app-layout>
    <x-slot name="header">Quizler</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><a href="{{route('quizzes.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Quiz Oluştur</a></h5>
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Quiz</th>
                    <th scope="col">Soru Sayısı</th>
                    <th scope="col">Durum</th>
                    <th scope="col">Bitiş Tarihi</th>
                    <th scope="col">İşlemler</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($quizzes as $quiz)
                  <tr>
                    <td>{{ $quiz->title }}</th>
                    <td>{{count($quiz->questions)}}</td>
                    <td>
                        @switch($quiz->status)
                            @case('active')
                                <span class="badge bg-success">Aktif</span>
                                @break
                            @case('passive')
                                <span class="badge bg-danger">Pasif</span>
                                @break
                            @case('draft')
                                <span class="badge bg-warning">Taslak</span>
                                @break
                        @endswitch
                    </td>
                    <td>
                        {{ $quiz->finished_at ? Carbon\Carbon::parse($quiz->finished_at)->diffForHumans() : '-' }}
                    </td>
                    <td>
                        <a href="{{ route('questions.index', $quiz->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-question"></i> Sorular</a>
                        <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i> Düzenle</a>
                        <a href="{{ route('quizzes.destroy', $quiz->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Sil</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $quizzes->links() }}
        </div>
    </div>
</x-app-layout>

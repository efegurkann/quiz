<x-app-layout>
    <x-slot name="header">Quizler</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title float-right"><a href="{{route('quizzes.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Quiz Oluştur</a></h5>
            <form method="GET" action="{{route('quizzes.index')}}">
                 <div class="form-row">
                    <div class="col-md-2">
                        <input type="text" name="title" value="{{request()->get('title')}}" class="form-control" placeholder="Quiz Adı">
                    </div>
                    <div class="col-md-2">
                        <select name="status" onchange="this.form.submit()" class="status">
                            <option value="">Durum Seçiniz</option>
                            <option @if(request()->get('status') == 'active') selected @endif value="active">Aktif</option>
                            <option @if(request()->get('status') == 'passive') selected @endif value="passive">Pasif</option>
                            <option @if(request()->get('status') == 'draft') selected @endif value="draft">Taslak</option>
                        </select>
                    </div>
                    @if(request()->get('title') || request()->get('status'))
                        <div class="col-md-2">
                            <a href="{{route('quizzes.index')}}" class="btn btn-warning">Sıfırla</a>
                        </div>
                    @endif
                 </div>
            </form>
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
              {{ $quizzes->withQueryString()->links() }}
        </div>
    </div>
</x-app-layout>

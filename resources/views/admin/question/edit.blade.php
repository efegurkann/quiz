<x-app-layout>

    <x-slot name="header">{{ $question->question }} Düzenle </x-slot>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('questions.update', ['quiz_id' => $question->quiz_id, 'question' => $question->id]) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Soru</label>
                    <textarea name="question" class="form-control" rows="4" required>{{$question->question}}</textarea>
                </div>
                <div class="form-group mt-2">
                    <label>Fotoğraf</label>
                    @if ($question->image)
                        <a href="{{asset($question->image)}}" target="_blank">
                            <img src="{{asset($question->image)}}" class="img-responsive" style="width: 100px; height: 100px;">
                        </a>
                    @endif
                    <input type="file" name="image" class="form-control" rows="4" value="{{$question->image}}">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>1.Cevap</label>
                            <textarea name="answer1" class="form-control" rows="2" required>{{$question->answer1}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>2.Cevap</label>
                            <textarea name="answer2" class="form-control" rows="2" required>{{$question->answer2}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>3.Cevap</label>
                            <textarea name="answer3" class="form-control" rows="2" required>{{$question->answer3}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>4.Cevap</label>
                            <textarea name="answer4" class="form-control" rows="2" required>{{$question->answer4}}</textarea>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label>Doğru Cevap</label>
                    <select name="correct_answer" class="form-control">
                        <option @if ($question->correct_answer == '1') selected @endif value="1">1.Cevap</option>
                        <option @if ($question->correct_answer == '2') selected @endif value="2">2.Cevap</option>
                        <option @if ($question->correct_answer == '3') selected @endif value="3">3.Cevap</option>
                        <option @if ($question->correct_answer == '4') selected @endif value="4">4.Cevap</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary btn btn-block" style="width: 100%">Soru Güncelle</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

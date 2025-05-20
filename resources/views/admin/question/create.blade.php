<x-app-layout>

    <x-slot name="header">{{ $quiz->title }} Quizine Soru Oluştur</x-slot>
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{route('questions.store', $quiz->id)}}" novalidate>
                @csrf
                <div class="form-group">
                    <label>Soru</label>
                    <textarea name="question" class="form-control" rows="4" required>{{old('question')}}</textarea>
                </div>
                <div class="form-group mt-2">
                    <label>Fotoğraf</label>
                    <input type="file" name="image" class="form-control" rows="4" value="{{old('image')}}" required>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>1.Cevap</label>
                            <textarea name="answer1" class="form-control" rows="2" required>{{old('answer1')}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>2.Cevap</label>
                            <textarea name="answer2" class="form-control" rows="2" required>{{old('answer2')}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>3.Cevap</label>
                            <textarea name="answer3" class="form-control" rows="2" required>{{old('answer3')}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>4.Cevap</label>
                            <textarea name="answer4" class="form-control" rows="2" required>{{old('answer4')}}</textarea>
                        </div>
                    </div>

                </div>
                <div class="form-group mt-2">
                    <input type="checkbox" id="isFinished" @if (old('finished_at')) checked @endif>
                    <label> Bitiş Tarihi Olacak Mı? </label>

                </div>
                <div class="form-group">
                    <label>Doğru Cevap</label>
                    <select name="correct_answer" class="form-control">
                        <option @if (old('correct_answer') == '1') selected @endif value="1">1.Cevap</option>
                        <option @if (old('correct_answer') == '2') selected @endif value="2">2.Cevap</option>
                        <option @if (old('correct_answer') == '3') selected @endif value="3">3.Cevap</option>
                        <option @if (old('correct_answer') == '4') selected @endif value="4">4.Cevap</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary btn btn-block" style="width: 100%">Soru Oluştur</button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
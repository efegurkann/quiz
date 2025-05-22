<x-app-layout>

    <x-slot name="header">Quiz Güncelle</x-slot>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('quizzes.update', $quiz->id)}}" novalidate>
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Quiz Başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{$quiz->title}}" required>
                </div>
                <div class="form-group mt-2">
                    <label for="title">Quiz Açıklama</label>
                    <textarea name="description" class="form-control"  rows="4">{{$quiz->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="status">Quiz Durumu</label>
                    <select name="status" class="form-control">
                        <option @if($quiz->questions_count < 4) disabled @endif value="active" @if($quiz->status == 'active') selected @endif>
                            Aktif
                        </option>
                        <option value="passive" @if($quiz->status == 'passive') selected @endif>Pasif</option>
                        <option value="draft" @if($quiz->status == 'draft') selected @endif>Taslak</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <input type="checkbox" id="isFinished" @if ($quiz->finished_at) checked @endif>
                    <label> Bitiş Tarihi Olacak Mı? </label>

                </div>
                <div id="finished_at" @if (!$quiz->finished_at) style="display: none" @endif class="form-group mt-2">
                    <label> Bitiş Tarihi </label>
                    <input type="datetime-local" name="finished_at" class="form-control" @if($quiz->finished_at) value="{{date('Y-m-d H:i', strtotime($quiz->finished_at))}}" @endif>
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary btn btn-block" style="width: 100%">Quiz Güncelle</button>
                </div>

            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
            $('#isFinished').change(function(){
                if($('#isFinished').is(':checked')){
                    $('#finished_at').show();
                }else{
                    $('#finished_at').hide();
                }
            });
        </script>
    </x-slot>
</x-app-layout>
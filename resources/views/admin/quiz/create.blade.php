<x-app-layout>

    <x-slot name="header">Quiz Oluştur</x-slot>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('quizzes.store')}}" novalidate>
                @csrf
                <div class="form-group">
                    <label for="title">Quiz Başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{old('title')}}" required>
                </div>
                <div class="form-group mt-2">
                    <label for="title">Quiz Açıklama</label>
                    <textarea name="description" class="form-control"  rows="4">{{old('description')}}</textarea>
                </div>
                <div class="form-group mt-2">
                    <input type="checkbox" id="isFinished" @if (old('finished_at')) checked @endif>
                    <label> Bitiş Tarihi Olacak Mı? </label>

                </div>
                <div id="finished_at" @if (!old('finished_at')) style="display: none" @endif class="form-group mt-2">
                    <label> Bitiş Tarihi </label>
                    <input type="datetime-local" name="finished_at" class="form-control" value="{{old('finished_at')}}">
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary btn btn-block" style="width: 100%">Quiz Oluştur</button>
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
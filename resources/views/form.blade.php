@extends('layouts.main')
@section('content')
    <div class="card-body offset-4  " style="width: 50rem;">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title offset-6">پاراف</h3>
            </div>
            <form role="form" method="POST" action="{{ route('paraf.store') }}">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputFile">ارسال فایل</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="paraf_file" class="form" id="paraf_file">
                                <label class="custom-file-label" for="paraf_file">انتخاب فایل</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="submit">ارسال</button>
                    <a class="btn btn-warning mr-2" href="https://quiz.paraf.app/job/ws9h5q2af1lwrcl1.xlsx">دریافت فایل از
                        پاراف</a>
            </form>
        </div>
    </div>


@section('script')
    <script>
        $(document).ready(function() {

            $("#submit").click(function(e) {
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: '/paraf',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        file: $('#paraf_file').val(),
                    },
                    success: function(data) {
                        console.log(data);
                    },
                });
            });
        });
    </script>
@endsection

@endsection

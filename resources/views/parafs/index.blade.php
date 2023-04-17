@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card-body offset-2" style="width: 50rem;">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title ">paraf</h3>
                </div>
                <form role="form" method="POST" id="paraf_form" action="{{ route('paraf.store') }}"
                    enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group" id="file_div" >
                            <label for="exampleInputFile">ارسال فایل</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="paraf_file" class="form" id="paraf_file" id="file_id" >
                                    <label class="custom-file-label" for="paraf_file">انتخاب فایل</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"  id="submit">
                            <span class="spinner-border spinner-border-sm mb-1" id="speener" style="display: none;"></span>
                            ارسال</button>
                        <a class="btn btn-warning mr-2" href="https://quiz.paraf.app/job/ws9h5q2af1lwrcl1.xlsx">دریافت
                            فایل
                            از
                            پاراف</a>
                </form>
            </div>
        </div>
    </div>
   
@include('parafs.table')

@endsection

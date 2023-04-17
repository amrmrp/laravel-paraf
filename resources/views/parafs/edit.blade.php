@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card-body offset-2" style="width: 50rem;">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title offset-5"> ویرایش پاراف </h3>
                </div>
                <form role="form" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">نماد</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input id="id_id" type="hidden" name="id" class="form-control"
                                        value="{{ $paraf->id ?? '' }}">

                                    <input id="name_id" type="text" name="name" class="form-control"
                                        placeholder="لطفا وارد نمایید..." value="{{ $paraf->name ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">نام</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input id="company_id" type="text" name="company" class="form-control"
                                        placeholder="لطفا وارد نمایید..." value="{{ $paraf->company ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">تعداد</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input id="quantity_id" type="text" name="quantity" class="form-control"
                                        placeholder="لطفا وارد نمایید..." value="{{ $paraf->quantity ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">حجم</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input id="volume_id" type="text" name="volume" class="form-control"
                                        placeholder="لطفا وارد نمایید..." value="{{ $paraf->volume ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">ارزش</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input id="value_id" type="text" name="value" class="form-control"
                                        placeholder="لطفا وارد نمایید..." value="{{ $paraf->value ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">دیروز</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input id="yesterday_id" type="text" name="yesterday" class="form-control"
                                        placeholder="لطفا وارد نمایید..." value="{{ $paraf->yesterday ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">اولین</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input id="first_id" type="text" name="first" class="form-control"
                                        placeholder="لطفا وارد نمایید..." value="{{ $paraf->first ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">آخرین معامله - مقدار</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input id="last_transaction_amount_id" type="text" placeholder="لطفا وارد نمایید..."
                                        name="last_transaction_amount" class="form-control"
                                        value="{{ $paraf->last_transaction_amount ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">آخرین معامله - تغییر</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input id="the_last_deal_change_id" type="text" name="the_last_deal_change"
                                        class="form-control" placeholder="لطفا وارد نمایید..."
                                        value="{{ $paraf->the_last_deal_change ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">آخرین معامله - درصد</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input id="last_transaction_percentage_id" type="text"
                                        name="last_transaction_percentage" class="form-control"
                                        placeholder="لطفا وارد نمایید..."
                                        value="{{ $paraf->last_transaction_percentage ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">قیمت پایانی - مقدار</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input id="final_price_quantity_id" type="text" name="final_price_quantity"
                                        class="form-control" placeholder="لطفا وارد نمایید..."
                                        value="{{ $paraf->final_price_quantity ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">قیمت پایانی - تغییر</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input id="final_price_change_id" type="text" name="final_price_change"
                                        class="form-control" placeholder="لطفا وارد نمایید..."
                                        value="{{ $paraf->final_price_change ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">قیمت پایانی - درصد</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input id="final_price_percent_id" type="text" name="final_price_percent"
                                        class="form-control" placeholder="لطفا وارد نمایید..."
                                        value="{{ $paraf->final_price_percent ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">کمترین</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input id="the_least_id" type="text" name="the_least" class="form-control"
                                        placeholder="لطفا وارد نمایید..." value="{{ $paraf->the_least ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">بیشترین</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input id="the_most_id" type="text" name="the_most" class="form-control"
                                        placeholder="لطفا وارد نمایید..." value="{{ $paraf->the_most ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">تاریخ</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input id="date_id" type="text" name="date" class="form-control"
                                        placeholder="لطفا وارد نمایید..." value="{{ $paraf->date ?? '' }}">
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="card-footer">
                        <button type="submit" id="submit" class="btn btn-primary">
                            <span class="spinner-border spinner-border-sm mb-1" id="speener" style="display: none;"></span>

                            ویرایش</button>
                        <a class="btn btn-warning mr-2" href="/">
                            بازگشت
                        </a>
                </form>
            </div>
        </div>
    </div>
@section('script')
    <script>
        $(document).ready(function() {
            $("#submit").click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "PUT",
                    url: '/paraf/' + $('#id_id').val(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    data: {
                        id: $('#id_id').val(),
                        name: $('#name_id').val(),
                        company: $('#company_id').val(),
                        quantity: $('#quantity_id').val(),
                        volume: $('#volume_id').val(),
                        value: $('#value_id').val(),
                        yesterday: $('#yesterday_id').val(),
                        first: $('#first_id').val(),
                        last_transaction_amount: $('#last_transaction_amount_id').val(),
                        the_last_deal_change: $('#the_last_deal_change_id').val(),
                        last_transaction_percentage: $('#last_transaction_percentage_id').val(),
                        final_price_quantity: $('#final_price_quantity_id').val(),
                        final_price_change: $('#final_price_change_id').val(),
                        final_price_percent: $('#final_price_percent_id').val(),
                        the_least: $('#the_least_id').val(),
                        the_most: $('#the_most_id').val(),
                        date: $('#date_id').val(),
                    },
                    success: function(data) {
                        Swal.fire({
                            title: 'success',
                            text: 'ok',
                            icon: 'success',
                            confirmButtonText: 'ok'
                        })

                        setTimeout(function() {
                            location.href = "/"
                        }, 1000);
                    },
                    beforeSend: function() {
                        if ($("#submit").click) {
                            $("#speener").css("display", "inherit");
                        } else {
                            $("#speener").css("display", "none");
                        }
                        // setting a timeout
                    },
                    error: function(data) {
                        Swal.fire({
                            title: 'Error!',
                            text: data.responseJSON.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        })
                    },
                    complete: function() {
                        $("#speener").css("display", "none");
                    },
                });
            });
        });
    </script>
@endsection
@endsection

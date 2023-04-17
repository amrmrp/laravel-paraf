    <div class="container-fluid" style=" margin-right: -20%; ">
        <div class="  ">
            <table id="myTable" class="display table">
                <thead>
                    <tr>
                        <th>شناسه </th>
                        <th>نماد </th>
                        <th>نام </th>
                        <th>تعداد </th>
                        <th>حجم </th>
                        <th>ارزش </th>
                        <th>دیروز </th>
                        <th>اولین </th>
                        <th>آخرین معامله - مقدار </th>
                        <th>آخرین معامله - تغییر </th>
                        <th>آخرین معامله - درصد </th>
                        <th>قیمت پایانی - مقدار </th>
                        <th>قیمت پایانی - تغییر </th>
                        <th>قیمت پایانی - درصد </th>
                        <th>کمترین </th>
                        <th>بیشترین </th>
                        <th>تاریخ </th>
                        <th>عملیات </th>
                    </tr>
                </thead>
            </table>
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
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        data: new FormData(
                            $("#paraf_form").get(0), $("#paraf_link").get(0)
                        ),
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            if ($("#submit").click) {
                                $("#speener").css("display", "inherit");
                            } else {
                                $("#speener").css("display", "none");
                            }
                            // setting a timeout
                        },
                        success: function(data) {
                            Swal.fire({
                                title: 'success',
                                text: 'ok',
                                icon: 'success',
                                confirmButtonText: 'ok'
                            })

                            setTimeout(function() {
                                location.reload();
                            }, 1000);
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

                var tables = $('#myTable').DataTable({
                    processing: true,
                    serverSide: true,
                    stateSave: true,
                    ordering: false,
                    searching: false,
                    ajax: function(data, callback, settings) {
                        $.get("/paraf", {
                                limit: data.length,
                                offset: data.start,
                                data: data,
                            },
                            function(json) {
                                callback({
                                    recordsTotal: json.recordsTotal,
                                    recordsFiltered: json.recordsFiltered,
                                    data: json.data,
                                });
                            });
                    },
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'name'
                        },
                        {
                            data: 'company'
                        },
                        {
                            data: 'quantity'
                        },
                        {
                            data: 'volume'
                        },
                        {
                            data: 'value'
                        },
                        {
                            data: 'yesterday'
                        },
                        {
                            data: 'first'
                        },
                        {
                            data: 'last_transaction_amount'
                        },
                        {
                            data: 'the_last_deal_change'
                        },
                        {
                            data: 'last_transaction_percentage'
                        },
                        {
                            data: 'final_price_quantity'
                        },
                        {
                            data: 'final_price_change'
                        },
                        {
                            data: 'final_price_percent'
                        },
                        {
                            data: 'the_least'
                        },
                        {
                            data: 'the_most'
                        },
                        {
                            data: 'date'
                        },
                        {
                            data: 'id',
                            render: function(id, type, row) {

                                return '<a href="/paraf/' + id + '/edit" class="btn btn-warning"' + id +
                                    '">ویرایش</a>';

                            }
                        },
                    ],
                });
                var info = tables.page.info();
            });
        </script>
    @endsection

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
        .detail-link {
            border: 0;
            color: blue;
        }

        .detail-link:hover {
            border: 0;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h3 class="text-center m-5">Annual Revenue</h3>
    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">

            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Month</th>
                                <th scope="col">Number of Orders</th>
                                <th scope="col">Monthly Revenue</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 1; $i <= 12; $i++) <tr>
                                <td scope="col">&nbsp;&nbsp;&nbsp;<a href="/admin/revenue/detail/{{$i}}">{{$i}}</a></td>
                                <td scope="col">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$number_orders[$i]}}</td>
                                <td scope="col">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${{$monthly_revenue[$i]}}</td>
                                </tr>
                                @endfor
                                <tr>
                                    <td scope="col"></td>
                                    <td scope="col"></td>
                                    <th scope="col">Annual Revenue: ${{$annual_revenue}}</th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                        </tbody>
                    </table>
                    <a href="/admin">Back</a>
                </div>
            </div>
    </section>
</body>

</html>
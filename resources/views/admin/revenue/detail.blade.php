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
    <h3 class="text-center m-5">Monthly Revenue</h3>
    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
        <a href="/admin/revenue">Back</a>
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Numerical order</th>
                                <th scope="col">Order ID</th>
                                <th scope="col">Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 1; $i <= $order->count(); $i++)
                            <tr>
                                <td scope="col">{{$i}}</td>
                                <td scope="col">{{$order[$i-1]->id}}</td>
                                <td scope="col">${{$order[$i-1]->total_price}}</td>
                            </tr>
                            @endfor
                            <tr>
                                    <td scope="col"></td>
                                    <td scope="col"></td>
                                    <th scope="col">Monthly Revenue: ${{$monthly_revenue}}</th>
                                </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
    </section>
</body>

</html>
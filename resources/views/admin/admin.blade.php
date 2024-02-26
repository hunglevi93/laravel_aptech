<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
        #mnleft {
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <h2 class="text-center col-md-12">HELLO, ADMIN</h2>
        </div>
        <div class="col-md-3" id="mnleft">
            <div class="row">
                <a href="/admin/products" class="col-md-12 m-auto btn btn-info">Products Manage</a>
            </div>
            <div class="row mt-5">
                <a href="/admin/orders" class="col-md-12 m-auto btn btn-info">Orders Manage</a>
            </div>
            <div class="row mt-5">
                <a href="/admin/revenue" class="col-md-12 m-auto btn btn-info">Revenue Manage</a>
            </div>
            <div class="row mt-5">
                <a href="/admin/comment" class="col-md-12 m-auto btn btn-info">Contact Manage</a>
            </div>
        </div>
    </div>
</body>

</html>
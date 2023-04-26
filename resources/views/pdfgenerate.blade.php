<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');
        body {
        margin: 20px;
        padding: 0;
        font-family: 'Roboto', sans-serif;
    }

    h1 {
        text-align: center;
        color: #697eb8;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        box-shadow: 0 2px 4px rgba(0,0,0,.3);
        overflow-x: auto;
    }

    th, td {
        text-align: left;
        padding: 10px 8px;
        font-weight: 500;
        font-size: 10px;
        color: #424242;
    }

    th {
        background-color: #697eb8;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #eee;
    }

    img {
        max-width: 100%;
        height: auto;
        box-shadow: 0 2px 4px rgba(0,0,0,.3);
    }
</style>
</head>
<body>
    <h1>Noborupa Telecom and Service Point</h1>
    <table>
        <thead>
            <tr>
                <th>Order Id</th>
                <th>Customer Name</th>
                <th>Problem</th>
                <th>Phone Number</th>
                <th>Imei Number</th>                               
                <th>Phone Model</th>                               
                <th>Service Charge</th>
                <th>Image</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allusers as $index=>$user)
            <tr>
                <td>#{{$user->id}}</td>
                <td>{{$user->customer_name}}</td>
                <td>{{$user->problem}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->phone_model}}</td>
                <td>{{$user->imei}}</td>
                <td>{{$user->service_charge}} Tk</td>
                @if($user->image)
                <td><img src="{{public_path('img')}}/{{$user->image}}"/></td>
                @else
                <td>Image Not Found</td>
                @endif
                <td>{{$user->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
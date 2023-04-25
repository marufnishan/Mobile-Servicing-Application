<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <style>
        @font-face {
            font-family: 'Nikosh';
            src: url({{ storage_path('fonts\Nikosh.ttf') }}) format("truetype");
			font-style: normal;
            font-variant: normal;
        }
        #usr{
            font-family: sans-serif,'Nikosh';
            font-size: 12px;
            border-collapse: collapse;
            width: 100%
        }
        #usr td,#usr th{
            font-family: 'Nikosh';
            border: 1px solid #ddd;
            padding: 2px;
            text: center;
        }
        #usr tr:nth-child(even){
            background-color: #0bfdfd;
        }

        #usr th{
            text-align: left;
            background-color: rgb(20, 17, 17);
            color: bisque;
        }

        body{
            font-family: 'Nikosh';
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <table id="usr">
        <thead>
            <tr>
                <th>No.</th>
                <th>Customer Name</th>
                <th>Problem</th>
                <th>Phone Number</th>
                <th>Imei Number</th>                               
                <th>Service Charge</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allusers as $index=>$user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->customer_name}}</td>
                <td>{{$user->problem}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->imei}}</td>
                <td>{{$user->service_charge}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
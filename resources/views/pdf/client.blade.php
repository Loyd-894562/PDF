<!DOCTYPE html>
<html>
<head>
    <title>Client Summary</title>
    <style>

        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 10pt;
        }
        /* * {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif';
            font-size: 10pt;
        } */
        

        h1 {
            font-size: 22pt;
        }

        table {
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #777;
            padding: 2px;
        }
    </style>
</head>
<body>
    <p style="text-align: center; margin-bottom: 18pt">
        <img src="{{public_path('images/sample.png')}}" style="width: 200px;" alt=""> <br>
        {{-- <strong style="font-size: 16pt">MDC Banking, Inc.</strong> <br> --}}
        Cabulijan, Tubigon, Bohol <br>
        Tel. No.: 555-123-4567, 223-123-9876
    </p>

    <h1>Client Summary</h1>
    <table style='width: 5in'>
        <tr>
            <th>Name</th>
            <td>{{$client->first_name}} {{$client->middle_name}} {{$client->last_name}}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{$client->address}}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{$client->phone_number}}</td>
        </tr>
    </table>

    <hr>

    <table style="width: 100%">
        <thead>
            <tr style="background-color: #efefef">
                <th>Date</th>
                <th>Deposit</th>
                <th>Withdrawal</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="3">Beginning Balance</td>
                <td style="text-align: right">{{number_format($client->initial_deposit,2)}}</td>
            </tr>
            <?php $bal = $client->initial_deposit; ?>
            @foreach($client->transactions as $txn)
            <tr>
                <td>{{$txn->date}}</td>
                <td style="text-align: right">{{$txn->deposit ? number_format($txn->amount, 2): ''}}</td>
                <td style="text-align: right">{{!$txn->deposit ? number_format($txn->amount, 2): ''}}</td>
                <td style="text-align: right">{{ number_format($bal += $txn->deposit ? $txn->amount : (0-$txn->amount), 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
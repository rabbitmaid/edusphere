<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $class->name }} Classlist</title>
    <style>
        body {
            padding: 20px;
            background-color: white;
            color: #333;
        }

        .header {
            text-align: center;

        }
        .container {
            text-align: center;
            margin-bottom: 20px;
        }
        h1 {
            font-size: 24px;
            font-weight: bold;
        }
        p {
            color: #666;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
            border-bottom: 1px solid #ccc;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
    
</head>
<body>
    <div class="header">
        <h1>{{ $class->name }} Classlist</h1>
        <p><em>Generated on: {{ now()->format('l F jS, Y') }} By:  {{ config('app.name') }} Records Found: {{ count($students) }} </em></p>
    </div>
    
    <table >
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Matricule</th>
                <th>Address</th>
                <th>Date of Birth</th>
                <th>Place of Birth</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            @isset($students)
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->user->name }}</td>
                        <td>{{ $student->matricule }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ $student->date_of_birth->format('l F jS, Y') }}</td>
                        <td>{{ $student->place_of_birth }}</td>
                        <td>{{ $student->phone }}</td>
                    </tr>
                @endforeach

            @endisset



            @if(count($students) == 0)
                    <tr>
                        <td colspan="7" style="text-align: center;">No Students Found</td>
                    </tr>
            @endif


        </tbody>
    </table>
</body>
</html>

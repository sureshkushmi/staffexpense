<!-- resources/views/layouts/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Data</title>
</head>
<body>
    <h1>Staff Data</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Attendance</th>
                <th>Location Office</th>
                <th>Out Station</th>
                <th>Work Completed</th>
                <th>Work Completed Remark</th>
                <th>Work Pending</th>
                <th>Expenses</th>
                <th>Bike Expense</th>
                <th>Approved Expense</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staffs as $staff)
                <tr>
                    <td>{{ $staff->id }}</td>
                    <td>{{ $staff->attendance }}</td>
                    <td>{{ $staff->loffice }}</td>
                    <td>{{ $staff->outstation }}</td>
                    <td>{{ $staff->work_completed }}</td>
                    <td>{{ $staff->work_completed_remark }}</td>
                    <td>{{ $staff->work_pending }}</td>
                    <td>
                        {{ $staff->expense1 }}, 
                        {{ $staff->expense2 }}, 
                        {{ $staff->expense3 }}, 
                        {{ $staff->expense4 }}, 
                        {{ $staff->expense5 }}
                    </td>
                    <td>{{ $staff->bikeExpense }}</td>
                    <td>{{ $staff->approved_expense }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

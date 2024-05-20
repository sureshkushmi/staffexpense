<!-- resources/views/staff/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <h4><a href="{{route('staff.index')}}">Staff List</a></h4>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Staff data section -->
                    <section class="max-w-2xl mx-auto mt-6 p-6 bg-white shadow-md rounded-md">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                Staff Data
                            </h2>
                        </header>
                        <table class="table">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <a href="{{ route('export.to.word') }}">Export to Word</a>
                                        <form action="{{ route('staff.search') }}" method="GET" style="display:inline;">
                                            <input type="text" name="search" placeholder="Search...">
                                            <button type="submit">Search</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="header">Name</th>
                                    <th class="header">Attendance</th>
                                    <th class="header">Location Office</th>
                                    <th class="header">Out Station</th>
                                    <th class="header">Work Completed</th>
                                    <th class="header">Work Completed Remark</th>
                                    <th class="header">Work Pending</th>
                                    <th class="header">Work Pending Remark</th>
                                    <th class="header">Expenses</th>
                                    <th class="header">Bike Expense</th>
                                    <th class="header">Approved Expense</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($staffs as $staff)
                                    <tr>
                                        <td>{{ $staff->name }}</td>
                                        <td>{{ $staff->attendance }}</td>
                                        <td>{{ $staff->location_office }}</td>
                                        <td>{{ $staff->out_station }}</td>
                                        <td>{{ $staff->work_completed }}</td>
                                        <td>{{ $staff->work_completed_remark }}</td>
                                        <td>{{ $staff->work_pending }}</td>
                                        <td>{{ $staff->work_pending_remark }}</td>
                                        <td>
                                            1: {{ $staff->expense1 }}<br>
                                            2: {{ $staff->expense2 }}<br>
                                            3: {{ $staff->expense3 }}<br>
                                            4: {{ $staff->expense4 }}<br>
                                            5: {{ $staff->expense5 }}
                                        </td>
                                        <td>{{ $staff->bike_expense }}</td>
                                        <td>{{ $staff->approved_expense }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<section class="max-w-2xl mx-auto mt-6 p-6 bg-white shadow-md rounded-md">
<style>
        .mt-6 { margin-top: 1.5rem; }
        .inline-flex { display: inline-flex; }
        .items-center { align-items: center; }
        .px-4 { padding-left: 1rem; padding-right: 1rem; }
        .py-2 { padding-top: 0.5rem; padding-bottom: 0.5rem; }
        .bg-indigo-500 { background-color: #6366F1; }
        .border { border-width: 1px; }
        .border-transparent { border-color: transparent; }
        .rounded-md { border-radius: 0.375rem; }
        .font-semibold { font-weight: 600; }
        .text-xs { font-size: 0.75rem; }
        .text-white { color: #FFFFFF; }
        .uppercase { text-transform: uppercase; }
        .tracking-widest { letter-spacing: 0.1em; }
        .hover\:bg-indigo-600:hover { background-color: #4F46E5; }
        .active\:bg-indigo-700:active { background-color: #4338CA; }
        .focus\:outline-none:focus { outline: none; }
        .focus\:border-indigo-700:focus { border-color: #4338CA; }
        .focus\:ring:focus { box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.5); }
        .focus\:ring-indigo-200:focus { box-shadow: 0 0 0 3px rgba(199, 210, 254, 0.5); }
        .disabled\:opacity-25:disabled { opacity: 0.25; }
        .transition { transition: all 0.2s; }
        .alert {
            color: red;
            margin-bottom: 20px;
        }
        .alert ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
    </style>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Please Fill in the Form
        </h2>
    </header>

    <form method="post" action="{{ route('submit.form') }}" class="mt-6 space-y-6">
        @csrf
        @method('post')
        <!-- Display all errors at the top -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-4">
            <label for="attendance" class="block font-medium text-sm text-gray-700">Attendance</label>
            <div class="flex items-center space-x-4">
                <input type="checkbox" name="attendance" id="attendance_y" value="Y" class="mr-1">
                <label for="attendance_y" class="block font-medium text-sm text-gray-700 mr-4">Y</label>
                <input type="checkbox" name="attendance" id="attendance_n" value="N" class="mr-1">
                <label for="attendance_n" class="block font-medium text-sm text-gray-700 mr-4">N</label>
                <input type="checkbox" name="attendance" id="attendance_ot" value="OT" class="mr-1">
                <label for="attendance_ot" class="block font-medium text-sm text-gray-700 mr-4">OT</label>
                <input type="checkbox" name="attendance" id="attendance_leave" value="Leave" class="mr-1">
                <label for="attendance_leave" class="block font-medium text-sm text-gray-700 mr-4">Leave</label>
            </div>
        </div>


        <div class="mt-4">
            <label for="loffice" class="block font-medium text-sm text-gray-700">Location Office</label>
            <input type="text" name="loffice" id="loffice" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <div class="mt-4">
            <label for="outstation" class="block font-medium text-sm text-gray-700">Out Station</label>
            <select name="outstation" id="outstation" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="Biratnagar">Biratnagar</option>
                <option value="Birgunj">Birgunj</option>
                <option value="Kathmandu">Kathmandu</option>
            </select>
        </div>


        <div class="mb-4">
            <label for="work_completed" class="block font-medium text-sm text-gray-700">Work Completed</label>
            <div class="flex items-center space-x-4">
                <input type="radio" name="work_completed" id="work_completed_yes" value="Yes">
                <label for="work_completed_yes" class="block font-medium text-sm text-gray-700 ml-4 mr-4">Yes</label>
                <input type="radio" name="work_completed" id="work_completed_no" value="No">
                <label for="work_completed_no" class="block font-medium text-sm text-gray-700 ml-4 mr-4">No</label>
            </div>
        </div>

        <textarea name="work_completed_remark" id="work_completed_remark" rows="3" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>

        <div class="mb-4">
            <label for="work_pending" class="block font-medium text-sm text-gray-700">Work Pending</label>
            <div class="flex items-center space-x-4">
                <input type="radio" name="work_pending" id="work_pending_yes" value="Yes">
                <label for="work_pending_yes" class="block font-medium text-sm text-gray-700">Yes</label>
                <input type="radio" name="work_pending" id="work_pending_no" value="No">
                <label for="work_pending_no" class="block font-medium text-sm text-gray-700">No</label>
            </div>
            <textarea name="work_pending_remark" id="work_pending_remark" rows="3" class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
        </div>

        <div class="mb-4">
            <label for="expense1" class="block font-medium text-sm text-gray-700">Expense 1</label>
            <input type="text" name="expense1" id="expense1" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <div class="mb-4">
            <label for="expense2" class="block font-medium text-sm text-gray-700">Expense 2</label>
            <input type="text" name="expense2" id="expense2" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <div class="mb-4">
            <label for="expense3" class="block font-medium text-sm text-gray-700">Expense 3</label>
            <input type="text" name="expense3" id="expense3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <div class="mb-4">
            <label for="expense4" class="block font-medium text-sm text-gray-700">Expense 4</label>
            <input type="text" name="expense4" id="expense4" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <div class="mb-4">
            <label for="expense5" class="block font-medium text-sm text-gray-700">Expense 5</label>
            <input type="text" name="expense5" id="expense5" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <div class="mb-4">
            <label for="bikeExpense" class="block font-medium text-sm text-gray-700">Bike Expense</label>
            <input type="text" name="bikeExpense" id="bikeExpense" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <div class="mb-4">
            <label for="approved_expense" class="block font-medium text-sm text-gray-700">Approved Expense</label>
            <input type="text" name="approved_expense" id="approved_expense" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="4500" readonly>
        </div>

        <div class="mt-6">
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-600 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 disabled:opacity-25 transition">Submit</button>        </div>
    </form>
</section>

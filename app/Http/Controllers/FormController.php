<?php

namespace App\Http\Controllers;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Http\Request;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;
class FormController extends Controller
{
// for displaying data 
    public function index()
    {
        if (Auth::user()->isAdmin) {
            $staffs = Staff::all();  // Get all staff data for admin users
        } else {
            $staffs = Staff::where('user_id', Auth::id())->get();  // Get only the logged-in user's data
        }
        // Pass the staff data to the view
        return view('layouts.index', compact('staffs'));
    }
    //
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'attendance' => 'required|string',
            'loffice' => 'required|string', 
            'outstation' => 'required|string',
            'work_completed' => 'required|string',
            'work_completed_remark' => 'required|string',
            'work_pending' => 'required|string',
            'expense1' => 'required|string',
            'expense2' => 'required|string',
            'expense3' => 'required|string',
            'expense4' => 'required|string',
            'expense5' => 'required|string',
            'bikeExpense' => 'required|string',
            'approved_expense' => 'required|string'
        ]);

        $validatedData['user_id'] = auth()->id();
    
        // Insert the validated data into the database
        $staffs = Staff::create($validatedData);
         // Add the authenticated user's ID
        
       // $query = $staffs->getQuery(); // Get the underlying query builder
        //$sql = $query->toSql(); // Get the SQL query
       // dd($sql); // Print the SQL query
       return redirect()->route('staff.index')->with('success', 'Data Inserted Successfully');

    }

    public function exportToWord()
    {
        try {
            // Retrieve all staff records
            $staffs = Staff::where('user_id', auth()->id())->get();

            // Load the HTML content from the view
            $html = view('layouts.index', compact('staffs'))->render();

            // Debugging: Log the HTML content
            \Log::info('HTML content for Word export:', ['html' => htmlspecialchars($html)]);

            // Validate and clean HTML content
            $html = htmlspecialchars($html);

            // Create a new PhpWord instance
            $phpWord = new PhpWord();

            // Add a section to the PhpWord document
            $section = $phpWord->addSection();

            // Add HTML content to the section (use basic HTML for testing)
            $basicHtml = '
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
                    <tbody>';
            
            foreach ($staffs as $staff) {
                $basicHtml .= '<tr>
                    <td>' . $staff->id . '</td>
                    <td>' . $staff->attendance . '</td>
                    <td>' . $staff->loffice . '</td>
                    <td>' . $staff->outstation . '</td>
                    <td>' . $staff->work_completed . '</td>
                    <td>' . $staff->work_completed_remark . '</td>
                    <td>' . $staff->work_pending . '</td>
                    <td>' . $staff->expense1 . ', ' . $staff->expense2 . ', ' . $staff->expense3 . ', ' . $staff->expense4 . ', ' . $staff->expense5 . '</td>
                    <td>' . $staff->bikeExpense . '</td>
                    <td>' . $staff->approved_expense . '</td>
                </tr>';
            }
            
            $basicHtml .= '</tbody>
                </table>';

            \PhpOffice\PhpWord\Shared\Html::addHtml($section, $basicHtml, false, false);

            // Save the PhpWord document to a temporary file
            $tempFile = tempnam(sys_get_temp_dir(), 'staff_data_') . '.docx';

            // Save the document
            $phpWord->save($tempFile, 'Word2007');

            // Check if the file actually exists
            if (!file_exists($tempFile)) {
                throw new \Exception('Word file was not created.');
            }

            // Send the Word document as a download response
            return response()->download($tempFile, 'staff_data.docx')->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error exporting data to Word: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->route('staff.index')->with('error', 'Failed to export data to Word');
        }
    }
    
    
    public function search(Request $request)
    {
        // Get the search term from the request
        $searchTerm = $request->input('search');
    
        // Perform the search query
        $staffs = Staff::where('attendance', 'like', "%{$searchTerm}%")
                        ->orWhere('work_completed', 'like', "%{$searchTerm}%")
                        ->orWhere('work_completed_remark', 'like', "%{$searchTerm}%")
                        ->orWhere('work_pending', 'like', "%{$searchTerm}%")
                        ->orWhere('work_pending_remark', 'like', "%{$searchTerm}%")
                        ->orWhere('expense1', 'like', "%{$searchTerm}%")
                        ->orWhere('expense2', 'like', "%{$searchTerm}%")
                        ->orWhere('expense3', 'like', "%{$searchTerm}%")
                        ->orWhere('expense4', 'like', "%{$searchTerm}%")
                        ->orWhere('expense5', 'like', "%{$searchTerm}%")
                        ->orWhere('approved_expense', 'like', "%{$searchTerm}%")
                        ->get();
    
        // Pass the search results to the view
        return view('layouts.index', compact('staffs'));
    }
    

    
}

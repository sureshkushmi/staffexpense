<?php

namespace Database\Seeders;

use App\Models\Staff; // Import the Staff model
use Illuminate\Database\Seeder;

class staffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Staff::create([
            'attendance' => json_encode(['Y', 'N']),
            'loffice' => 'Sample Location Office',
            'outstation' => 'Biratnagar',
            'work_completed' => 'Yes',
            'work_completed_remark' => 'Sample remark',
            'work_pending' => 'No',
            'work_pending_remark' => null,
            'expense1' => '1000',
            'expense2' => '2000',
            'expense3' => '3000',
            'expense4' => null,
            'expense5' => null,
            'bikeExpense' => '500',
            'approved_expense' => 4500,
        ]);
    }
}

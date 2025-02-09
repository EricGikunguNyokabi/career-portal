<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobPosting;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JobPostingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing records 
        // DB::table('job_postings')->truncate();

        // Insert job postings
        $jobs = [
            [
                'title' => 'Software Developer',
                'position_needed' => 3,
                'job_grade' => 'Grade 8',
                'advert_no' => 'ADV2025-001',
                'description' => 'Develop and maintain software applications using Laravel and React.',
                'application_deadline' => Carbon::now()->addDays(14),
            ],
            [
                'title' => 'Data Analyst',
                'position_needed' => 2,
                'job_grade' => 'Grade 7',
                'advert_no' => 'ADV2025-002',
                'description' => 'Analyze data and provide business insights using Python and Power BI.',
                'application_deadline' => Carbon::now()->addDays(10),
            ],
            [
                'title' => 'Network Engineer',
                'position_needed' => 1,
                'job_grade' => 'Grade 9',
                'advert_no' => 'ADV2025-003',
                'description' => 'Manage and configure enterprise networks and firewalls.',
                'application_deadline' => Carbon::now()->addDays(20),
            ],
            [
                'title' => 'HR Manager',
                'position_needed' => 1,
                'job_grade' => 'Grade 10',
                'advert_no' => 'ADV2025-004',
                'description' => 'Manage HR policies and recruitment processes.',
                'application_deadline' => Carbon::now()->addDays(12),
            ],
            [
                'title' => 'System Administrator',
                'position_needed' => 2,
                'job_grade' => 'Grade 8',
                'advert_no' => 'ADV2025-005',
                'description' => 'Maintain and secure Linux-based cloud infrastructure.',
                'application_deadline' => Carbon::now()->addDays(15),
            ],
            [
                'title' => 'Marketing Executive',
                'position_needed' => 4,
                'job_grade' => 'Grade 6',
                'advert_no' => 'ADV2025-006',
                'description' => 'Develop and implement marketing campaigns for products.',
                'application_deadline' => Carbon::now()->addDays(7),
            ],
            [
                'title' => 'Customer Support Officer',
                'position_needed' => 5,
                'job_grade' => 'Grade 5',
                'advert_no' => 'ADV2025-007',
                'description' => 'Provide customer service and resolve queries efficiently.',
                'application_deadline' => Carbon::now()->addDays(10),
            ],
            [
                'title' => 'Finance Manager',
                'position_needed' => 1,
                'job_grade' => 'Grade 10',
                'advert_no' => 'ADV2025-008',
                'description' => 'Manage company finances and budgeting.',
                'application_deadline' => Carbon::now()->addDays(18),
            ],
            [
                'title' => 'UX/UI Designer',
                'position_needed' => 2,
                'job_grade' => 'Grade 7',
                'advert_no' => 'ADV2025-009',
                'description' => 'Design user-friendly interfaces for web applications.',
                'application_deadline' => Carbon::now()->addDays(9),
            ],
            [
                'title' => 'Security Analyst',
                'position_needed' => 1,
                'job_grade' => 'Grade 9',
                'advert_no' => 'ADV2025-010',
                'description' => 'Monitor and analyze cybersecurity threats and risks.',
                'application_deadline' => Carbon::now()->addDays(21),
            ],
        ];

        // Insert data
        foreach ($jobs as $job) {
            JobPosting::create($job);
        }
    }
}

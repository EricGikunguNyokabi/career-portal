<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
    use Symfony\Component\HttpFoundation\Response;

class ApplicantController extends Controller
{
    public function index()
    {
        // Eager load applicant and job details for efficiency
        $applicant = JobApplication::with(['applicant', 'job'])->get();
        
        return view("hr.applicants.index", compact("applicant"));
    }

    public function show($id)
    {
        // Show applicant details
        $application = JobApplication::with([
            'applicant', 
            'job',
            'applicant.education',
            'applicant.trainings',
            'applicant.work_experiences',
            'applicant.referees',
            'applicant.documents',
            ])->findOrFail($id);
        
        return view("hr.applicants.show", compact('application'));
    }

    

    public function view($file_name)
    {
        $filePath = 'documents/' . $file_name; // Ensure your files are stored in 'storage/app/public/documents/'
        
        if (!Storage::disk('public')->exists($filePath)) {
            abort(404, 'Document not found.');
        }

        return response()->file(storage_path('app/public/' . $filePath), [
            'Content-Disposition' => 'inline', // Ensures the file is displayed in the browser
        ]);
    }


    public function updateStatus(Request $request, $id)
    {
        $application = JobApplication::findOrFail($id);
        $application->status = $request->input('status');
        $application->save();

        return redirect()->back()->with('success', 'Application status updated successfully.');
    }



    // public function destroy($id)
    // {
    //     // Delete the applicant application
    //     $application = JobApplication::findOrFail($id);
    //     $application->delete();
        
    //     return redirect()->route('hr.applicants.index')->with('success', 'Application Deleted Successfully');
    // }
}

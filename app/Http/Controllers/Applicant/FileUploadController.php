<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class FileUploadController extends Controller
{
    // Display the file upload page
    public function index()
    {
        $documents = Documents::where('user_id',Auth::id())->get();
        return view('applicant.file_uploads.file_uploads', compact('documents')); // Replace with your actual view name
    }

    // Store the uploaded document
    public function store(Request $request)
    {
        $request->validate([
            'document' => 'required|file|mimes:pdf,png|max:2048', // Validate file type and size
        ]);

        $file = $request->file('document');
        $fileName = time() . '_' . $file->getClientOriginalName(); // Create a unique file name
        $file->storeAs('documents', $fileName, 'public'); // Store the file in the public storage

        // Save the document information to the database
        Documents::create([
            'user_id' => Auth::id(),
            'file_name' => $fileName,
        ]);

        return redirect()->route('applicant.files_upload')->with('status', 'Document uploaded successfully!');
    }

    // Delete the uploaded document
    public function destroy($id)
    {
        $document = Documents::findOrFail($id);
        Storage::disk('public')->delete('documents/' . $document->file_name); // Delete the file from storage
        $document->delete(); // Delete the record from the database

        return redirect()->route('applicant.files_upload')->with('status', 'Document deleted successfully!');
    }}

<?php
namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\PDF;

class JobController extends Controller
{
// Method to list all jobs
public function index()
{
$jobs = Job::all();
return view('home', ['jobs' => $jobs]);
}

// Method to show the create job form
public function create()
{
return view('jobs.create');
}

// Method to show a single job
public function show(Job $job)
{
return view('jobs.show', ['job' => $job]);
}

// Method to store a new job
public function store(Request $request)
{
$request->validate([
'naam' => 'required|string|max:255',
'voornaam' => 'required|string|max:255',
'username' => 'required|string|max:255',
'email' => 'required|email|max:255',
'type' => 'required|string|max:255',
'beschrijving' => 'required|string',
'bijlage' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
]);

$job = new Job();
$job->naam = $request->input('naam');
$job->voornaam = $request->input('voornaam');
$job->username = $request->input('username');
$job->email = $request->input('email');
$job->beschrijving = $request->input('beschrijving');
$job->type = $request->input('type');

if ($request->hasFile('bijlage')) {
$job->bijlage = $request->file('bijlage')->store('bijlages');
}

$job->save();

return redirect('/')->with('success', 'Uw casus is succesvol ingediend.');
}

// Method to edit a job
public function edit(Job $job)
{
return view('jobs.edit', ['job' => $job]);
}

// Method to delete a job
public function destroy(Job $job)
{
Gate::authorize('edit-job', $job);
$job->delete();

return redirect('/jobs');
}

    public function readme()
    {
        return view('readme');
    }

// Method to download a job's details as PDF
public function downloadPDF(Job $job)
{
// Generate the PDF
$pdf = PDF::loadView('jobs.pdf', ['job' => $job]);

// Define the file name and path
$fileName = 'job_details_' . $job->id . '.pdf';
$filePath = 'public/pdfs/' . $fileName;

// Save the PDF to storage
Storage::put($filePath, $pdf->output());

// Download the file
return response()->download(storage_path('app/' . $filePath))
->deleteFileAfterSend(true)
->with('success', 'Document successfully downloaded.');
}
}

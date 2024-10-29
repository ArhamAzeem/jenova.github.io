<?php
namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    // Store feedback
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|email',
            'message' => 'required|string|min:10',
        ]);

        // Create feedback record
        Feedback::create($request->only(['name', 'email', 'message']));

        // Redirect back with success message
        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }

    // Display all feedbacks in admin panel
    public function index()
    {
        // Fetch all feedback records with pagination (e.g., 10 per page)
        $feedbacks = Feedback::paginate(10);
        return view('admin.feedback.index', compact('feedbacks'));
    }

    // Display a single feedback
    public function show($id)
    {
        // Fetch a single feedback record
        $feedback = Feedback::findOrFail($id);
        return view('admin.feedback.show', compact('feedback'));
    }

    // Delete feedback
    public function destroy($id)
    {
        // Fetch the feedback record
        $feedback = Feedback::findOrFail($id);

        // Delete the feedback record
        $feedback->delete();

        // Redirect to index with success message
        return redirect()->route('admin.feedback.index')->with('success', 'Feedback deleted successfully');
    }
}

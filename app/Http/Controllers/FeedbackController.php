<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Category;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Feedback::class);

        $feedback = Feedback::all();
        return view('feedback.index',['categories'=>Category::all(), 'feedbacks'=>$feedback]);
    }

    public function create()
    {
        $this->authorize('create', Feedback::class);
        return view('feedback.create',['categories'=>Category::all()]);
    }

    public function store(FeedbackRequest $request)
    {
        $this->authorize('create', Feedback::class);

        Feedback::create($request->all()+['email'=>Auth::user()->email]);
        return back()->with('message',__('messages.create feedback'));
    }

    public function destroy(Feedback $feedback)
    {
        $this->authorize('delete',$feedback);
        $feedback->delete();
        return back()->with('message',__('messages.delete feedback'));
    }



}

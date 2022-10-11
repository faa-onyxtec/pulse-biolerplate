<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\FeedbackControllerRequest;
use App\Models\User;
use App\Models\Feedback;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = config('pulse.pagination');
        $feedbacks = Feedback::where('about_user_id', Auth::id())->with(['users' => function ($q) {
            $q->where('user_id', Auth::id());
        }])->get();
        return view('feedback.messages', compact('feedbacks'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $userlist = User::select('name', 'id')->where('id', '<>', $user_id)->get();
        $about_user = User::select('name', 'id')->where('id', '<>', $user_id)->get();

        return view('feedback.dashboard', compact('userlist', 'about_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\FeedbackControllerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo '<pre>'; print_r($request->all()); echo '</pre>';die;

        $request->validate([
            'user_id' => 'required',
            'feedback' => 'required',
            'anonymous' => 'required',
            'about_user' => 'required',
        ]);

        $to_user_ids = array();
        foreach ($request->user_id as $key => $value) {
            $to_user_ids[] = $value['id'];
        }

        $feedback = Feedback::create([
            'feedback' => $request->feedback,
            'anonymous' => $request->anonymous,
            'about_user_id' => $request->about_user,
            'from_user_id' => auth()->user()->id,
        ]);
        $feedback->users()->attach($to_user_ids);

        // $user_id = $feedback->about_user_id;
        // $user = User::find($user_id);

        // $details = [
        //     'name' => $user->name,
        //     'body' => 'You have received feedback.',
        //     'thanks' => 'Thank you',
        //     'offerText' => 'Check the feedback',
        //     'offerUrl' => url('/'),
        // ];
        // Notification::send($user, new EmailNotification($details));
        return redirect('/home')->with('success', 'Feedback Sent Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function feedbackList()
    {
        $feedbacks = Feedback::where('from_user_id', auth()->user()->id)->with(['users', 'about_user'])->get();

        return view('feedback.messages', compact('feedbacks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        if ($search != null) {
            $page = config('pulse.pagination');
            $feedbacks = Feedback::where('user_id', auth()->user()->id)
                ->where('feedback', 'like', '%' . request('search') . '%')->paginate($page);
            $feedbacks->appends(['search' => $search]);
            return view('feedback.messages', compact('feedbacks', 'search'));
        } else {
            return redirect('/index');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\User;
use App\Feedback;
use Auth;
class FeedbackController extends Controller
{
    public function location()
    {
		return $this->belongsTo(Location::class, 'location_id');
    }   
    public function user()
     {
     	return $this->belongsTo(User::class, 'user_id');
     } 
	public function showForm()
    {
    	return view('feedback.give');
    }
    public function giveFeedback(Request $request)
    {	
    	// Hier könnte ein Fehler sein, falsch einbgeunden
    	$user = Auth::user();
    	$location = null;
    	$feedback = New Feedback;
    	$feeebdack->location_id = $user->getLastConfirmedLcoation()->id;
    	$feedback->user_id = $user->id;
    	$feedback->text = $request->text;

    	$feedback->save();
    }
}

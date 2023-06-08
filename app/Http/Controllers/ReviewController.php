<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addReviewPost(Request $request)
    {
        $data = $request->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function ajaxAddReview(Request $request)
    {
        $data = $request->all();
        $name = isset($data['name']) ? $data['name'] : '';

        if ($name == '') {
            return response()->json([
                'status'=>false,
                'data'=>'Your name is required'
            ]);
        }
        $countrycode = "(".$data['countrycode'].")";
        $email = isset($data['email']) ? $data['email'] : '';
        $phoneNumber = isset($data['phone_1']) ?  $data['phone_1'] : '';

        if ($email == '' && $phoneNumber == '') {
            return response()->json([
                'status'=>false,
                'data'=>'Your phone-number or email or both, is required'
            ]);
        }

        if ($phoneNumber !== '' && substr($phoneNumber, 0, 1) === '0') {
            $phoneNumberWithoutZero = substr($phoneNumber, 1);
            $phoneNumber = $countrycode.$phoneNumberWithoutZero;
        }
    
        $user = User::where('email', $email)->orWhere('phone_1', $phoneNumber)->first();
        if(isset($user)){
            $user->name = $name;
            if(isset($user->email)){
                $user->email = $email !== '' ? $email : $user->email;
            }else{
                $user->email = $email !== '' ? $email : null;
            }

            if(isset($user->phone_1)){
                $user->phone_1 = $phoneNumber !== '' ? $phoneNumber : $user->phone_1;
            }else{
                $user->phone_1 = $phoneNumber !== '' ? $phoneNumber : null;
            }
            
            $user->save();
        } else {
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->phone_1 = $phoneNumber;
            $user->type = 'visitor';
            $user->save();
        }
        
        $review = new Review();
        $review->review_content = $data['review_content'];
        $review->property_id = $data['property_id'];
        $review->created_by = $user->id;
        $review->status = 'pending';
        $review->save();

        return response()->json([
            'status'=>true,
            'data'=>'Message sent successfully. We will get back to you!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

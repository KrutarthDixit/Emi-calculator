<?php

namespace App\Http\Controllers;

use App\Models\EmiHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function emi_history()
    {
        // Get Emi history of Authencated User
        $users = User::find(Auth::id())->emi_history()->paginate(10);
        return view('emi.history', compact('users'));
    }

    /**
     * Display the specified resource.
     */
    public function emi_view(EmiHistory $history)
    {
        // Get details of a history of Authencated User
        return view('emi.view', compact('history'));
    }

    /**
     * calculate emi.
     */
    public function emi_calculate(Request $request)
    {
        // User inputed Values
        $amount = (int)$request['amount'];
        $interst = (float)$request['intrest'];
        $duration = (int)$request['duration'];

        // Emi calculation
        $intPerMonth = $interst/12/100;
        $emi = $amount * (($intPerMonth * ( 1 +  $intPerMonth ) ** $duration) / (( 1 + $intPerMonth ) ** $duration - 1 ));
        $emi = round($emi,2);

        // Creating DB entery for authencated user
        User::find(Auth::id())->emi_history()->create([
            'amount'=> $amount,
            'intrest_rate' => $interst,
            'duration' => $duration,
            'emi_amount' => $emi
        ]);

        return json_encode($emi);
    }

}

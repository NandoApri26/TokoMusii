<?php

namespace App\Http\Controllers;

use App\Models\Paymentmethod;
use Illuminate\Http\Request;

class PaymentmethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentMethod = PaymentMethod::all();
        return view('paymentmethod.index', compact('paymentMethod'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paymentmethod.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'bankname' =>'required | min : 3 | max : 25',
                'accountnumber' => 'required| min : 3| max :25',
            ],
            [
                'bankname.required' => 'Bank name is required',
                'bankname.min'=> 'min 3 words',
                'bankname.max' => ' max 25',
                'accountnumber.required' => 'Bank name is required',
                'accountnumber.min'=> 'min 3 words',
                'accountnumber.max' => ' max 25',
            ]
        );
        PaymentMethod::create(
            [
                'bank_name' => $request->bankname,
                'account_number' => $request->accountnumber,
            ],
        );
        return redirect('/paymentmethod') -> with('status', 'Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paymentmethod  $paymentmethod
     * @return \Illuminate\Http\Response
     */
    public function show(Paymentmethod $paymentmethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paymentmethod  $paymentmethod
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentMethod $paymentmethod)
    {
        return view('paymentmethod.update', compact('paymentmethod')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paymentmethod  $paymentmethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentMethod $paymentmethod)
    {
        $request -> validate(
            [
                'bankname' =>'required | min : 3 | max : 25',
                'accountnumber' => 'required| min : 3| max :25',
            ],
            [
                'bankname.required' => 'Bank name is required',
                'bankname.min'=> 'min 3 words',
                'bankname.max' => ' max 25',
                'accountnumber.required' => 'Bank name is required',
                'accountnumber.min'=> 'min 3 words',
                'accountnumber.max' => ' max 25',
            ]
            );

            PaymentMethod::where('id', $paymentmethod->id)->update(
                [
                   
                    'bank_name' => $request->bankname,
                    'account_number' => $request->accountnumber,
                ]
                );
                return redirect('/paymentmethod')->with('status', 'Updated Successfully');
                
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paymentmethod  $paymentmethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentMethod $paymentmethod)
    {
        PaymentMethod::destroy('id', $paymentmethod->id);
        return redirect('/paymentmethod')->with('status',' Deleted Successfully ');
    }
}

<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showForm(Request $request)
    {
        $sum = $request->session()->pull('oat', '');
        return view('post.form', [
            'sum' => $sum
        ]);
    }
    public function doForm(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'sum_o' => 'required|numeric |max:100',
                'sum_t' => 'required|numeric |max:100'
            ],
            [
                'sum_x.required' => 'Nu kažką praleidai',
                'sum_y.required' => 'Nu kažką praleidai',
                'sum_x.max' => 'Nu labai jau daug',
                'sum_y.max' => 'Nu labai jau daug'
            ]
        );
        $request->flash();
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated);
        }
        $validated->after(function ($validated) use ($request) {
            if ($request->sum_x + $request->sum_y > 150) {
                $validated->errors()->add(
                    'x_y',
                    'Sum is to big!'
                );
            }
        });
        $sum =  $request->sum_o + $request->sum_t;
        dump($sum);

        //$request->session()->put('oat', $sum);
        $request->session()->put('status', 'Task was successful');
        $request->flash();
        return redirect()->route('showForm')->with('oat', $sum);
    }
}

$validator = Validator::make(

    [
        'sum_x' => 'required|numeric|max:100',
        'sum_y' => 'required|numeric|max:100',
    ]
);

$request->flash();

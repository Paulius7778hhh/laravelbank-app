<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\AccountlistController;

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
                'sum_o' => 'required|numeric|max:100',
                'sum_t' => 'required|numeric|max:100',
            ],
            [
                'sum_o.required' => 'Nu kažką praleidai',
                'sum_t.required' => 'Nu kažką praleidai',
                'sum_o.max' => 'Nu labai jau daug',
                'sum_t.max' => 'Nu labai jau daug'
            ]
        );

        $request->flash();

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $validator->after(function ($validator) use ($request) {
            if ($request->sum_o + $request->sum_t > 150) {
                $validator->errors()->add(
                    'o_t',
                    'Sum is to big!'
                );
            }
        });

        // $validator->after(fn ($validator) 
        // => $request->sum_x + $request->sum_y > 150 ? $validator->errors()->add('x_y', 'Sum is to big!') : null);





        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $sum = $request->sum_o + $request->sum_t;

        // dump($sum);

        // $request->session()->put('sum_result', $sum);
        //$request->flash();
        $request->session()->pull('status', 'Task was successful!');


        return redirect()->route('showForm')->with('oat', $sum);
    }
    public function welc(Request $request)
    {


        return view('welcome');
    }
    public static function account_nr()
    {

        $start = 0;
        $end3 = 3;
        $end4 = 4;
        $end2 = 2;
        $acountt = 'LT' . str_pad(rand(0, 99), $end2, $start, STR_PAD_LEFT) . ' 7300 0' . str_pad(rand(0, 999), $end3, $start, STR_PAD_LEFT) . ' ' . str_pad(rand(0, 9999), $end4, $start, STR_PAD_LEFT) . ' ' . str_pad(rand(0, 9999), $end4, $start, STR_PAD_LEFT);
        //if (A  == null) {
        return $acountt;
        //}
        //foreach ($data as $acount) {
        //    if ($acount['acount'] == $acountt) {
        //        while ($acount['acount'] !== $acountt) {
        //            return $acountt !== $acount['acount'];
        //        }
        //    } else {
        //        return $acountt;
        //    }
        //}
    }
}

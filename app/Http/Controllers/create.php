<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class create extends Controller
{
    public function wel(Request $request, $a, $b)
    {
        // return  '<h1>' . $b . ' wel ' . $request->a + $request->b . ' cum ' . $a . '</h1>';
        return  '<h1> wel ' . $request->a + $request->b . ' come </h1>';
    }
    public function FunctionName(Request $request, $a, $b)
    {
        return match ($request->nein) {
            'ka' => $a + $b,
            'yo' => $a - $b,
            'ken' => $a * $b,
            '2' => $a / $b,
            default => 'error'
        };
    }
    public function show()
    {
        $feverbeaver = 'beaverfever';
        return view('results', [
            'feverbeaver' => $feverbeaver,
            'number' => 999
        ]);
    }
}

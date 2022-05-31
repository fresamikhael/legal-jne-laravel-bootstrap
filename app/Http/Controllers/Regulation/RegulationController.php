<?php

namespace App\Http\Controllers\Regulation;

use App\Http\Controllers\Controller;
use App\Models\Regulation;
use Illuminate\Http\Request;

class RegulationController extends Controller
{
    public function index()
    {
        $database = Regulation::orderBy('name', 'ASC')
            ->filter(request(['rule_type', 'name', 'type']))
            ->paginate(10);

        return view('pages.user.regulation.index',compact('database'));
    }

    public function indexLegal()
    {
        $database = Regulation::orderBy('name', 'ASC')
            ->filter(request(['rule_type', 'name', 'type']))
            ->paginate(10);

        return view('pages.legal.regulation.index',compact('database'));
    }

    public function add()
    {
        return view('pages.legal.regulation.add');
    }

    public function show($id)
    {
        $database = Regulation::where('id', $id)
            ->first();

        return view('pages.user.regulation.detail', compact('database'));
    }
}

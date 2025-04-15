<?php

namespace App\Http\Controllers;

use App\Models\DuplicatedFund;
use Illuminate\Http\Request;

class DuplicatedFundsController extends Controller
{
    public function index(Request $request)
    {

        $duplicatedFunds = DuplicatedFund::with(['manager', 'funds'])->get();

        return response()->json($duplicatedFunds);
    }
}

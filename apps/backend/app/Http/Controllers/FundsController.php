<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class FundsController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $fundsQuery = Fund::with(['aliases', 'manager', 'companies']);

        if ($request->has('from')) {
            $fundsQuery->where('start_year', '<=', $request->input('from'));
        }

        if ($request->has('to')) {
            $fundsQuery->where('start_year', '>=', $request->input('to'));
        }

        if ($request->has('manager_id')) {
            $fundsQuery->where('manager_id', $request->input('manager_id'));
        }

        if ($request->has('name')) {
            $fundsQuery->where('name', 'like', '%'.$request->input('name').'%');
        }

        return response()->json($fundsQuery->get());
    }

    public function update(Request $request): JsonResponse
    {
        $fund = Fund::UpdateOrCreate(
            ['id' => $request->input('id')],
            Arr::except($request->all(), ['aliases', 'companies', 'manager']),
        );

        if ($request->has('aliases')) {
            $fund->aliases()->upsert($request->input('aliases'), ['id'], ['name']);
        }

        if ($request->has('companies')) {
            $fund->companies()->sync($request->input('companies'));
        }

        if ($request->has('manager')) {
            $fund->manager()->associate($request->input('manager'));
        }

        $fund->save();

        return response()->json(null, 204);
    }
}

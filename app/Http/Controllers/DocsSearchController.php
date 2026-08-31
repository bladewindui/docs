<?php

namespace App\Http\Controllers;

use App\Services\DocsSearchIndex;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DocsSearchController extends Controller
{
    public function __invoke(Request $request, DocsSearchIndex $search): JsonResponse
    {
        $validated = $request->validate([
            'q' => ['required', 'string', 'min:2', 'max:100'],
        ]);

        return response()->json([
            'query' => $validated['q'],
            'results' => $search->search($validated['q']),
        ]);
    }
}

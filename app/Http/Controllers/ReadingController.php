<?php

namespace App\Http\Controllers;

use App\Models\Reading;
use Illuminate\Http\Request;

class ReadingController extends Controller
{
    public function index(Request $request)
    {
        $query = Reading::query();

        if ($request->status && $request->status != "All") {
            $query->where('status', $request->status);
        }

        if ($request->type && $request->type != "All") {
            $query->where('type', $request->type);
        }

        $readings = $query->get();

        $total = Reading::count();

        $ongoing = Reading::where('status', 'Ongoing')->count();

        $completed = Reading::where('status', 'Completed')->count();

        return view('index', compact(
            'readings',
            'total',
            'ongoing',
            'completed'
        ));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        Reading::create([
            'title' => $request->title,
            'type' => $request->type,
            'status' => $request->status,
        ]);

        return redirect('/');
    }

    // ================= EDIT =================

    public function edit($id)
    {
        $reading = Reading::findOrFail($id);

        return view('edit', compact('reading'));
    }

    public function update(Request $request, $id)
    {
        $reading = Reading::findOrFail($id);

        $reading->update([
            'title' => $request->title,
            'type' => $request->type,
            'status' => $request->status,
        ]);

        return redirect('/');
    }

    // ================= DELETE =================

    public function destroy($id)
    {
        Reading::destroy($id);

        return redirect('/');
    }
}
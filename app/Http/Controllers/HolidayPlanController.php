<?php
namespace App\Http\Controllers;

use App\Models\HolidayPlan;
use Illuminate\Http\Request;
use PDF;

class HolidayPlanController extends Controller
{
    public function index()
    {
        return HolidayPlan::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        $holidayPlan = HolidayPlan::create($request->all());

        return response()->json($holidayPlan, 201);
    }

    public function show($id)
    {
        return HolidayPlan::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $holidayPlan = HolidayPlan::findOrFail($id);

        $request->validate([
            'title' => 'string|max:255',
            'description' => 'string',
            'date' => 'date',
            'location' => 'string|max:255',
        ]);

        $holidayPlan->update($request->all());

        return response()->json($holidayPlan, 200);
    }

    public function destroy($id)
    {
        $holidayPlan = HolidayPlan::findOrFail($id);
        $holidayPlan->delete();

        return response()->json(null, 204);
    }

    public function generatePdf($id)
    {
        $holidayPlan = HolidayPlan::findOrFail($id);
        $pdf = PDF::loadView('pdf.holiday_plan', compact('holidayPlan'));

        return $pdf->download('holiday_plan.pdf');
    }
}

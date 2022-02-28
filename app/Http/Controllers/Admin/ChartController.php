<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $monthlyOrders = Auth::user()->orders()->select([
            DB::raw("DATE_FORMAT(created_at, '%m') as month"),
            DB::raw('SUM(total) as total'),
        ])
            ->groupBy('month')
            ->orderBy('month')

            ->pluck('total', 'month')->all();

        $months = [];
        foreach ($monthlyOrders as $key => $value) {
            $months[] = date("F", mktime(0, 0, 0, $key, 10));
        }

        $yearlyOrders = Auth::user()->orders()->select([
            DB::raw("DATE_FORMAT(created_at, '%Y') as year"),
            DB::raw('SUM(total) as total'),
        ])
            ->groupBy('year')
            ->orderBy('year')
            ->pluck('total', 'year')->all();

        for ($i = 0; $i <= count($monthlyOrders); $i++) {
            $monthlyColours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }
        $monthlyChart = new Chart;
        $monthlyChart->labels = ($months);
        $monthlyChart->dataset = (array_values($monthlyOrders));
        $monthlyChart->colours = $monthlyColours;


        for ($i = 0; $i <= count($yearlyOrders); $i++) {
            $yearlyColours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }
        $yearlyChart = new Chart;
        $yearlyChart->labels = (array_keys($yearlyOrders));
        $yearlyChart->dataset = (array_values($yearlyOrders));
        $yearlyChart->colours = $yearlyColours;




        return view('admin.statistics', compact('monthlyOrders', 'yearlyOrders', 'monthlyChart', 'yearlyChart'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function show(Chart $chart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function edit(Chart $chart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chart $chart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chart $chart)
    {
        //
    }
}

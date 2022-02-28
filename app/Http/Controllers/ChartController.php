<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monthlyOrders = Order::select([
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
        $monthCount[] = count($monthlyOrders);

        $yearlyOrders = Order::select([
            DB::raw("DATE_FORMAT(created_at, '%Y') as year"),
            DB::raw('SUM(total) as total'),
        ])
            ->groupBy('year')
            ->orderBy('year')
            ->get();

        for ($i = 0; $i <= count($monthlyOrders); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }
        $chart = new Chart;

        $chart->labels = ($months);
        $chart->dataset = (array_values($monthlyOrders));
        $chart->colours = $colours;
        return view('admin.statistics', compact('monthlyOrders', 'yearlyOrders', 'chart'));

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class dashboardController extends Controller
{
    public function index()
    {

        $todayStart = Carbon::today()->startOfDay();
        $todayEnd = Carbon::today()->endOfDay();

        $todayPrice = DB::table('sell_products')->whereBetween('created_at', [$todayStart, $todayEnd])->sum('price');

        $yesterdayStart = Carbon::yesterday()->startOfDay();
        $yesterdayEnd = Carbon::yesterday()->endOfDay();

        $yesterdayPrice = DB::table('sell_products')->whereBetween('created_at', [$yesterdayStart, $yesterdayEnd])->sum('price');

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $thisMonthPrice = DB::table('sell_products')->whereBetween('created_at', [$startOfMonth, $endOfMonth])->sum('price');

        $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth();
        $endOfLastMonth = Carbon::now()->subMonth()->endOfMonth();

        $lastMonthPrice = DB::table('sell_products')->whereBetween('created_at', [$startOfLastMonth, $endOfLastMonth])->sum('price');

        return view('dashboard', compact('todayPrice', 'yesterdayPrice', 'thisMonthPrice', 'lastMonthPrice'));
    }
}

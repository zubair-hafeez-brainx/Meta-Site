<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ballance;
use App\Models\MetaRequest;
use App\Models\Settings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index() {
        $now = now();
        $lineChartData = [];
        $lineChartSeries = [];
        $res= MetaRequest::where('user_id', auth()->user()->id)->get()
            ->groupBy(function($val) {
                return Carbon::parse($val->created_at)->format('M');
            });

        foreach ($res as $key=>$item) {
            $lineChartData[] = $key;
            $lineChartSeries[] = $item->count();
        }

        $reqCount = MetaRequest::whereBetween('created_at', [$now->copy()->subMonth(), $now])->where(['is_paid' => false, 'user_id' => auth()->user()->id])->get()->count();
        $setting = Settings::where('name', 'Monthly Free Requests')->first();
        $settingPerReq = Settings::where('name', 'Per Request Price')->first();
        $ballance = Ballance::where('user_id', auth()->user()->id)->first();

        $remainFree = $setting->value - $reqCount > 0 ? $setting->value - $reqCount : 0;
        if ($ballance) {
            $remainPaid = $ballance->balance/$settingPerReq->value > 0 ? $ballance->balance/$settingPerReq->value : 0;
        }else {
            $remainPaid = 0;
        }

        return Inertia::render('Dashboard', [
            'line_data' => $lineChartData,
            'line_series' => $lineChartSeries,
            'pie_data' => [$reqCount, ($remainFree + $remainPaid)],
        ]);
    }
}

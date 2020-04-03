<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function dailyMunicipality() {
        return view('reports.daily_municipality');
    }

    public function chartsProvince() {
        return DB::select("SELECT t.date_updated,
        t.remaining_pum,
            t.pum,
         t.completed_quarantine,
         t.referred_pui,
         t.remaining_pum,
         t.pui,
         t.pui_dis,
         t.pui_ref,
         t.remaining_pui,
         t.mun,
        @running_total:=@running_total + t.remaining_pum AS cumulative_sum,
        @running_total_pui:=@running_total_pui + t.remaining_pui AS cumulative_sum_pui
        FROM
        ( SELECT 
            date( date_updated) AS date_updated,
            sum( pum_brgy) AS pum,
            sum( pum_brgy_completed_quarantine) AS completed_quarantine,
            sum( pum_brgy_referred_pui) AS referred_pui,
            sum( pum_brgy - pum_brgy_referred_pui - pum_brgy_completed_quarantine) AS remaining_pum,
            sum( pui_brgy) AS pui,
            sum( pui_dis) AS pui_dis,
            sum( pui_ref) AS pui_ref,
            sum( pui_brgy - pui_dis - pui_ref) AS remaining_pui,
            municipalities.munname as mun
        FROM tallies
        left join municipalities on tallies.municipality_id = municipalities.recid 
        GROUP BY tallies.municipality_id ) t
        JOIN (SELECT @running_total:=0,@running_total_pui:=0) r
        ORDER BY t.date_updated");
    }

    public function chartsDaily() {
        return DB::select("SELECT t.date_updated,
        t.remaining_pum,
            t.pum,
         t.completed_quarantine,
         t.referred_pui,
         t.remaining_pum,
         t.pui,
         t.pui_dis,
         t.pui_ref,
         t.remaining_pui,
         t.mun,
        @running_total:=@running_total + t.remaining_pum AS cumulative_sum,
        @running_total_pui:=@running_total_pui + t.remaining_pui AS cumulative_sum_pui
        FROM
        ( SELECT 
            date( date_updated) AS date_updated,
            sum( pum_brgy) AS pum,
            sum( pum_brgy_completed_quarantine) AS completed_quarantine,
            sum( pum_brgy_referred_pui) AS referred_pui,
            sum( GREATEST( pum_brgy - pum_brgy_completed_quarantine - pum_brgy_referred_pui, 0)) AS remaining_pum,
            sum( pui_brgy) AS pui,
            sum( pui_dis) AS pui_dis,
            sum( pui_ref) AS pui_ref,
            sum( GREATEST( pui_brgy - pui_dis - pui_ref, 0)) AS remaining_pui,
            municipalities.munname as mun
        FROM tallies
        left join municipalities on tallies.municipality_id = municipalities.recid 
        GROUP BY date_updated ) t
        JOIN (SELECT @running_total:=0,@running_total_pui:=0) r
        ORDER BY t.date_updated");
    }
}

<?php

namespace App\Http\Controllers;
Use DB;
use Illuminate\Http\Request;
use App\Models\bansos;
use App\Models\age;
class BansosController extends Controller
{
    //
    public function index(){
        $tampilbansos = bansos::all();
        return $tampilbansos;
    }

    public function get_gender(){
        $gender = bansos::select(DB::raw('COUNT(JENIS_KELAMIN) as JK, JENIS_KELAMIN'))
        ->where('JENIS_KELAMIN', '!=', 'NULL')
        ->groupBy('JENIS_KELAMIN')
        ->get();
        return response()->json($gender);
    }

    public function get_status(){
        $status = bansos::select(DB::raw('COUNT(LABEL) as LBL, LABEL'))
        ->where('LABEL', '!=', 'NULL')
        ->groupBy('LABEL')
        ->get();
        return response()->json($status);
    }

    public function get_opd(){
        $opd = bansos::select(DB::raw('COUNT(OPD_PENGAMPU) as opd, OPD_PENGAMPU'))
        ->where('OPD_PENGAMPU', '!=', 'NULL')
        ->groupBy('OPD_PENGAMPU')
        ->get();
        return response()->json($opd);
    }

    public function get_usia(){
        $age = age::all();
        return response()->json($age);
    }

    public function get_usia_ALL(){
        $lastAgeL = DB::select("SELECT DISTINCT(USIA) FROM age");

        $query = "
        (SELECT 1 AS USIA,
        CASE 
            WHEN (SELECT CU FROM age WHERE USIA = 1 AND JENIS_KELAMIN = 'L') IS NULL THEN 0
            WHEN (SELECT CU FROM age WHERE USIA = 1 AND JENIS_KELAMIN = 'L') IS NOT NULL THEN (SELECT CU FROM age WHERE USIA = 1 AND JENIS_KELAMIN = 'L') END AS L,
        CASE 
            WHEN (SELECT CU FROM age WHERE USIA = 1 AND JENIS_KELAMIN = 'P') IS NULL THEN 0
            WHEN (SELECT CU FROM age WHERE USIA = 1 AND JENIS_KELAMIN = 'P') IS NOT NULL THEN (SELECT CU FROM age WHERE USIA = 1 AND JENIS_KELAMIN = 'P') END AS P 
 FROM age LIMIT  1) 
        ";

        for($i = 2; $i <= end($lastAgeL)->USIA; $i++) {
            $query = $query . "
                UNION ALL 
                (SELECT $i AS USIA,
        CASE 
            WHEN (SELECT CU FROM age WHERE USIA = $i AND JENIS_KELAMIN = 'L') IS NULL THEN 0
            WHEN (SELECT CU FROM age WHERE USIA = $i AND JENIS_KELAMIN = 'L') IS NOT NULL THEN (SELECT CU FROM age WHERE USIA = $i AND JENIS_KELAMIN = 'L') END AS L,
        CASE 
            WHEN (SELECT CU FROM age WHERE USIA = $i AND JENIS_KELAMIN = 'P') IS NULL THEN 0
            WHEN (SELECT CU FROM age WHERE USIA = $i AND JENIS_KELAMIN = 'P') IS NOT NULL THEN (SELECT CU FROM age WHERE USIA = $i AND JENIS_KELAMIN = 'P') END AS P 
 FROM age LIMIT 1) 
            ";
        }
        // $ul = age::select(DB::raw('USIA, CU'))
        // ->where('JENIS_KELAMIN', '=', 'L')
        // ->get();

        $ul = DB::select($query);
        return response()->json($ul);
    }

    // public function get_usia_P(){
    //     $up = age::select(DB::raw('USIA, CU'))
    //     ->where('JENIS_KELAMIN', '=', 'P')
    //     ->get();
    //     return response()->json($up);
    // }

    public function get_domisili(){
        $domisili = bansos::select(DB::raw('COUNT(STATUS) as stat, STATUS'))
        ->where('STATUS', '!=', 'NULL')
        ->groupBy('STATUS')
        ->get();
        return response()->json($domisili);
    }


}

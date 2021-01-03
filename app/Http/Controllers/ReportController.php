<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Impression\Report\Report as Report;

class ReportController extends Controller
{

    /**
     * @var report
     */
    public $report;

    /**
     * @var Report Class Object
     */
    public function __construct(Report $report)
    {
       $this->report = $report;
    }

    /**
     * @return array 
     * 
     */
    public function index()
    {
        //echo '123'; exit;
         $myreport = $this->report->build->extract(); // $this->report->build->get();
            echo '<pre>'; print_r($myreport);exit;
    }
}

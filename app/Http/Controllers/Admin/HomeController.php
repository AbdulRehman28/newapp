<?php

namespace App\Http\Controllers\Admin;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    public function index()
    {
        
        $settings1 = [
            'chart_title'           => 'Pain',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Pain',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_days'           => '7',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
            'translation_key'       => 'pain',
        ];

        $chart1 = new LaravelChart($settings1);

        $settings2 = [
            'chart_title'           => 'Pain Type',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\PainType',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_days'           => '7',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
            'translation_key'       => 'painType',
        ];

        $chart2 = new LaravelChart($settings2);

        $settings3 = [
            'chart_title'           => 'Users',
            'chart_type'            => 'bar',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\User',
            'group_by_field'        => 'email_verified_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_days'           => '7',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
            'translation_key'       => 'user',
        ];

        $chart3 = new LaravelChart($settings3);

        return view('home', compact('chart1', 'chart2', 'chart3'));
    }
}

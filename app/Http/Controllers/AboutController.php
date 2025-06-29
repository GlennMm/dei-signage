<?php
// app/Http/Controllers/AboutController.php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Models\CoreValue;
use App\Models\CompanyTimeline;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $data = [
            'team_members' => TeamMember::active()->orderBy('sort_order')->get(),
            'core_values' => CoreValue::active()->orderBy('sort_order')->get(),
            'timeline' => CompanyTimeline::active()->orderBy('sort_order')->get(),
        ];

        return view('about', $data);
    }
}
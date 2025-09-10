<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentFormRegistration;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ['ROTC', 'CWTS', 'LTS'];
        $counts = [];

        $categoryGenderCounts = StudentFormRegistration::selectRaw('category, gender, COUNT(*) as count')
            ->whereIn('category', $categories)
            ->groupBy('category', 'gender')
            ->get();

        foreach ($categories as $category) {
            $male = $categoryGenderCounts->where('category', $category)->where('gender', 'male')->first();
            $female = $categoryGenderCounts->where('category', $category)->where('gender', 'female')->first();

            $counts[strtolower($category) . 'MaleCount'] = $male ? $male->count : 0;
            $counts[strtolower($category) . 'FemaleCount'] = $female ? $female->count : 0;
            $counts[strtolower($category) . 'TotalCount'] = ($male ? $male->count : 0) + ($female ? $female->count : 0);
        }

        // Get total counts for all students by gender
        $genderCounts = StudentFormRegistration::selectRaw('gender, COUNT(*) as count')
            ->groupBy('gender')
            ->get();

        $totalMale = $genderCounts->where('gender', 'male')->first();
        $totalFemale = $genderCounts->where('gender', 'female')->first();

        $counts['totalMaleCount'] = $totalMale ? $totalMale->count : 0;
        $counts['totalFemaleCount'] = $totalFemale ? $totalFemale->count : 0;
        $counts['totalStudentsCount'] = ($totalMale ? $totalMale->count : 0) + ($totalFemale ? $totalFemale->count : 0);

        return Inertia::render('Admin/Dashboard', $counts);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Donation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get statistics with error handling
        try {
            $stats = [
                'total_projects' => DB::table('projects')->count(),
                'total_donations' => DB::table('donations')->count(),
                'total_donation_amount' => DB::table('donations')->where('status', 'approved')->sum('amount') ?? 0,
                'pending_donations' => DB::table('donations')->where('status', 'pending')->count(),
                'total_team_members' => DB::table('team_members')->count(),
                'total_executive_members' => DB::table('executive_committee')->count(),
                'total_volunteers' => DB::table('volunteers')->count(),
                'total_news' => DB::table('latest_news')->count(),
                'total_publications' => DB::table('publications')->count(),
                'total_programs' => DB::table('programs')->count(),
                'total_contact_messages' => DB::table('messages')->count(),
            ];
        } catch (\Exception $e) {
            // If any query fails, set defaults
            $stats = [
                'total_projects' => 0,
                'total_donations' => 0,
                'total_donation_amount' => 0,
                'pending_donations' => 0,
                'total_team_members' => 0,
                'total_executive_members' => 0,
                'total_volunteers' => 0,
                'total_news' => 0,
                'total_publications' => 0,
                'total_programs' => 0,
                'total_contact_messages' => 0,
            ];
        }

        // Recent donations (last 7 for chart)
        try {
            $recentDonations = DB::table('donations')
                ->where('status', 'approved')
                ->orderBy('created_at', 'desc')
                ->limit(7)
                ->get(['amount', 'created_at', 'donor_name']);
        } catch (\Exception $e) {
            $recentDonations = collect();
        }

        // Monthly donation statistics (last 6 months)
        try {
            $monthlyDonations = DB::table('donations')
                ->select(
                    DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                    DB::raw('COUNT(*) as count'),
                    DB::raw('SUM(amount) as total')
                )
                ->where('status', 'approved')
                ->where('created_at', '>=', now()->subMonths(6))
                ->groupBy('month')
                ->orderBy('month', 'asc')
                ->get();
        } catch (\Exception $e) {
            $monthlyDonations = collect();
        }

        // Recent activities (projects, news, volunteers)
        try {
            $recentProjects = DB::table('projects')
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get(['id', 'title', 'created_at', 'image']);
        } catch (\Exception $e) {
            $recentProjects = collect();
        }

        try {
            $recentNews = DB::table('latest_news')
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get(['id', 'title', 'created_at', 'image']);
        } catch (\Exception $e) {
            $recentNews = collect();
        }

        // Pending items
        try {
            $pendingDonations = DB::table('donations')
                ->where('status', 'pending')
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
        } catch (\Exception $e) {
            $pendingDonations = collect();
        }

        // Project status distribution
        try {
            $projectsByStatus = DB::table('projects')
                ->select('status', DB::raw('COUNT(*) as count'))
                ->groupBy('status')
                ->get();
        } catch (\Exception $e) {
            $projectsByStatus = collect();
        }

        return view('admin.home', compact(
            'stats',
            'recentDonations',
            'monthlyDonations',
            'recentProjects',
            'recentNews',
            'pendingDonations',
            'projectsByStatus'
        ));
    }
}

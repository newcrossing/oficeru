<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use function React\Promise\all;

class HomeController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
        ];
        $user['all'] = DB::table('users')->count();
        $user['verif'] = DB::table('users')->orWhereNotNull('email_verified_at')->count();
        $user['noVerif'] = DB::table('users')->orWhereNull('email_verified_at')->count();

        $job['jobs'] = DB::table('jobs')->count();
        $job['failed_jobs'] = DB::table('failed_jobs')->count();


        $docs = DB::table('documents')->count();

        $logs = Activity::limit(200)->orderByDesc('created_at')->get();


        return view('backend.pages.home.index',
            compact(
                'breadcrumbs',
                'user',
                'job',
                'docs',
                'logs',
            )
        );
    }
}

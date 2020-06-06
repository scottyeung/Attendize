<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * redirect index page
     * @param  Request $request http request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function showIndex(Request $request)
    {
        if (empty(Auth::user())) {
            return redirect()->to('/login');
        }
        
        return redirect()->action(
            'OrganiserDashboardController@showDashboard', Auth::user()->organiser_id 
         );    
    }
}

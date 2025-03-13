<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthAdminRequest;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     *
     * fecth yesterday, today, this week, this month and this year from Order::s
     *
     * @return \Illuminate\Http\Response
     *
     */

    public function index()
    {
        $yesterday = Order::whereDate('created_at', Carbon::yesterday())->get();
        $today = Order::whereDate('created_at', Carbon::today())->get();
        $thisWeek = Order::whereDate('created_at', '>=', Carbon::now()->startOfWeek())->get();
        $thisMonth = Order::whereDate('created_at', '>=', Carbon::now()->startOfMonth())->get();
        $thisYear = Order::whereDate('created_at', '>=', Carbon::now()->startOfYear())->get();

        return view('admin.dashboard', [
            'yesterday' => $yesterday,
            'today' => $today,
            'thisWeek' => $thisWeek,
            'thisMonth' => $thisMonth,
            'thisYear' => $thisYear,
        ]);
    }

    /**
     *
     * show the admin login form
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function login()
    {
        if(!auth()->guard('admin')->check()){
            return view('login');
        }else{
            return redirect()->route('admin.dashboard');
        }
    }

    /**
     *
     * validate the admin login
     *
     * @return \Illuminate\Http\Response
     *
     */

    public function auth(AuthAdminRequest $request){

        $credentials = $request->validated();

        if(auth()->guard('admin')->attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
        ])) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')->with('success', 'Login successful');
        }else{
            return redirect()->route('admin.login')->with('error', 'Invalid credentials');
        }

    }

    /**
     *
     * Logout the admin
     *
     * @return \Illuminate\Http\Response
     *
     */

    public function logout(Request $request)
    {
        auth()->guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Logout successful');
    }

}

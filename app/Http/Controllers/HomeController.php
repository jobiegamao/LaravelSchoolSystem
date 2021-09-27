<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
       // dd(Auth::user()->hasRole(['Registrar','Finance','Teacher','Student']));
       if(!(Auth::user()->hasRole(['Registrar','Finance','Teacher','Student']))){
            switch(Auth::user()->Person->role){
                case 'Registrar':
                    Auth::user()->assignRole('Registrar');
                    break;
                case 'Finance':
                    Auth::user()->assignRole('Finance');
                    break;
                case 'Teacher':
                    Auth::user()->assignRole('Teacher');
                    break;
                case 'Student':
                    Auth::user()->assignRole('Student');
                    break;
                default:
                    break;
            
            }
        }

        

        return view('pages/home');
    }

}

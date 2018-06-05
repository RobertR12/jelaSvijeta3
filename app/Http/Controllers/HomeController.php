<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\mealsInterface;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('auth');


    }*/
    private $mealsRepo;

    public function __construct(mealsInterface $mealsRepo) {

        //$this->middleware('admin');
        $this->middleware('auth');
        $this->mealsRepo = $mealsRepo;


        return $mealsRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $para = $request->all();


        $mealsRepo = $this->mealsRepo->selectAll($request);


        return view('home')->with('mealsRepo', $mealsRepo);


        //return view('home');
    }


}

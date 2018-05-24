<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Meal;
use App\Contracts\mealsInterface;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Repositories\Eloquent\MealsRepository;



class MealsController extends Controller
{

    private $mealsRepo;

    public function __construct(mealsInterface $mealsRepo) {

        $this->mealsRepo = $mealsRepo;

        return $mealsRepo;
    }

    use SoftDeletes;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mealsRepo = $this->mealsRepo->selectAll($request);

        $this->mealsRepo->checkId($request,$mealsRepo);

        return response()->json([

            'data' => $mealsRepo

        ]);
    }

    /*public function MealID(Request $request, $mealID)
    {
        $mealsRepo = $this->mealsRepo->checkId($request,$mealID);

        return response()->json([

            'data2' => $mealsRepo

        ]);
    }*/

    public function mealID($meal)
    {
        $data['mealID'] = $meal;
        $meals = Meal::where('id', $meal);

        //$mealData = $this->mealID($meal)->;

        //dd($data);
        return response()->json([

            'data' => $meals

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        //
    }
}

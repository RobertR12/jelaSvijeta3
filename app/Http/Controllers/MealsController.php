<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Requests\formValidatorRequest;
use App\Meal;
use App\Language;
use Illuminate\Support\Facades\DB;
use App\Contracts\mealsInterface;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Repositories\Eloquent\MealsRepository;
use Illuminate\Support\Facades\Cache;

use Session;

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

   /* public function getAllMeals ($request)
    {
        $para = $request->all();

        $meals = $this->mealsRepo->selectAll();

        $meals = $this->task->getAll();
        $editTask = (isset($id)) ? $this->task->getById($id) : null;

        return view('tasks.index', compact('tasks', 'editTask'));

    }*/

    public function idMeals(Request $request)
   {
       $validator = $request->validate([
           'id' => 'required|unique:meals|max:500',
       ]);

       $mealsRepo = $this->mealsRepo->checkId($request->id);

       //dd($mealsRepo);

       return response()->json([
           'data' => $mealsRepo,
       ]);
       
   }
    public function catMeals(Request $request)
    {
        //dd($request->categoryId);
        $mealsRepo = $this->mealsRepo->checkCat($request->categoryId);

        //dd($mealsRepo);

        return response()->json([
            'data' => $mealsRepo,
        ]);
    }
    public function catIdMeals(Request $request)
    {
        $mealsRepo = $this->mealsRepo->checkIdAndCat($request->id, $request->categoryId);

        //dd($mealsRepo);
        // json prikaz podataka
        return response()->json([
            'data' => $mealsRepo,
        ]);

    }

    public function index(Request $request)
    {
        $para = $request->all();
        //dd($para);

        $value = Cache::get('key');
        dump($value);

        $mealsRepo = $this->mealsRepo->selectAll($request);

        /*if ($request->has('id'))
        {
            $mealsRepo =$this->mealsRepo->checkId($request,$mealsRepo);
        }
        if ($request->has('category'))
        {
            $mealsRepo2 =$this->mealsRepo->checkCat($request,$mealsRepo);
        }*/
        // json prikaz podataka
        /*return response()->json([
            'data' => $mealsRepo,
            //'data2' => $mealsRepo2,

        ]);*/

       /* $langid = $mealsRepo->language_id;

        $jezik = DB::table('meals as M')
            ->join('languages as Lang', 'M.language_id', '=', 'Lang.id')
            ->where('Lang.id', '=', $langid)
            ->select('Lang.id as ID','Lang.title as LT')
            ->get();*/
       

        return view('meals.index')->with('mealsRepo', $mealsRepo);
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategorije = DB::table('categories')->get();
        $language = DB::table('languages')->get();
        return view('meals.create', compact('kategorije'),compact('language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(formValidatorRequest $request)
    {
        $validator = $request->validated();

            $meal = new meal;

            $meal->title = $request->title;
            $meal->slug = $request->slug;
            $meal->category_id = $request->category_id;
            $meal->description = $request->description;
            $meal->language_id = $request->language_id;

            $meal->save();

            Session::flash('success', 'Jelo uspješno uneseno!');
            return redirect()->route('meals.show', $meal->id);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
        $meals = Meal::findOrFail($id);

        //dd($meals);

        return view('meals.show')->with('meals', $meals);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the user from db and save it as var

        $meal= Meal::find($id);
        $kategorije = DB::table('categories')->get();
        $language = DB::table('languages')->get();


        //return a view and pass in the var we prev created

        return view('meals.edit')->with('meal', $meal)->with('kategorije', $kategorije)->with('language', $language);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(formValidatorRequest $request, Meal $meal)
    {
        $validator = $request->validated();

        $meal = new meal;

        $meal->title = $request->input('title');
        $meal->slug = $request->input('slug');
        $meal->category_id = $request->input('category_id');
        $meal->description = $request->input('description');
        $meal->language_id = $request->input('language_id');

        $meal->save();

        Session::flash('success', 'Jelo uspješno ažurirano!');
        return redirect()->route('meals.show', $meal->id);
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

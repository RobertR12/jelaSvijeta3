<?php

    namespace App\Repositories\Eloquent;

    use App\Meal;


    use App\Contracts\mealsInterface;
    use Illuminate\Http\Request;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Illuminate\Support\Facades\DB;


    use Illuminate\Container\Container as App;




   class MealsRepository implements mealsInterface {

      use SoftDeletes;

      private $meals;

       /**
        * MealsRepository constructor.
        * @param $meals
        */
     /*  public function __construct($meals)
       {
           $this->meals = $meals;
       }*/


      public function selectAll($request) {


          $meals = Meal::all();

          return $meals;

      }

      public function setLang($request) {

          $language_id = isset($request['lang']) ? $request['lang'] : 3;
          $meals = Meal::where('language_id', $language_id);

          return $meals;
      }

      public function checkId($id) {

              $meals = Meal::find($id);
              return $meals;

      }
      public function checkCat($categoryId)
      {
          $meals = Meal::where('category_id', $categoryId)->get();
          return $meals;
      }
      public function checkIdAndCat($id, $categoryId){
          $meals = Meal::where('category_id', $categoryId)->where('id', $id)->get();

          return $meals;

      }
      public function checkTag($request, $meals) {

          if(isset($request['tags'])) {

              $tag=explode(',', $request['tags']);
              $meals->join('meal_tag', 'meals.id', '=', 'meal_tag.meal_id');
              $meals->wherein('meal_tag.tag_id', $tag);
          }
      }
      public function checkWith($request, $meals) {

          if(isset($request['with'])) {

              $kljucne = explode(',', $request['with']);
              $keywords = array('category', 'ingredient', 'tag');

              foreach ($kljucne as $x) {

                  if (in_array($x, $keywords, true)) {

                      $meals->with($x);
                  }
              }
          }
      }
      public function checkDiff_time($request, $meals) {

          if(isset($request['diff_time'])) {

              $time=$request['diff_time'];

              if( is_int($request['diff_time'] > 0)){

                  $meals->where('updated_at','>', $time)
                      ->orWhere('created_at','>', $time)
                      ->orWhere('deleted_at','>', $time)->withTrashed();
              }else{
                  $meals->where('updated_at','>', $time);
              }
          }
      }
      public function checkPerP($request, $meals) {

          if(isset($request['per_page'])) {

              $meals->paginate($request['per_page']);
          }
      }
      public function returnResults($meals) {

          $meals = $meals->get();
          return response()->json([

              'data' => $meals,
          ]);
      }

   }
?>
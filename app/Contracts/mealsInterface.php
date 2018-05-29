<?php
    namespace App\Contracts;



interface mealsInterface {

    public function selectAll($request);
    public function setLang($request);
    public function checkId($request);
    public function checkCat($request);
    public function checkTag($request, $meals);
    public function checkWith($request, $meals);
    public function checkDiff_time($request, $meals);
    public function checkPerP($request, $meals);
    public function returnResults($meals);
    public function checkIdAndCat($id, $categoryId);


}




?>
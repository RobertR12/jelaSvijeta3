<?php

namespace App\Repositories\Eloquent;

use App\Contracts\mealsInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;
use App\Exceptions\RepositoryException;

abstract class Repository implements mealsInterface {

    private  $app;
    protected $model;

    /**
     * Repository constructor.
     * @param $app
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    abstract function model();

    public function makeModel() {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model)
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

        return $this->model = $model;
    }


}

?>
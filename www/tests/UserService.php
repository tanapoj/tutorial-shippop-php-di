<?php

class User
{
    public $id;
    public $name;
    public $score;
}

class UserService
{

    private $model;

    function __construct(UserModel $model)
    {
        $this->model = $model;
    }

    function getUser(int $id): User
    {
        $user = new User();
        //$data = $this->model->selectUserById($id);
        ["id" => $id, "name" => $name, "score" => $score] = $this->model->selectUserById($id);
        $user->id = $id;
        $user->name = $name;
        $user->score = $score;
        return $user;
    }

}
<?php

include 'UserModel.php';
include 'UserService.php';

use PHPUnit\Framework\TestCase;

//class UserModelMock extends UserModel
//{
//    function selectUserById(int $id): array
//    {
//
//        return [
//            "id" => 1,
//            "name" => "Ann",
//            "score" => 50,
//        ];
//    }
//}

class TestUserService extends TestCase
{
    public function testGetUser()
    {
//        $model = new UserModel();
//        $model = new UserModelMock();

        $model = Mockery::mock("UserModel");

        $model->shouldReceive("selectUserById")
            ->times(2)
            ->andReturn(
                ["id"=>1,"name"=>"Ann","score"=>50],
                ["id"=>2,"name"=>"Bob","score"=>70]
            );

        $service = new UserService($model);

        $this->assertInstanceOf(UserService::class, $service);

        $user = $service->getUser(1);
        $this->assertEquals(1, $user->id);
        $this->assertEquals("Ann", $user->name);
        $this->assertEquals(50, $user->score);

        $user = $service->getUser(2);
        $this->assertEquals(2, $user->id);
        $this->assertEquals("Bob", $user->name);
        $this->assertEquals(70, $user->score);
    }
}
<?php

// class Lib
// {

// }

// class Api
// {
//     public function test(): string
//     {
//         return "Api::test()";
//     }
// }

// class Service
// {

//     private $api;
//     private $lib;

//     public function __construct(Api $api, Lib $lib)
//     {
//         $this->api = $api;
//         $this->lib = $lib;
//     }

//     public function fetch()
//     {
//         echo $this->api->test();
//     }

// }

// $api = new Api;
// $lib = new Lib;

// $container = [
//     strtolower(Api::class) => $api,
//     strtolower(Lib::class) => $lib,
// ];

// function someFunction(int $param, $param2)
// {

// }

// $c = new ReflectionClass(Service::class);
// $m = $c->getConstructor();
// $p = $m->getParameters();
// print_r($container);
// print_r($p);

// $params = [];
// foreach($p as $o){
//     $params[] = $container[$o->name];
// }
// print_r($params);
// $service = new Service(...$params);
// print_r($service);


// $service->fetch();

include 'autoload.php';

class Mailer
{
    public function mail($recipient, $content)
    {
        echo "send an email to the recipient: $recipient with `$content`";
    }
}

class Test{
    public function __construct()
    {
        echo "Test created!<br/>";
    }
}

class TestWrapper{
    public function __construct(Test $test)
    {
        echo "TestWrapper created!<br/>";
    }
}

class UserManager
{
    private $mailer;

    public function __construct(Mailer $mailer, Test $test)
    {
        $this->mailer = $mailer;
    }

    public function register($email, $password)
    {
        // The user just registered, we create his account
        // ...

        // We send him an email to say hello!
        $this->mailer->mail($email, 'Hello and welcome!');
    }
}

// $container = new DI\Container();

// $userManager = $container->get('UserManager');
// $userManager->register("test@test.com", "-");

// $us = $container->get('UserService');

//////////////////

$builder = new DI\ContainerBuilder();
// $builder->addDefinitions([
//     'TTT' => function(Psr\Container\ContainerInterface $di){
//         return new TestWrapper($di->get());
//     }
// ]);
$builder->addDefinitions([
    'TTT' => function(Psr\Container\ContainerInterface $di){
        return new TestWrapper($di->get(Test::class));
    }
]);
$container = $builder->build();

$ttt = $container->get('TTT');
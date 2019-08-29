<?php

//id=1

function getIdFromUrl()
{
    return $_GET['id'];
}

function mockGET($value, \Closure $closure)
{
    $prevValue = $_GET;
    $_GET = $value;
    $closure();
    $_GET = $prevValue;
}
$fn = function () {
    echo "inner id is " . $_GET['id'];
    mockGET(["id" => 3], function () {
        echo "inner id is " . $_GET['id'];
    });
};
mockGET(["id" => 2], $fn);

echo "outer id is " . $_GET['id'];

//////////////////////////

$fn = function ($a, $b) {
    return $a + $b;
};
$fn2 = function ($a, $b) {
    return $a * $b;
};

function run(\Closure $closure)
{
    return $closure(1, 2);
}

echo run($fn2);

echo $fn(1,2);







<?php

require_once __DIR__ . '/../Test.php';
require_once  __DIR__ . '/../../src/services/UserService.php';
require_once __DIR__ . '/../../src/bases/BaseService.php';
use bases\BaseService;
use services\UserService;
use test\Test;
use db\PDOInstance;

$testClass = new Test();
$userService = UserService::getInstance();

$testClass::add(
    function () use ($userService) {
        $user = $userService->register(
            "userTest",
            "userTestPassword",
            "userTestPassword"
        );
        return $user != null;
    },
    "Register user",
    "User Service"
);

$testClass::add(
    function () use ($userService) {
        $user = $userService->login(
            "userTest",
            "userTestPassword",
        );
        return $user != null;
    },
    "Login user",
    "User Service"
);

$testClass::add(
    function () use ($userService) {
        $user = $userService->getByUsername("userTest");
        return $user != null;
    },
    "Get user by username",
    "User Service"
);

$testClass::add(
    function () use ($userService) {
        $user = $userService->getById(1);
        return $user != null;
    },
    "Get user by id",
    "User Service"
);

$testClass::add(
    function () use ($userService) {
        $user = $userService->getAllUsers();
        $dbh = PDOInstance::getInstance()->getDbh();
        $stmt = $dbh->query("SELECT COUNT(*) FROM users");
        $count = $stmt->fetchColumn();
        echo $count;
        echo count($user);
        return count($user) == $count;
    },
    "Get all users",
    "User Service"
);

$testClass::add(
    function () use ($userService) {
        $user = $userService->isUsernameExist("userTest");
        return $user != null;
    },
    "Check Username Exist",
    "User Service"
);

foreach($testClass::run()['passed'] as $passedTest) {
    var_dump($passedTest);
    echo "<br>";
}
echo count($testClass::run()['passed']) . " tests passed from " . count($testClass::run()['tests']) . " tests.";
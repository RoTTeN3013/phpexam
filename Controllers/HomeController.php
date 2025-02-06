<?php

namespace Controllers;

class HomeController //Nincs szükség öröklődésre
{
    public function index()
    {
        include(__DIR__ . "/../Views/navigation.php");
        include(__DIR__ . "/../Views/welcome.php");
        include(__DIR__ . "/../Views/footer.php");
    }
}
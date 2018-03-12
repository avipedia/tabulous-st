<?php

class HomeController extends Controller
{
    public function index()
    {
        include APP . '/views/home/index.html.php';
    }
}
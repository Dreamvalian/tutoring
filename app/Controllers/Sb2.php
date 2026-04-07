<?php

namespace App\Controllers;

class Sb2 extends BaseController
{
    public function login(): string
    {
        return view('sb2/login');
    }

    public function dashboard(): string
    {
        return view('sb2/index');
    }

    public function daftarMengajar(): string
    {
        return view('sb2/tables');
    }

    public function register(): string
    {
        return view('sb2/register');
    }

    public function forgotPassword(): string
    {
        return view('sb2/forgot-password');
    }

    public function buttons(): string
    {
        return view('sb2/buttons');
    }

    public function cards(): string
    {
        return view('sb2/cards');
    }

    public function charts(): string
    {
        return view('sb2/charts');
    }

    public function utilitiesAnimation(): string
    {
        return view('sb2/utilities-animation');
    }

    public function utilitiesBorder(): string
    {
        return view('sb2/utilities-border');
    }

    public function utilitiesColor(): string
    {
        return view('sb2/utilities-color');
    }

    public function utilitiesOther(): string
    {
        return view('sb2/utilities-other');
    }

    public function blank(): string
    {
        return view('sb2/blank');
    }

    public function page404(): string
    {
        return view('sb2/404');
    }
}

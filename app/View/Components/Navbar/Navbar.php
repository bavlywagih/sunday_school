<?php

namespace App\View\Components\Navbar;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;


class Navbar extends Component
{
    public string $currentRouteName;
    public string|null $adminRole;
    public string|null $userRole;
    public string $loadPost;
    public string|null $Authname;
    public string $profile;
    public string $logout;
    public string $login;
    public string $library;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {


        $this->currentRouteName = request()->route()->getName();
        $this->adminRole = Auth()->user()?->role != 0;
        $this->userRole = Auth()->user()?->role == '0';
        $this->loadPost = route('load.post');
        $this->Authname = Auth()->check() ? Auth()->user()->username : null;
        $this->profile = route('profile');
        $this->logout = route('logout');
        $this->login = route('login.form');
        $this->library = route('library');


    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('navbar.navbar');
    }
}

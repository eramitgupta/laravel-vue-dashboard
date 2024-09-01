<?php

use Illuminate\Support\Facades\Route;

function sideMenu() : array
{
    return [
        [
            'name' => 'Dashboard',
            'href' => route('dashboard'),
            'icon' => 'heroicons-outline:home',
            'active' => Route::currentRouteName() === 'dashboard',
            'subMenu' => [],
        ],
        [
            'name' => 'Projects',
            'icon' => 'heroicons-outline:folder',
            'active' => Route::currentRouteName() === 'profile.edit',
            'subMenu' => [
                ['name' => 'Profile', 'href' => route('profile.edit'), 'active' => Route::currentRouteName() === 'profile.edit'],
                ['name' => 'Demo ', 'href' => route('login'), 'active' => Route::currentRouteName() === 'login'],
            ],
        ],
        [
            'name' => 'Help',
            'icon' => 'heroicons-outline:folder',
            'active' => Route::currentRouteName() === 'profile.register',
            'subMenu' => [
                ['name' => 'web', 'href' => route('register'), 'active' => Route::currentRouteName() === 'profile.edit']
            ],
        ],
    ];
}

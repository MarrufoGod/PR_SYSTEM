<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        return Inertia::render('ProfileForm'); // Asegúrate de que el nombre del componente coincida (puede ser Profile.vue o ProfileFormV.vue)
    }
}
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class CustomRegisterController extends Controller
{
    public function create()
    {
        return inertia('auth/Register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:USER,EMAIL'],
            'security_question' => ['required', 'string', 'max:255'],
            'security_answer' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 1. Generar ID de usuario único tipo US000123
        $userId = $this->generateUniqueUserId();

        // 2. Crear el usuario
        $user = Usuario::create([
            'ID' => $userId,
            'EMAIL' => $validated['email'],
            'PASSWORD' => Hash::make($validated['password']),
            'SECURITY_QUESTION' => $validated['security_question'], // texto visible
            'SECURITY_ANSWER' => Hash::make($validated['security_answer']), // encriptado
            'ID_ROLE' => 'CL', // Puedes ajustar esto si manejas roles al registrar
        ]);

        // 3. Crear el cliente relacionado
        Cliente::create([
            'ID' => null, // lo generará el trigger automáticamente
            'FIRST_NAME' => $validated['first_name'],
            'LAST_NAME' => $validated['last_name'],
            'IMAGE' => null,
            'HOME_PHONE' => null,
            'TELEPHONE_NUMBER' => null,
            'ID_USER' => $user->ID,
            'ID_ADDRESS' => null,
        ]);

        // 4. Iniciar sesión automáticamente
        Auth::login($user);

        return redirect()->route('home');
    }

    // Función para generar un ID único
    private function generateUniqueUserId()
    {
        do {
            $id = 'US' . str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);
        } while (Usuario::where('ID', $id)->exists());

        return $id;
    }
}

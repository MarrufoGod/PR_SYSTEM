<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Cliente;
use App\Models\Contractor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class CustomLoginController extends Controller
{
    public function showLoginForm()
    {
        return inertia('auth/Login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'identifier' => 'required|string',
            'auth_type' => 'required|in:password,security',
            'password' => 'nullable|string',
            'security_question' => 'nullable|string',
            'security_answer' => 'nullable|string',
        ]);

        $identifier = $request->identifier;

        // Buscar usuario por correo o nombre completo
        $user = Usuario::where('EMAIL', $identifier)->first();

        if (!$user) {
            // Buscar por nombre completo
            $cliente = Cliente::whereRaw("CONCAT(FIRST_NAME, ' ', LAST_NAME) = ?", [$identifier])->first();
            $contractor = Contractor::whereRaw("CONCAT(FIRST_NAME, ' ', LAST_NAME) = ?", [$identifier])->first();

            if ($cliente) {
                $user = $cliente->usuario;
            } elseif ($contractor) {
                $user = $contractor->usuario;
            }
        }

        if (!$user) {
            throw ValidationException::withMessages([
                'identifier' => 'Usuario no encontrado.',
            ]);
        }

        // Validar método de autenticación
        if ($request->auth_type === 'password') {
            if (!Hash::check($request->password, $user->PASSWORD)) {
                throw ValidationException::withMessages([
                    'password' => 'Contraseña incorrecta.',
                ]);
            }
        } elseif ($request->auth_type === 'security') {
            if (
                $request->security_question !== $user->SECURITY_QUESTION ||
                !Hash::check($request->security_answer, $user->SECURITY_ANSWER)
            ) {
                throw ValidationException::withMessages([
                    'security_answer' => 'Pregunta o respuesta de seguridad incorrecta.',
                ]);
            }
        }

        // Iniciar sesión
        Auth::login($user);

        // Redirección según el rol
        switch ($user->ID_ROLE) {
            case 'CL':
                return redirect()->route('home'); // Cambia si tu ruta de home tiene otro nombre
            case 'CO':
                return redirect()->route('contratista.dashboard');
            case 'AD':
                return redirect()->route('admin.dashboard');
            default:
                Auth::logout();
                return redirect()->route('login')->withErrors(['identifier' => 'Rol no permitido.']);
        }
    }
}

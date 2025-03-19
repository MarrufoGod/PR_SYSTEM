<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Inertia\Inertia;

class CategoryController extends Controller
{
    // Obtener todas las categorías para la vista "services"
    public function index()
    {
        $categories = Category::all()->map(function ($category) {
            return [
                'id' => $category->ID,
                'name' => $category->NAME,
                'image' => $category->IMAGE,
                'description' => $category->DESCRIPTION,
            ];
        })->toArray(); // Convertimos a arreglo
        
        // Devuelve los datos como respuesta JSON para que el frontend los consuma
        return response()->json($categories);
        //return Inertia::render('Services', ['categories' => $categories]);
        
        dd($categories); // Verifica que los datos son correctos // Pasar categorías a la vista 'Services'
    }

    // Mostrar el formulario para crear una nueva categoría (solo para administrador)
    public function create()
    {
        return Inertia::render('Categories/Create');
    }

    // Almacenar una nueva categoría (solo para administrador)
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|string|max:10|unique:categories,id',
            'name' => 'required|string|max:100',
            'image' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        Category::create([
            'id' => $request->id,
            'name' => $request->name,
            'image' => $request->image,
            'description' => $request->description,
        ]);

        return redirect()->route('categories.index')->with('success', 'Categoría creada con éxito.');
    }

    // Mostrar una categoría específica (solo para administrador)
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return Inertia::render('Categories/Show', ['category' => $category]);
    }

    // Mostrar el formulario para editar una categoría existente (solo para administrador)
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return Inertia::render('Categories/Edit', ['category' => $category]);
    }

    // Actualizar una categoría existente (solo para administrador)
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'image' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'image' => $request->image,
            'description' => $request->description,
        ]);

        return redirect()->route('categories.index')->with('success', 'Categoría actualizada con éxito.');
    }

    // Eliminar una categoría (solo para administrador)
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Categoría eliminada con éxito.');
    }
}

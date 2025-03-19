<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Inertia\Inertia;

class CategoryController extends Controller
{
     // Obtener todas las categorías
     public function index()
     {
         $categories = Category::all(); // Obtener todas las categorías
         return Inertia::render('Categories/Index', ['categories' => $categories]);
     }
 
     // Mostrar el formulario para crear una nueva categoría
     public function create()
     {
         return Inertia::render('Categories/Create');
     }
 
     // Almacenar una nueva categoría
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
 
     // Mostrar una categoría específica
     public function show($id)
     {
         $category = Category::findOrFail($id);
         return Inertia::render('Categories/Show', ['category' => $category]);
     }
 
     // Mostrar el formulario para editar una categoría existente
     public function edit($id)
     {
         $category = Category::findOrFail($id);
         return Inertia::render('Categories/Edit', ['category' => $category]);
     }
 
     // Actualizar una categoría existente
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
 
     // Eliminar una categoría
     public function destroy($id)
     {
         $category = Category::findOrFail($id);
         $category->delete();
 
         return redirect()->route('categories.index')->with('success', 'Categoría eliminada con éxito.');
     }
}

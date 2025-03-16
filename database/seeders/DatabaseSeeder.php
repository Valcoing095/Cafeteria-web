<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use APP\Models\Usuario;
use APP\Models\Rol;
use APP\Models\categoriaProducto;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Usuario::create([
        //     'nombre'   => 'Juan',
        //     'apellido' => 'Pérez',
        //     'email'    => 'juan.perez@email.com',
        //     'password' => bcrypt('password123'), // Encriptar contraseña
        //     'id_rol'   => 1 // Asignar un rol por defecto
        // ]);

        DB::table('roles')->insert([
            ['rol'=>'Cliente'],
            ['rol'=>'Administrador'],
            ['rol'=>'Empleado'],
            ['rol'=>'Otro'],
        ]);

        DB::table('categoria_productos')->insert([
            // 🏪 Tienda
            ['categoria' => 'Abarrotes', 'tipo' => 'tienda'],
            ['categoria' => 'Bebidas y refrescos', 'tipo' => 'tienda'],
            ['categoria' => 'Lácteos y derivados', 'tipo' => 'tienda'],
            ['categoria' => 'Carnes y embutidos', 'tipo' => 'tienda'],
            ['categoria' => 'Frutas y verduras', 'tipo' => 'tienda'],
            ['categoria' => 'Panadería y repostería', 'tipo' => 'tienda'],
            ['categoria' => 'Dulces y snacks', 'tipo' => 'tienda'],
            ['categoria' => 'Productos de limpieza', 'tipo' => 'tienda'],
            ['categoria' => 'Higiene personal', 'tipo' => 'tienda'],
            ['categoria' => 'Congelados', 'tipo' => 'tienda'],
            ['categoria' => 'Productos orgánicos', 'tipo' => 'tienda'],
            ['categoria' => 'Enlatados y conservas', 'tipo' => 'tienda'],
            ['categoria' => 'Cereales y granos', 'tipo' => 'tienda'],
            ['categoria' => 'Especias y condimentos', 'tipo' => 'tienda'],
            ['categoria' => 'Mascotas', 'tipo' => 'tienda'],

            // ☕ Cafetería
            ['categoria' => 'Café caliente', 'tipo' => 'cafeteria'],
            ['categoria' => 'Café frío y frappés', 'tipo' => 'cafeteria'],
            ['categoria' => 'Infusiones y tés', 'tipo' => 'cafeteria'],
            ['categoria' => 'Jugos y batidos', 'tipo' => 'cafeteria'],
            ['categoria' => 'Postres y pastelería', 'tipo' => 'cafeteria'],
            ['categoria' => 'Panadería artesanal', 'tipo' => 'cafeteria'],
            ['categoria' => 'Sándwiches y bocadillos', 'tipo' => 'cafeteria'],
            ['categoria' => 'Desayunos', 'tipo' => 'cafeteria'],
            ['categoria' => 'Ensaladas', 'tipo' => 'cafeteria'],
            ['categoria' => 'Snacks y acompañamientos', 'tipo' => 'cafeteria'],
            ['categoria' => 'Productos sin gluten', 'tipo' => 'cafeteria'],
            ['categoria' => 'Opciones veganas', 'tipo' => 'cafeteria'],
            ['categoria' => 'Bebidas alcohólicas', 'tipo' => 'cafeteria'],
            ['categoria' => 'Chocolates y malteadas', 'tipo' => 'cafeteria'],

            // 🥖 Panadería
            ['categoria' => 'Panes artesanales', 'tipo' => 'panaderia'],
            ['categoria' => 'Panes dulces', 'tipo' => 'panaderia'],
            ['categoria' => 'Panes salados', 'tipo' => 'panaderia'],
            ['categoria' => 'Pan integral y saludable', 'tipo' => 'panaderia'],
            ['categoria' => 'Pasteles y tortas', 'tipo' => 'panaderia'],
            ['categoria' => 'Bizcochos y magdalenas', 'tipo' => 'panaderia'],
            ['categoria' => 'Donas y churros', 'tipo' => 'panaderia'],
            ['categoria' => 'Empanadas y hojaldres', 'tipo' => 'panaderia'],
            ['categoria' => 'Tartas y quiches', 'tipo' => 'panaderia'],
            ['categoria' => 'Postres tradicionales', 'tipo' => 'panaderia'],
            ['categoria' => 'Bollería francesa', 'tipo' => 'panaderia'],
            ['categoria' => 'Pan de molde y baguettes', 'tipo' => 'panaderia'],
            ['categoria' => 'Productos sin azúcar', 'tipo' => 'panaderia'],
            ['categoria' => 'Opciones sin gluten', 'tipo' => 'panaderia'],
            ['categoria' => 'Rellenos y acompañamientos', 'tipo' => 'panaderia']
        ]);
        

        
    }
}

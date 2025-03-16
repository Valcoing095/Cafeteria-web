<?php
namespace Database\Seeders;

use Illuminate\Database\seeder;
use Illuminate\Support\Facades\DB;
class ProductosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('productos')->insert([
            // 🏪 Tienda
            ['nombre' => 'Arroz', 'descripcion' => 'Arroz blanco premium', 'valor_bruto' => 5000, 'iva' => 5, 'descuento' => 0, 'stock' => 100, 'id_categoria' => 1, 'created_at' => now()],
            ['nombre' => 'Aceite de Girasol', 'descripcion' => 'Aceite 100% puro', 'valor_bruto' => 12000, 'iva' => 10, 'descuento' => 5, 'stock' => 50, 'id_categoria' => 1, 'created_at' => now()],
            ['nombre' => 'Pasta', 'descripcion' => 'Pasta de trigo duro', 'valor_bruto' => 4000, 'iva' => 5, 'descuento' => 0, 'stock' => 80, 'id_categoria' => 1, 'created_at' => now()],
            ['nombre' => 'Azúcar', 'descripcion' => 'Azúcar refinada', 'valor_bruto' => 3000, 'iva' => 5, 'descuento' => 0, 'stock' => 90, 'id_categoria' => 1, 'created_at' => now()],
            ['nombre' => 'Sal', 'descripcion' => 'Sal marina', 'valor_bruto' => 2000, 'iva' => 5, 'descuento' => 0, 'stock' => 100, 'id_categoria' => 1, 'created_at' => now()],

            // ☕ Cafetería
            ['nombre' => 'Café Expreso', 'descripcion' => 'Café fuerte y concentrado', 'valor_bruto' => 6000, 'iva' => 10, 'descuento' => 0, 'stock' => 50, 'id_categoria' => 16, 'created_at' => now()],
            ['nombre' => 'Capuchino', 'descripcion' => 'Café con espuma de leche', 'valor_bruto' => 8000, 'iva' => 10, 'descuento' => 5, 'stock' => 30, 'id_categoria' => 16, 'created_at' => now()],
            ['nombre' => 'Té Verde', 'descripcion' => 'Té antioxidante natural', 'valor_bruto' => 5000, 'iva' => 5, 'descuento' => 0, 'stock' => 40, 'id_categoria' => 18, 'created_at' => now()],
            ['nombre' => 'Chocolate Caliente', 'descripcion' => 'Bebida caliente con cacao', 'valor_bruto' => 7000, 'iva' => 10, 'descuento' => 0, 'stock' => 35, 'id_categoria' => 29, 'created_at' => now()],
            ['nombre' => 'Batido de Fresa', 'descripcion' => 'Refrescante batido con fruta', 'valor_bruto' => 7500, 'iva' => 10, 'descuento' => 5, 'stock' => 25, 'id_categoria' => 19, 'created_at' => now()],

            // 🥖 Panadería
            ['nombre' => 'Pan Francés', 'descripcion' => 'Pan crujiente y dorado', 'valor_bruto' => 3500, 'iva' => 5, 'descuento' => 0, 'stock' => 100, 'id_categoria' => 30, 'created_at' => now()],
            ['nombre' => 'Croissant', 'descripcion' => 'Pan hojaldrado con mantequilla', 'valor_bruto' => 4000, 'iva' => 5, 'descuento' => 0, 'stock' => 80, 'id_categoria' => 30, 'created_at' => now()],
            ['nombre' => 'Pan Integral', 'descripcion' => 'Pan saludable con fibra', 'valor_bruto' => 4500, 'iva' => 5, 'descuento' => 0, 'stock' => 60, 'id_categoria' => 33, 'created_at' => now()],
            ['nombre' => 'Torta de Chocolate', 'descripcion' => 'Pastel con cobertura de chocolate', 'valor_bruto' => 12000, 'iva' => 10, 'descuento' => 10, 'stock' => 40, 'id_categoria' => 35, 'created_at' => now()],
            ['nombre' => 'Churros', 'descripcion' => 'Churros rellenos de arequipe', 'valor_bruto' => 5000, 'iva' => 5, 'descuento' => 0, 'stock' => 50, 'id_categoria' => 37, 'created_at' => now()],
        ]);
    }
}
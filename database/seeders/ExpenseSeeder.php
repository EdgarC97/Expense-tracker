<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Expense;
use App\Models\Category;

class ExpenseSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();

        $descriptions = [
            'Comida' => [
                'Almuerzo en restaurante',
                'Compra de víveres semanal',
                'Cena con amigos',
                'Café y snack en la oficina',
                'Pedido de comida a domicilio'
            ],
            'Transporte' => [
                'Recarga de tarjeta de transporte público',
                'Gasolina para el coche',
                'Viaje en taxi',
                'Mantenimiento del vehículo',
                'Peaje de autopista'
            ],
            'Ocio' => [
                'Entradas de cine',
                'Suscripción mensual a plataforma de streaming',
                'Compra de libro',
                'Entrada a concierto',
                'Salida a bar con amigos'
            ],
            'Hogar' => [
                'Pago de alquiler',
                'Factura de electricidad',
                'Compra de artículos de limpieza',
                'Reparación de electrodoméstico',
                'Decoración para el salón'
            ],
            'Salud' => [
                'Consulta médica',
                'Compra de medicamentos',
                'Sesión de fisioterapia',
                'Suscripción a gimnasio',
                'Compra de suplementos vitamínicos'
            ]
        ];

        for ($i = 0; $i < 50; $i++) {
            $category = $categories->random();
            $description = $descriptions[$category->name][array_rand($descriptions[$category->name])];

            Expense::create([
                'description' => $description,
                'amount' => rand(100, 10000) / 100,
                'category_id' => $category->id,
                'date' => now()->subDays(rand(0, 30))->format('Y-m-d')
            ]);
        }
    }
}

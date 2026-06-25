<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'beyri.zm@gmail.com'],
            [
                'name' => 'Administradora Zela Glow',
                'password' => Hash::make('DORAEMON'),
                'role' => 'admin',
            ]
        );

        $categories = [
            ['name' => 'Cuidado facial', 'description' => 'Rutinas para hidratar, limpiar y proteger la piel.'],
            ['name' => 'Maquillaje', 'description' => 'Bases, labiales, sombras y acabados radiantes.'],
            ['name' => 'Cuidado capilar', 'description' => 'Productos para brillo, reparacion y control del cabello.'],
            ['name' => 'Fragancias', 'description' => 'Aromas delicados para uso diario y ocasiones especiales.'],
            ['name' => 'Cuidado corporal', 'description' => 'Texturas suaves para nutrir y perfumar la piel.'],
            ['name' => 'Accesorios', 'description' => 'Herramientas practicas para la rutina de belleza.'],
            ['name' => 'Belleza coreana', 'description' => 'Esencias, mascarillas y tendencias K-beauty.'],
            ['name' => 'Ofertas', 'description' => 'Promociones simuladas de temporada.'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['name' => $category['name']], $category + ['status' => 'Activo']);
        }

        $products = [
            ['Cuidado facial', 'Gel limpiador rosa', 'GlowLab', 'Gel suave para limpieza diaria con agua de rosas y acabado fresco.', 38.90, 25, 'https://images.unsplash.com/photo-1556228578-8c89e6adf883?auto=format&fit=crop&w=900&q=80'],
            ['Cuidado facial', 'Serum vitamina C', 'Zela Skin', 'Serum iluminador para tono uniforme y apariencia radiante.', 59.90, 18, 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&w=900&q=80'],
            ['Cuidado facial', 'Crema hidratante velvet', 'Lumiere', 'Hidratante ligera para piel normal a seca con textura aterciopelada.', 46.50, 30, 'https://images.unsplash.com/photo-1596755389378-c31d21fd1273?auto=format&fit=crop&w=900&q=80'],
            ['Maquillaje', 'Base satinada beige', 'Bella Pop', 'Base de cobertura media con acabado natural y larga duracion.', 52.00, 20, 'https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?auto=format&fit=crop&w=900&q=80'],
            ['Maquillaje', 'Labial fucsia bloom', 'Zela Color', 'Labial cremoso en tono fucsia intenso para looks vibrantes.', 24.90, 40, 'https://images.unsplash.com/photo-1586495777744-4413f21062fa?auto=format&fit=crop&w=900&q=80'],
            ['Maquillaje', 'Paleta rose nude', 'MakeMe', 'Sombras rosadas y neutras con acabado mate y satinado.', 68.00, 15, 'https://images.unsplash.com/photo-1512496015851-a90fb38ba796?auto=format&fit=crop&w=900&q=80'],
            ['Cuidado capilar', 'Shampoo brillo perlado', 'Hair Aura', 'Limpieza capilar con efecto brillo para cabello opaco.', 32.90, 28, 'https://images.unsplash.com/photo-1626806819282-2c1dc01a5e0c?auto=format&fit=crop&w=900&q=80'],
            ['Cuidado capilar', 'Mascarilla reparadora', 'Capilaria', 'Tratamiento nutritivo para puntas secas y cabello procesado.', 44.90, 16, 'https://images.unsplash.com/photo-1608248597279-f99d160bfcbc?auto=format&fit=crop&w=900&q=80'],
            ['Cuidado capilar', 'Aceite argan glow', 'Hair Aura', 'Aceite ligero para sellar puntas y controlar el frizz.', 35.00, 22, 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&w=900&q=80'],
            ['Fragancias', 'Perfume floral blush', 'Aroma Z', 'Fragancia floral suave con notas dulces y frescas.', 79.90, 12, 'https://images.unsplash.com/photo-1541643600914-78b084683601?auto=format&fit=crop&w=900&q=80'],
            ['Fragancias', 'Body mist vanilla', 'Soft Muse', 'Bruma corporal de vainilla para reaplicar durante el dia.', 29.90, 35, 'https://images.unsplash.com/photo-1594035910387-fea47794261f?auto=format&fit=crop&w=900&q=80'],
            ['Fragancias', 'Perfume citrus chic', 'Aroma Z', 'Aroma citrico elegante para energia y frescura.', 84.00, 10, 'https://images.unsplash.com/photo-1587017539504-67cfbddac569?auto=format&fit=crop&w=900&q=80'],
            ['Cuidado corporal', 'Crema corporal almendra', 'Body Glow', 'Crema nutritiva con aroma calido y textura sedosa.', 39.90, 27, 'https://images.unsplash.com/photo-1617897903246-719242758050?auto=format&fit=crop&w=900&q=80'],
            ['Cuidado corporal', 'Exfoliante sugar pink', 'Body Glow', 'Exfoliante corporal con particulas suaves y aroma frutal.', 34.50, 24, 'https://images.unsplash.com/photo-1608248543803-ba4f8c70ae0b?auto=format&fit=crop&w=900&q=80'],
            ['Cuidado corporal', 'Aceite corporal luminoso', 'Zela Body', 'Aceite con brillo delicado para acabado luminoso en la piel.', 49.90, 14, 'https://images.unsplash.com/photo-1608571423902-eed4a5ad8108?auto=format&fit=crop&w=900&q=80'],
            ['Accesorios', 'Brocha kabuki soft', 'Make Tools', 'Brocha compacta para aplicar base o polvo con acabado uniforme.', 27.90, 30, 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&w=900&q=80'],
            ['Accesorios', 'Esponja beauty drop', 'Make Tools', 'Esponja suave para difuminar productos liquidos y cremosos.', 16.90, 55, 'https://images.unsplash.com/photo-1607602132700-068258431a31?auto=format&fit=crop&w=900&q=80'],
            ['Accesorios', 'Set vincha skincare', 'Zela Tools', 'Vincha y munecas suaves para rutinas de limpieza facial.', 22.00, 32, 'https://images.unsplash.com/photo-1522338242992-e1a54906a8da?auto=format&fit=crop&w=900&q=80'],
            ['Belleza coreana', 'Mascarilla sheet tea tree', 'K-Glow', 'Mascarilla calmante inspirada en la rutina coreana.', 9.90, 80, 'https://images.unsplash.com/photo-1570554886111-e80fcca6a029?auto=format&fit=crop&w=900&q=80'],
            ['Belleza coreana', 'Essence snail repair', 'K-Glow', 'Esencia hidratante para una piel con apariencia mas elastica.', 61.90, 17, 'https://images.unsplash.com/photo-1612817288484-6f916006741a?auto=format&fit=crop&w=900&q=80'],
            ['Belleza coreana', 'Toner rice balance', 'Seoul Belle', 'Tonico ligero con extracto de arroz para suavidad diaria.', 42.90, 21, 'https://images.unsplash.com/photo-1601049541289-9b1b7bbbfe19?auto=format&fit=crop&w=900&q=80'],
            ['Ofertas', 'Pack glow inicio', 'Zela Glow', 'Kit promocional con limpiador, hidratante y mascarilla.', 89.90, 9, 'https://images.unsplash.com/photo-1598440947619-2c35fc9aa908?auto=format&fit=crop&w=900&q=80'],
            ['Ofertas', 'Duo labios y mejillas', 'Zela Color', 'Promocion demo con labial y rubor cremoso.', 41.90, 19, 'https://images.unsplash.com/photo-1599305090598-fe179d501227?auto=format&fit=crop&w=900&q=80'],
            ['Ofertas', 'Rutina corporal glow', 'Body Glow', 'Combo de exfoliante y crema corporal para piel luminosa.', 64.90, 11, 'https://images.unsplash.com/photo-1612817288484-6f916006741a?auto=format&fit=crop&w=900&q=80'],
        ];

        foreach ($products as [$categoryName, $name, $brand, $description, $price, $stock, $image]) {
            $category = Category::where('name', $categoryName)->first();
            Product::updateOrCreate(
                ['name' => $name],
                [
                    'category_id' => $category->id,
                    'brand' => $brand,
                    'description' => $description,
                    'price' => $price,
                    'stock' => $stock,
                    'image' => $image,
                    'status' => 'Activo',
                ]
            );
        }
    }
}

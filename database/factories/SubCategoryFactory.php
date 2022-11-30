<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategory>
 */
class SubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nombre = $this->faker->unique->randomElement(['Equipos de música','Radiograbador',
        'DVD','Parlantes','Movie Theatre', 'MP3 MP4 y más', 'Televisores',
        'Stereo', 'Planchitas','Secadores', 'Afeitadoras', 'Depiladoras', 'Nebulizadores', 'Cortadora de Pelo',
        'Tensiómetro', ' Balanza', 'Rizador', 'Almohadas', 'Colchón', 'Sommiers', 'Sabana', 
        'Notebooks', 'Netbooks', 'Monitores', 'PCs', 'Video Juegos', 'Pen Driver - TM', 'Celulares', 'Impresora',
        'Bicicletas', 'Camping', 'Jardín', 'Pileta', 'Lavarropas', 'Secarropas', 'Calefactores', 'Caloventor',
        'Termotanque', 'Calefones', 'Estufas', 'Cocinas', 'Exhibidor', 'Freezer', 'Heladeras', 'Aires Acondicionados',
        'Ventilador']);
        
        /*'Batidoras', 'Planchas', 'Pavas Eléctricas', 'Multiprocesadras', 'Vajillas', 'Picadora',
        'Juguera Eléctrica', 'Licuadoras', 'Horno Eléctrico', 'Microondas', 'Máquina de coser', 'Teléfonos',
        'Cámaras de fotos', 'Pastalinda', 'Raviolera', 'Horno Pizzero', 'Lavavajillas', 'Extractor', 
        'Contador de Billetes', 'Tostadora', 'Cortadora de Fiambre', 'Mesadas', 'Amoladora', 'Taladro',
        'Cepillo', 'Lijadora', 'Hormigonera', 'Motosierra', 'Compresor', 'Chifonier', 'Cuchetas',
        'Juego de Comedor', 'Juego de Living', 'Mesas', 'Sillas', 'Juego de Dormitorio', 'Camas', 'Mesa de Luz',
        'Mesa de TV', 'Modular', 'Planchadores y Gabinetes', 'Placard', 'Zapatero', 'Amoblamientos de Cocina',
        'Arcon', 'Cuna', 'Rack', 'Andador', 'Coche de cuna', 'Cunas', 'Triciclos', 'Silla de Comer', 'Metegol',
        'Skate', 'Cuatriciclo', 'Escritorios', 'Sillas para PC', 'Biblioteca Librero y Archivo', 'Mesa de PC']);*/
        return [
            'nombre' => $nombre,
            //'slug' => Str::slug($nombre),
            'category_id' => Category::all()->random()->id
        ];
    }
}

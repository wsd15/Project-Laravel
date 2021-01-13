<?php



use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pizzas')->insert([
            'name' => 'American Pizza',
            'image' => 'pizza1.jpg',
            'description' => 'Pizza favorit penduduk Amerika, bertoppingkan saus tomat, saus mustard, Jalapeno dan potongan daging ayam, sapi.',
            'price'=> '20000',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        \DB::table('pizzas')->insert([
            'name' => 'Cheeze',
            'image' => 'pizza2.jpg',
            'description' => 'Pizza yang toppingnya saus keju 100%.',
            'price'=> '15000',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        \DB::table('pizzas')->insert([
            'name' => 'Chicken',
            'image' => 'pizza3.jpg',
            'description' => 'Bertoppingkan saus tomat, keju dan potongan-potongan daging ayam.',
            'price'=> '12000',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);

        \DB::table('pizzas')->insert([
            'name' => 'Veggie',
            'image' => 'pizza4.jpg',
            'description' => 'Pizza yang hanya bertoppingkan sayuran jamur, paprika, jagung dan tomat.',
            'price'=> '17000',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        \DB::table('pizzas')->insert([
            'name' => 'Meaty',
            'image' => 'pizza5.jpg',
            'description' => 'Pizza yang toppingnya terletak potongan-potongan sosis sapi dan ayam, serta daging ayam dan daging sapi.',
            'price'=> '22000',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        \DB::table('pizzas')->insert([
            'name' => 'Pepperoni Pizza',
            'image' => 'pepperoni.jpg',
            'description' => 'Bertoppingkan potongan daging ayam dan keju.',
            'price'=> '16000',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        \DB::table('pizzas')->insert([
            'name' => 'Paprika',
            'image' => 'pizza6.jpg',
            'description' => 'Pizza dengan toping paprika diatasnya',
            'price'=> '24000',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
    }
}

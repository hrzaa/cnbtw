<?php

namespace Database\Seeders;

use App\Models\Culiner;
use App\Models\User;
use App\Models\Event;
use App\Models\Resto;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'roles' => 'ADMIN'
        ]);

        Category::create([
            'name_id' => 'Minuman',
            'name_en' => 'Drink',
            'slug' => Str::slug('Minuman'),
        ]);

        Culiner::create([
            'users_id' => '1', 
            'categories_id'=> '1',
            'culiner_name' => 'Es Dawet',
            'culiner_desc_id'=> 'Dawet merupakan minuman khas Jawa dari desa Jabung, Ponorogo yang terbuat dari tepung beras ataupun tepung beras ketan, disajikan dengan es parut serta gula merah cair dan santan. Rasa minuman ini manis dan gurih.',
            'culiner_history_id'=> 'Dawet berasal dari Desa Jabung, Ponorogo tanpa warna atau bening, tercatat dalam prasasti Taji Ponorogo pada abad 10. kemudian mulai dikenal kembali pada abad 15 pada zaman bupati Ponorogo Bathoro Katong, karena bermanfaat menyembuhkan orang sakit. Pada kala itu Warok Suro menggolo kembali pulih setelah luka melakukan perang, Kemudian Bathoro Katong memperkenalkan Dawet Jabung kepada kakanya Raden Fatah di Kesultanan Demak, Seketika Raden Fatah pun suka dengan minuman Dawet dan ingin menjadikan sebagai minuman keseharian di keraton Kesultanan Demak, kemudian dawet jabung yang berwarna bening diberi warna hijau, yang merupakan warna favorit Rasulallah Saw, Dawet yang berwarna hijau ini menyebar ke barbagai kota di Jawa Tengah.',
            'culiner_desc_en'=> 'Dawet is a typical Javanese drink from the village of Jabung, Ponorogo which is made from rice flour or glutinous rice flour, served with grated ice and liquid brown sugar and coconut milk. The taste of this drink is sweet and savory.',
            'culiner_history_en'=> 'Dawet originates from Jabung Village, Ponorogo without color or transparency, recorded in the Taji Ponorogo inscription in the 10th century. Then it became known again in the 15th century during the time of the Ponorogo regent Bathoro Katong, because it was useful in healing sick people. At that time, Warok Suro Menggolo was recovering after his war wounds. Then Bathoro Katong introduced Dawet Jabung to his brother Raden Fatah in the Demak Sultanate. clear in color given a green color, which is the favorite color of Rasulullah SAW, Dawet which is green has spread to various cities in Central Java.',
            'slug'=> Str::slug('Es Dawet'),
        ]);

        Event::create([
            'users_id' => '1',
            'event_name' => 'Solo Culinary Festival',
            'event_desc_id' => 'Solo Indonesia Culinary Festival 2022 merupakan salah satu promosi pariwisata Solo, Jawa Tengah, yang dihelat pada tanggal 4-7 Agustus. Festival kuliner bertajuk “Pesona Citarasa Sambal” ini berlangsung secara terbuka di area Benteng Vastenburg, Solo. Selain disajikan booth kuliner menarik, pengunjung juga bisa mencicipi aneka sambal dan tengkleng secara gratis. Bagi kamu yang tertarik berkunjung ke sini, Solo Indonesia Culinary Festival 2022 dibuka mulai pukul 10.00 hingga 22.00 WIB.',
            'event_desc_en' => 'The Solo Indonesia Culinary Festival 2022 is one of the tourism promotions for Solo, Central Java, which will be held on August 4-7. The culinary festival entitled "The Enchantment of Sambal Flavors" took place openly in the Vastenburg Fort area, Solo. Apart from being presented with interesting culinary booths, visitors can also sample various chili sauce and tengkleng for free. For those of you who are interested in visiting here, the Solo Indonesia Culinary Festival 2022 opens from 10.00 to 22.00 WIB.',
            'date_start' => '2023-06-01 ',
            'date_end' => '2023-06-05',
            'address' => 'Jl. Ir. Juanda No.49, Purwodiningratan, Kec. Jebres, Kota Surakarta',
            'address_link' => 'https://goo.gl/maps/LA5AtBcRZg1xNuaV9',
            'slug' => Str::slug('Solo Culinary Festival'),
        ]);

        Resto::create([
            'resto_name' => 'Dawet Telasih Bu Dermi, Pasar Gede',
            'users_id' => '1', 
            'culiner_id' => '1', 
            'price' => '10000',
            'resto_desc_id' => '',
            'resto_desc_en' => '',
            'address' => 'Pasar Gede Hardjonagoro, Lapak Galabo (Gladag Langen Bogan), Jl. Jend. Urip Sumoharjo, Kota Surakarta', 
            'address_link' => 'https://goo.gl/maps/LA5AtBcRZg1xNuaV9',
            'slug' => Str::slug('Dawet Telasih Bu Dermi, Pasar Gede'),
        ]);

    }
}

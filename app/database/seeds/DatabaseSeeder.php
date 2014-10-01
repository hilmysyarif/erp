<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    //every time you want to re seed just run --->  php artisan migrate:refresh --seed
    public function run()
    {
        Eloquent::unguard();
        $this->call('CompaniesTableSeeder');
        $this->call('ProvidersTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('ProductsTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('CategoryProductTableSeeder');
        $this->call('CompanyProductTableSeeder');
        $this->call('ProductProviderTableSeeder');
        $this->call('OrdersTableSeeder');
        $this->call('BanksTableSeeder');

    }

}

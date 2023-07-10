<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDB extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('p_blog', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->integer('view_count')->default(0);
            $table->integer('category_id')->nullable();
            $table->string('tag')->nullable();
            $table->string('more_link')->nullable();
            $table->string('author')->nullable();
            $table->integer('slug_id')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('keywords')->nullable();
            $table->text('short_description')->nullable();
            $table->integer('uid')->nullable();
            $table->integer('lang_id')->default(1);
            $table->integer('order_id')->nullable();
            $table->text('content')->nullable();
            $table->text('thumbnails')->nullable();
            $table->tinyInteger('publish')->default(0);
            $table->tinyInteger('deleted')->default(0);
            $table->integer('created_by')->nullable();
            $table->timestamp('create_date')->useCurrent();
        });

        Schema::create('p_brand', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->integer('slug_id')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('keywords')->nullable();
            $table->integer('lang_id')->default(1);
            $table->integer('order_id')->nullable();
            $table->integer('uid')->nullable();
            $table->text('thumbnails')->nullable();
            $table->text('content')->nullable();
            $table->tinyInteger('publish')->default(0);
            $table->tinyInteger('deleted')->default(0);
            $table->integer('created_by')->nullable();
            $table->timestamp('create_date')->useCurrent();
        });

        Schema::create('p_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('module_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('slug_id')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('keywords')->nullable();
            $table->integer('lang_id')->default(1);
            $table->integer('order_id')->nullable();
            $table->integer('root_id')->nullable();
            $table->integer('uid')->nullable();
            $table->text('thumbnails')->nullable();
            $table->text('content')->nullable();
            $table->tinyInteger('publish')->default(0);
            $table->tinyInteger('deleted')->default(0);
            $table->integer('created_by')->nullable();
            $table->timestamp('create_date')->useCurrent();
        });

        Schema::create('p_lang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('short')->nullable();
            $table->string('name')->nullable();
            $table->tinyInteger('deleted')->default(0);
            $table->timestamp('create_date')->useCurrent();
        });

        DB::table('p_lang')->insert([
            ['short' => 'tr', 'name' => 'Türkçe'],
            ['short' => 'en', 'name' => 'English'],
        ]);

        Schema::create('p_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('text')->nullable();
            $table->text('value')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamp('create_date')->useCurrent();
        });

        Schema::create('p_menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->integer('slug_id')->nullable();
            $table->tinyInteger('new_window')->nullable();
            $table->string('position')->nullable();
            $table->integer('lang_id')->default(1);
            $table->integer('uid')->nullable();
            $table->integer('root_id')->nullable();
            $table->integer('order_id')->nullable();
            $table->tinyInteger('publish')->default(0);
            $table->tinyInteger('deleted')->default(0);
            $table->integer('created_by')->nullable();
            $table->timestamp('create_date')->useCurrent();
        });

        Schema::create('p_message', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->nullable();
            $table->string('type')->nullable();
            $table->text('content')->nullable();
            $table->string('ip_address')->nullable();
            $table->tinyInteger('deleted')->default(0);
            $table->timestamp('create_date')->useCurrent();
        });

        Schema::create('p_modules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_tr')->nullable();
            $table->string('name_en')->nullable();
            $table->string('schema_name')->nullable();
            $table->integer('order_id')->nullable();
            $table->string('url')->nullable();
            $table->text('svg')->nullable();
            $table->text('thumbnail_settings')->nullable();
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('categorizable')->default(0);
            $table->timestamp('create_date')->useCurrent();
        });

        DB::table('p_modules')->insert([
            [
                'name_tr' => 'Blog',
                'name_en' => 'Blog',
                'schema_name' => 'p_blog',
                'url' => '/blog',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">        <rect x="0" y="0" width="24" height="24"/>        <path d="M5.5,2 L18.5,2 C19.3284271,2 20,2.67157288 20,3.5 L20,6.5 C20,7.32842712 19.3284271,8 18.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,3.5 C4,2.67157288 4.67157288,2 5.5,2 Z M11,4 C10.4477153,4 10,4.44771525 10,5 C10,5.55228475 10.4477153,6 11,6 L13,6 C13.5522847,6 14,5.55228475 14,5 C14,4.44771525 13.5522847,4 13,4 L11,4 Z" fill="#000000" opacity="0.3"/>        <path d="M5.5,9 L18.5,9 C19.3284271,9 20,9.67157288 20,10.5 L20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 L4,10.5 C4,9.67157288 4.67157288,9 5.5,9 Z M11,11 C10.4477153,11 10,11.4477153 10,12 C10,12.5522847 10.4477153,13 11,13 L13,13 C13.5522847,13 14,12.5522847 14,12 C14,11.4477153 13.5522847,11 13,11 L11,11 Z M5.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,20.5 C20,21.3284271 19.3284271,22 18.5,22 L5.5,22 C4.67157288,22 4,21.3284271 4,20.5 L4,17.5 C4,16.6715729 4.67157288,16 5.5,16 Z M11,18 C10.4477153,18 10,18.4477153 10,19 C10,19.5522847 10.4477153,20 11,20 L13,20 C13.5522847,20 14,19.5522847 14,19 C14,18.4477153 13.5522847,18 13,18 L11,18 Z" fill="#000000"/>    </g></svg>',
                'thumbnail_settings' => '[{"title": "Fotoğraf", "name": "photo", "width": "100", "height": "200"}, {"title": "Öne Çıkan Fotoğraf", "name": "featured", "width": "150", "height": "250"}]',
                'categorizable' => true,
            ],
            [
                'name_tr' => 'Ürünler',
                'name_en' => 'Products',
                'schema_name' => 'p_product',
                'url' => '/product',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">        <rect x="0" y="0" width="24" height="24"/>        <g transform="translate(12.500000, 12.000000) rotate(-315.000000) translate(-12.500000, -12.000000) translate(6.000000, 1.000000)" fill="#000000" opacity="0.3">            <path d="M0.353553391,7.14644661 L3.35355339,7.14644661 C3.4100716,7.14644661 3.46549471,7.14175791 3.51945496,7.13274826 C3.92739876,8.3050906 5.04222146,9.14644661 6.35355339,9.14644661 C8.01040764,9.14644661 9.35355339,7.80330086 9.35355339,6.14644661 C9.35355339,4.48959236 8.01040764,3.14644661 6.35355339,3.14644661 C5.04222146,3.14644661 3.92739876,3.98780262 3.51945496,5.16014496 C3.46549471,5.15113531 3.4100716,5.14644661 3.35355339,5.14644661 L0.436511831,5.14644661 C0.912589923,2.30873327 3.3805571,0.146446609 6.35355339,0.146446609 C9.66726189,0.146446609 12.3535534,2.83273811 12.3535534,6.14644661 L12.3535534,19.1464466 C12.3535534,20.2510161 11.4581229,21.1464466 10.3535534,21.1464466 L2.35355339,21.1464466 C1.24898389,21.1464466 0.353553391,20.2510161 0.353553391,19.1464466 L0.353553391,7.14644661 Z" transform="translate(6.353553, 10.646447) rotate(-360.000000) translate(-6.353553, -10.646447) "/>            <rect x="2.35355339" y="13.1464466" width="8" height="2" rx="1"/>            <rect x="3.35355339" y="17.1464466" width="6" height="2" rx="1"/>        </g>    </g></svg>',
                'thumbnail_settings' => '[{"title": "Fotoğraf", "name": "photo", "width": "100", "height": "200"}, {"title": "Öne Çıkan Fotoğraf", "name": "featured", "width": "150", "height": "250"}]',
                'categorizable' => true,
            ],
            [
                'name_tr' => 'Kategoriler',
                'name_en' => 'Categories',
                'schema_name' => 'p_category',
                'url' => '/category',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">        <rect x="0" y="0" width="24" height="24"/>        <path d="M10.5,5 L19.5,5 C20.3284271,5 21,5.67157288 21,6.5 C21,7.32842712 20.3284271,8 19.5,8 L10.5,8 C9.67157288,8 9,7.32842712 9,6.5 C9,5.67157288 9.67157288,5 10.5,5 Z M10.5,10 L19.5,10 C20.3284271,10 21,10.6715729 21,11.5 C21,12.3284271 20.3284271,13 19.5,13 L10.5,13 C9.67157288,13 9,12.3284271 9,11.5 C9,10.6715729 9.67157288,10 10.5,10 Z M10.5,15 L19.5,15 C20.3284271,15 21,15.6715729 21,16.5 C21,17.3284271 20.3284271,18 19.5,18 L10.5,18 C9.67157288,18 9,17.3284271 9,16.5 C9,15.6715729 9.67157288,15 10.5,15 Z" fill="#000000"/>        <path d="M5.5,8 C4.67157288,8 4,7.32842712 4,6.5 C4,5.67157288 4.67157288,5 5.5,5 C6.32842712,5 7,5.67157288 7,6.5 C7,7.32842712 6.32842712,8 5.5,8 Z M5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 C6.32842712,10 7,10.6715729 7,11.5 C7,12.3284271 6.32842712,13 5.5,13 Z M5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 C6.32842712,15 7,15.6715729 7,16.5 C7,17.3284271 6.32842712,18 5.5,18 Z" fill="#000000" opacity="0.3"/>    </g></svg>',
                'thumbnail_settings' => '[{"title": "Fotoğraf", "name": "photo", "width": "100", "height": "200"}, {"title": "Öne Çıkan Fotoğraf", "name": "featured", "width": "150", "height": "250"}]',
                'categorizable' => false,
            ],
            [
                'name_tr' => 'Etiketler',
                'name_en' => 'Tags',
                'schema_name' => 'p_tag',
                'url' => '/tag',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">        <rect x="0" y="0" width="24" height="24"/>        <rect fill="#000000" x="2" y="4" width="19" height="4" rx="1"/>        <path d="M3,10 L6,10 C6.55228475,10 7,10.4477153 7,11 L7,19 C7,19.5522847 6.55228475,20 6,20 L3,20 C2.44771525,20 2,19.5522847 2,19 L2,11 C2,10.4477153 2.44771525,10 3,10 Z M10,10 L13,10 C13.5522847,10 14,10.4477153 14,11 L14,19 C14,19.5522847 13.5522847,20 13,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M17,10 L20,10 C20.5522847,10 21,10.4477153 21,11 L21,19 C21,19.5522847 20.5522847,20 20,20 L17,20 C16.4477153,20 16,19.5522847 16,19 L16,11 C16,10.4477153 16.4477153,10 17,10 Z" fill="#000000" opacity="0.3"/>    </g></svg>',
                'thumbnail_settings' => null,
                'categorizable' => false,
            ],
            [
                'name_tr' => 'Markalar',
                'name_en' => 'Brands',
                'schema_name' => 'p_brand',
                'url' => '/brand',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">        <rect x="0" y="0" width="24" height="24"/>        <polygon fill="#000000" opacity="0.3" points="5 3 19 3 23 8 1 8"/>        <polygon fill="#000000" points="23 8 12 20 1 8"/>    </g></svg>',
                'thumbnail_settings' => '[{"title": "Fotoğraf", "name": "photo", "width": "100", "height": "200"}, {"title": "Öne Çıkan Fotoğraf", "name": "featured", "width": "150", "height": "250"}]',
                'categorizable' => false,
            ],
            [
                'name_tr' => 'Menüler',
                'name_en' => 'Menus',
                'schema_name' => 'p_menu',
                'url' => '/menu',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">        <rect x="0" y="0" width="24" height="24"/>        <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5"/>        <path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" fill="#000000" opacity="0.3"/>    </g></svg>',
                'thumbnail_settings' => null,
                'categorizable' => false,
            ],
            [
                'name_tr' => 'Mesajlar',
                'name_en' => 'Messages',
                'schema_name' => 'p_message',
                'url' => '/message',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">        <rect x="0" y="0" width="24" height="24"/>        <path d="M5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"/>    </g></svg>',
                'thumbnail_settings' => null,
                'categorizable' => false,
            ],
            [
                'name_tr' => 'Sayfalar',
                'name_en' => 'Pages',
                'schema_name' => 'p_page',
                'url' => '/page',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">        <rect x="0" y="0" width="24" height="24"/>        <path d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" fill="#000000"/>        <path d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" fill="#000000" opacity="0.3"/>    </g></svg>',
                'thumbnail_settings' => '[{"title": "Fotoğraf", "name": "photo", "width": "400", "height": "500"}]',
                'categorizable' => false,
            ],
            [
                'name_tr' => 'Hizmetler',
                'name_en' => 'Services',
                'schema_name' => 'p_service',
                'url' => '/service',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">        <rect x="0" y="0" width="24" height="24"/>        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"/>        <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/>    </g></svg>',
                'thumbnail_settings' => '[{"title": "Fotoğraf", "name": "photo", "width": "500", "height": "200"}, {"title": "Öne Çıkan Fotoğraf", "name": "featured", "width": "100", "height": "100"}]',
                'categorizable' => true
            ],
            [
                'name_tr' => 'Çeviriler',
                'name_en' => 'Translates',
                'schema_name' => 'p_translate',
                'url' => '/translate',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <rect x="0" y="0" width="24" height="24"/> <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"/> <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"/> </g> </svg>',
                'thumbnail_settings' => null,
                'categorizable' => false
            ],
            [
                'name_tr' => 'Ayarlar',
                'name_en' => 'Settings',
                'schema_name' => 'p_settings',
                'url' => '/settings',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"/><path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"/></g></svg>',
                'thumbnail_settings' => null,
                'categorizable' => false
            ],
            [
                'name_tr' => 'Ekibimiz',
                'name_en' => 'Our Team',
                'schema_name' => 'p_team',
                'url' => '/team',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <rect x="0" y="0" width="24" height="24"/> <path d="M6,2 L18,2 C19.6568542,2 21,3.34314575 21,5 L21,19 C21,20.6568542 19.6568542,22 18,22 L6,22 C4.34314575,22 3,20.6568542 3,19 L3,5 C3,3.34314575 4.34314575,2 6,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000"/> </g> </svg>',
                'thumbnail_settings' => '[{"title": "Üye Fotoğrafı", "name": "featured", "width": "100", "height": "100"}]',
                'categorizable' => false
            ],
            [
                'name_tr' => 'Üyeler',
                'name_en' => 'Members',
                'schema_name' => 'users',
                'url' => '/customer',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <polygon points="0 0 24 0 24 24 0 24"/> <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/> <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/> </g> </svg>',
                'thumbnail_settings' => null,
                'categorizable' => false
            ],
            [
                'name_tr' => 'İndirim Kuponları',
                'name_en' => 'Discount Coupons',
                'schema_name' => 'p_coupon',
                'url' => '/coupon',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <rect x="0" y="0" width="24" height="24"/> <polygon fill="#000000" opacity="0.3" points="12 20.0218549 8.47346039 21.7286168 6.86905972 18.1543453 3.07048824 17.1949849 4.13894342 13.4256452 1.84573388 10.2490577 5.08710286 8.04836581 5.3722735 4.14091196 9.2698837 4.53859595 12 1.72861679 14.7301163 4.53859595 18.6277265 4.14091196 18.9128971 8.04836581 22.1542661 10.2490577 19.8610566 13.4256452 20.9295118 17.1949849 17.1309403 18.1543453 15.5265396 21.7286168"/> <polygon fill="#000000" points="14.0890818 8.60255815 8.36079737 14.7014391 9.70868621 16.049328 15.4369707 9.950447"/> <path d="M10.8543431,9.1753866 C10.8543431,10.1252593 10.085524,10.8938719 9.13585777,10.8938719 C8.18793881,10.8938719 7.41737243,10.1252593 7.41737243,9.1753866 C7.41737243,8.22551387 8.18793881,7.45690126 9.13585777,7.45690126 C10.085524,7.45690126 10.8543431,8.22551387 10.8543431,9.1753866" fill="#000000" opacity="0.3"/> <path d="M14.8641422,16.6221564 C13.9162233,16.6221564 13.1456569,15.8535438 13.1456569,14.9036711 C13.1456569,13.9520555 13.9162233,13.1851857 14.8641422,13.1851857 C15.8138085,13.1851857 16.5826276,13.9520555 16.5826276,14.9036711 C16.5826276,15.8535438 15.8138085,16.6221564 14.8641422,16.6221564 Z" fill="#000000" opacity="0.3"/> </g> </svg>',
                'thumbnail_settings' => null,
                'categorizable' => false
            ],
            [
                'name_tr' => 'Slider',
                'name_en' => 'Slider',
                'schema_name' => 'p_slider',
                'url' => '/slider',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M10.5278225,22.5278225 L8.79765312,20.7976531 L9.99546268,18.4463973 L7.35584531,19.3558453 L5.04895282,17.0489528 L8.15438502,11.6366281 L2.74206034,14.7420603 L1.30025253,13.3002525 L9.26548692,8.03126375 C11.3411817,6.65819522 14.1285885,7.15099488 15.6076701,9.15253022 C17.1660799,11.2614147 17.1219524,14.1519817 15.4998952,16.212313 L10.5278225,22.5278225 Z" fill="#000000" opacity="0.3"/><path d="M22.4246212,4.91054166 L18.4071175,8.92804534 C17.6260689,9.70909393 16.359739,9.70909393 15.5786904,8.92804534 C14.7976418,8.14699676 14.7976418,6.8806668 15.5786904,6.09961822 L19.6029298,2.0753788 C19.7817428,2.41498256 19.9878937,2.74436937 20.2214305,3.06039796 C20.8190224,3.86907629 21.5791361,4.49033747 22.4246212,4.91054166 Z" fill="#000000" transform="translate(18.708763, 5.794605) rotate(-180.000000) translate(-18.708763, -5.794605) "/></g></svg>',
                'thumbnail_settings' => '[{"title": "Masaüstü", "name": "photo", "width": "1920", "height": "758"}, {"title": "Mobil", "name": "mobil", "width": "360", "height": "480"}]',
                'categorizable' => false
            ],
            [
                'name_tr' => 'Banka Hesapları',
                'name_en' => 'Bank Accounts',
                'schema_name' => 'p_bank_accounts',
                'url' => '/bank-accounts',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><rect fill="#000000" opacity="0.3" x="11.5" y="2" width="2" height="4" rx="1"/><rect fill="#000000" opacity="0.3" x="11.5" y="16" width="2" height="5" rx="1"/><path d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z" fill="#000000"/></g></svg>',
                'thumbnail_settings' => '[{"title": "Banka Logosu", "name": "featured", "width": "190", "height": "60"}]',
                'categorizable' => false
            ],
            [
                'name_tr' => 'Siparişler',
                'name_en' => 'Orders',
                'schema_name' => 'orders',
                'url' => '/orders',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000"/><path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3"/></g></svg>',
                'thumbnail_settings' => null,
                'categorizable' => false
            ],
            [
                'name_tr' => 'Referanslar',
                'name_en' => 'Referances',
                'schema_name' => 'p_reference',
                'url' => '/reference',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000"/><path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3"/></g></svg>',
                'thumbnail_settings' => '[{"title": "Logo", "name": "photo", "width": "1920", "height": "812"}]',
                'categorizable' => true
            ]
        ]);

        Schema::create('p_page', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->integer('slug_id')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('keywords')->nullable();
            $table->text('short_description')->nullable();
            $table->integer('uid')->nullable();
            $table->integer('root_id')->nullable();
            $table->integer('lang_id')->default(1);
            $table->integer('order_id')->nullable();
            $table->text('content')->nullable();
            $table->text('thumbnails')->nullable();
            $table->tinyInteger('fixed')->nullable();
            $table->tinyInteger('publish')->default(0);
            $table->tinyInteger('deleted')->default(0);
            $table->integer('created_by')->nullable();
            $table->timestamp('create_date')->useCurrent();
        });

        Schema::create('p_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->float('price')->nullable();
            $table->float('discount_price')->nullable();
            $table->integer('view_count')->default(0);
            $table->integer('stock')->default(0);
            $table->integer('brand_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('tag')->nullable();
            $table->string('reference_code')->nullable();
            $table->string('more_link')->nullable();
            $table->integer('slug_id')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('keywords')->nullable();
            $table->text('short_description')->nullable();
            $table->text('features')->nullable();
            $table->integer('uid')->nullable();
            $table->integer('lang_id')->default(1);
            $table->integer('order_id')->nullable();
            $table->text('content')->nullable();
            $table->text('thumbnails')->nullable();
            $table->tinyInteger('publish')->default(0);
            $table->tinyInteger('deleted')->default(0);
            $table->integer('created_by')->nullable();
            $table->timestamp('create_date')->useCurrent();
        });

        Schema::create('p_reference', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->integer('uid')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('lang_id')->default(1);
            $table->integer('order_id')->nullable();
            $table->text('thumbnails')->nullable();
            $table->tinyInteger('publish')->default(0);
            $table->tinyInteger('deleted')->default(0);
            $table->integer('created_by')->nullable();
            $table->timestamp('create_date')->useCurrent();
        });

        Schema::create('p_service', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->integer('slug_id')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('keywords')->nullable();
            $table->text('short_description')->nullable();
            $table->integer('uid')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('lang_id')->default(1);
            $table->integer('order_id')->nullable();
            $table->text('content')->nullable();
            $table->text('thumbnails')->nullable();
            $table->tinyInteger('publish')->default(0);
            $table->tinyInteger('deleted')->default(0);
            $table->integer('created_by')->nullable();
            $table->timestamp('create_date')->useCurrent();
        });

        Schema::create('p_slug', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('module_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('lang_id')->nullable();
            $table->tinyInteger('deleted')->default(0);
            $table->timestamp('create_date')->useCurrent();
        });

        Schema::create('p_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->integer('slug_id')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('keywords')->nullable();
            $table->integer('lang_id')->default(1);
            $table->integer('order_id')->nullable();
            $table->integer('uid')->nullable();
            $table->text('content')->nullable();
            $table->tinyInteger('publish')->default(0);
            $table->tinyInteger('deleted')->default(0);
            $table->integer('created_by')->nullable();
            $table->timestamp('create_date')->useCurrent();
        });

        Schema::create('p_tokens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('token')->nullable();
            $table->string('user_type')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('expire_date')->nullable();
            $table->tinyInteger('deleted')->default(0);
            $table->timestamp('create_date')->useCurrent();
        });

        Schema::create('p_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->integer('group_id')->nullable();
            $table->text('thumbnails')->nullable();
            $table->tinyInteger('deleted')->default(0);
            $table->integer('created_by')->nullable();
            $table->timestamp('create_date')->useCurrent();
        });

        Schema::create('p_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('group_name')->nullable();
            $table->text('content')->nullable();
            $table->tinyInteger('deleted')->default(0);
            $table->integer('created_by')->nullable();
            $table->timestamp('create_date')->useCurrent();
        });

        Schema::create('p_order_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_id')->nullable();
            $table->string('status')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamp('create_date')->useCurrent();
        });

        DB::table('p_settings')->insert([
            [
                'name' => 'Site Ayarları',
                'group_name' => 'site_config',
                'content' => '{"title":"","keywords":"","description":""}',
                'deleted' => false,
                'created_by' => -1
            ],
            [
                'name' => 'Sosyal Medya Ayarları',
                'group_name' => 'site_social',
                'content' => '{"facebook":"","instagram":"","twitter":"","linkedin":"","youtube":""}',
                'deleted' => false,
                'created_by' => -1
            ],
            [
                'name' => 'İletişim Ayarları',
                'group_name' => 'site_contact',
                'content' => '{"phone":"","mail":"","address":""}',
                'deleted' => false,
                'created_by' => -1
            ],
        ]);

        Schema::create('p_team', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('profession')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('keywords')->nullable();
            $table->integer('order_id')->nullable();
            $table->integer('uid')->nullable();
            $table->text('content')->nullable();
            $table->tinyInteger('deleted')->default(0);
            $table->text('thumbnails')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamp('create_date')->useCurrent();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('password')->nullable();
            $table->integer('group_id')->nullable();
            $table->tinyInteger('confirm')->default(0);
            $table->tinyInteger('deleted')->default(0);
            $table->timestamp('create_date')->useCurrent();
        });

        Schema::create('p_coupon', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->string('code')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('min_amount')->nullable();
            $table->tinyInteger('deleted')->default(0);
            $table->tinyInteger('used')->default(0);
            $table->integer('created_by')->nullable();
            $table->timestamp('create_date')->useCurrent();
        });

        Schema::create('p_slider', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->integer('uid')->nullable();
            $table->text('thumbnails')->nullable();
            $table->tinyInteger('deleted')->default(0);
            $table->timestamp('create_date')->useCurrent();
        });

        Schema::create('p_bank_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('bank')->nullable();
            $table->string('account_number')->nullable();
            $table->string('iban')->nullable();
            $table->integer('uid')->nullable();
            $table->text('thumbnails')->nullable();
            $table->tinyInteger('deleted')->default(0);
            $table->timestamp('create_date')->useCurrent();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_number')->nullable();
            $table->integer('cart_id')->nullable();
            $table->string('shipping_number')->nullable();
            $table->integer('bank_id')->nullable();
            $table->string('national_id')->nullable();
            $table->string('status')->nullable();
            $table->integer('shipping_fee')->nullable();
            $table->integer('delivery_address_id')->nullable();
            $table->integer('invoice_address_id')->nullable();
            $table->string('tax_department')->nullable();
            $table->string('tax_number')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('ip_address')->nullable();
            $table->tinyInteger('completed')->default(0);
            $table->timestamp('create_date')->useCurrent();
        });

        Schema::create('p_user_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->text('perms')->nullable();
            $table->tinyInteger('deleted')->default(0);
            $table->integer('created_by')->nullable();
            $table->timestamp('create_date')->useCurrent();
        });

        $arr = array (
            -1 =>
            array (
                'read' => 'true',
                'write' => 'true',
            ),
            1 =>
            array (
                'read' => 'true',
                'write' => 'true',
            ),
            2 =>
            array (
                'read' => 'true',
                'write' => 'true',
            ),
            3 =>
            array (
                'read' => 'true',
                'write' => 'true',
            ),
            4 =>
            array (
                'read' => 'true',
                'write' => 'true',
            ),
            5 =>
            array (
                'read' => 'true',
                'write' => 'true',
            ),
            6 =>
            array (
                'read' => 'true',
                'write' => 'true',
            ),
            7 =>
            array (
                'read' => 'true',
                'write' => 'true',
            ),
            8 =>
            array (
                'read' => 'true',
                'write' => 'true',
            ),
            9 =>
            array (
                'read' => 'true',
                'write' => 'true',
            ),
            10 =>
            array (
                'read' => 'true',
                'write' => 'true',
            ),
            11 =>
            array (
                'read' => 'true',
                'write' => 'true',
            ),
            12 =>
            array (
                'read' => 'true',
                'write' => 'true',
            ),
            13 =>
            array (
                'read' => 'true',
                'write' => 'true',
            ),
            14 =>
            array (
                'read' => 'true',
                'write' => 'true',
            ),
            15 =>
            array (
                'read' => 'true',
                'write' => 'true',
            ),
            16 =>
            array (
                'read' => 'true',
                'write' => 'true',
            ),
            17 =>
            array (
                'read' => 'true',
                'write' => 'true',
            ),
            18 =>
            array (
                'read' => 'true',
                'write' => 'true',
            ),
        );
        DB::table('p_user_groups')->insert([
            [
                'id' => 20,
                'name' => 'Admin',
                'perms' => json_encode($arr),
                'created_by' => '-1',
            ],
            [
                'id' => 40,
                'name' => 'Admin',
                'perms' => json_encode($arr),
                'created_by' => '-1',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}

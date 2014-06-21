<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedMenus extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        DB::table('menus')->insert(
            array(
                array(
                    'title' => "Product",
                    'nav_menu' => 'sells',
                    'ui_class' => 'glyphicon glyphicon-briefcase',
                    'tab_id' => 'product'
                ),
                array(
                    'title' => "Category",
                    'nav_menu' => 'sells',
                    'ui_class' => 'glyphicon glyphicon-adjust',
                    'tab_id' => 'category'
                ),
                array(
                    'title' => "Package Product",
                    'nav_menu' => 'sells',
                    'ui_class' => 'icon-large icon-gift',
                    'tab_id' => 'package'
                ),
                array(
                    'title' => "Sells",
                    'nav_menu' => 'sells',
                    'ui_class' => 'glyphicon-barcode',
                    'tab_id' => 'sells'
                ),
                array(
                    'title' => "Admission",
                    'nav_menu' => 'admission',
                    'ui_class' => 'glyphicon glyphicon-user',
                    'tab_id' => 'admission'
                )
            )
        );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        DB::table('menus')->delete();
	}

}

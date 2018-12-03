<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('name')->nullable();
            $table->string('company')->nullable();
            $table->string('phone')->nullable();
            $table->string('region')->nullable();
            $table->string('address')->nullable();
            $table->string('logo')->nullable();
            $table->string('category')->nullable();
            $table->string('small_description')->nullable();
            $table->string('description')->nullable();
            $table->string('site')->nullable();
            $table->string('balance')->nullable();
            $table->string('accepted_balance')->nullable();
            $table->string('referal')->nullable();
            $table->string('r_fullname')->nullable();
            $table->string('r_name')->nullable();
            $table->string('r_date_create')->nullable();
            $table->string('r_law_address')->nullable();
            $table->string('r_post_address')->nullable();
            $table->string('r_director')->nullable();
            $table->string('r_chief_accountant')->nullable();
            $table->string('r_email')->nullable();
            $table->string('r_phone')->nullable();
            $table->string('r_fax')->nullable();
            $table->string('r_INN')->nullable();
            $table->string('r_KPP')->nullable();
            $table->string('r_OGRN')->nullable();
            $table->string('r_OKPO')->nullable();
            $table->string('r_OKATO')->nullable();
            $table->string('r_bank_requisites')->nullable();
            $table->string('r_cashback')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile');
    }
}

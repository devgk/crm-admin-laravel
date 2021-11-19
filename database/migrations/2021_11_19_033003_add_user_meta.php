<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserMeta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role')->unsigned()->default(2);
        });

        /**
         * Create Default Admin User and 
         * assign admin role. Get the admin user 
         * details from ENV */
        $name = env("DAU_NAME", false);
        $email = env("DAU_EMAIL", false);
        $password = env("DAU_PASSWORD", false);

        /** 
         * Check for the details and create
         * admin user if details exits */
        if($name && $email  && $password){
            DB::table('users')->insert([
                [
                    'id'                => 1,
                    'name'              => $name,
                    'email'             => $email,
                    'email_verified_at' => date('Y-m-d H:i:s'),
                    'password'          => Hash::make($password),
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                    'role'              => 1,
                ]
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}

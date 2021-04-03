<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_permissions', function (Blueprint $table) {
            $table->string('status');

            $table->unsignedBigInteger('id_roles');
            $table->unsignedBigInteger('id_permissions');

            $table->foreign('id_roles')->references('id_roles')->on('roles');
            $table->foreign('id_permissions')->references('id_permissions')->on('permissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_permissions');
    }
}

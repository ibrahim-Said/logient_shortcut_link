<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shortcut_links', function (Blueprint $table) {
            $table->uuid('id');
            $table->foreignIdFor(User::class)->nullable();
            $table->string('name');
            $table->string('link');
            $table->string('shortcut_link');
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
        Schema::dropIfExists('shortcut_links');
    }
};

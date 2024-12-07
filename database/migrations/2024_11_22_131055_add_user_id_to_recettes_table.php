<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * This method removes the 'user_id' column and its foreign key constraint from the 'recettes' table.
     */
    public function down(): void
    {
        Schema::table('recettes', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeSecurityFieldsRequiredInUsersTable extends Migration
{
    public function up()
    {
        // Remplir les valeurs null avec des valeurs par défaut pour les utilisateurs existants
        \DB::table('users')
            ->whereNull('security_question')
            ->update([
                'security_question' => 'Quel est le nom de votre premier animal de compagnie ?',
                'security_answer' => \Illuminate\Support\Facades\Hash::make('inconnu'),
            ]);

        // Rendre les colonnes non nullables
        Schema::table('users', function (Blueprint $table) {
            $table->string('security_question')->nullable(false)->change();
            $table->string('security_answer')->nullable(false)->change();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('security_question')->nullable()->change();
            $table->string('security_answer')->nullable()->change();
        });
    }
}
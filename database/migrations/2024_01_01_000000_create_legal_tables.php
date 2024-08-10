<?php

#region USE

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Narsil\Legals\Models\Imprint;
use Narsil\Legals\Models\PrivacyNotice;
use Narsil\Localization\Models\Language;

#endregion

return new class extends Migration
{
    #region MIGRATIONS

    /**
     * @return void
     */
    public function up(): void
    {
        $this->createImprintsTable();
        $this->createPrivacyNoticesTable();
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(PrivacyNotice::TABLE);
        Schema::dropIfExists(Imprint::TABLE);
    }

    #endregion

    #region TABLES

    /**
     * @return void
     */
    private function createImprintsTable(): void
    {
        if (Schema::hasTable(Imprint::TABLE))
        {
            return;
        }

        Schema::create(Imprint::TABLE, function (Blueprint $table)
        {
            $table
                ->id(Imprint::ID);
            $table
                ->boolean(Imprint::ACTIVE)
                ->default(true);
            $table
                ->foreignId(Imprint::LANGUAGE_ID)
                ->constrained(Language::TABLE, Language::ID)
                ->cascadeOnDelete();
            $table
                ->text(Imprint::CONTENT)
                ->nullable();
            $table
                ->timestamps();
        });
    }

    /**
     * @return void
     */
    private function createPrivacyNoticesTable(): void
    {
        if (Schema::hasTable(PrivacyNotice::TABLE))
        {
            return;
        }

        Schema::create(PrivacyNotice::TABLE, function (Blueprint $table)
        {
            $table
                ->id();
            $table
                ->boolean(PrivacyNotice::ACTIVE)
                ->default(true);
            $table
                ->foreignId(PrivacyNotice::LANGUAGE_ID)
                ->constrained(Language::TABLE, Language::ID)
                ->cascadeOnDelete();
            $table
                ->text(PrivacyNotice::CONTENT)
                ->nullable();
            $table
                ->timestamps();
        });
    }

    #endregion
};

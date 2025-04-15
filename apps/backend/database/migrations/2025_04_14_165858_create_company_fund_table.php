<?php

use App\Models\Company;
use App\Models\Fund;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    const TABLE = 'company_fund';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->foreignIdFor(Fund::class)
                ->index()
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(Company::class)
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->primary(['fund_id', 'company_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists(self::TABLE);
        Schema::enableForeignKeyConstraints();
    }
};

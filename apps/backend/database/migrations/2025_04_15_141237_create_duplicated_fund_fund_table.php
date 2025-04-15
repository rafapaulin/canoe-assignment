<?php

use App\Models\DuplicatedFund;
use App\Models\Fund;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    const TABLE = 'duplicated_fund_fund';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(DuplicatedFund::class)->constrained('duplicated_funds')->cascadeOnDelete();
            $table->foreignIdFor(Fund::class)->constrained('funds')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['duplicated_fund_id', 'fund_id']);
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

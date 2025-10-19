<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'custom_designs')) {
                $table->json('custom_designs')->nullable()->after('sizes'); // Store multiple custom designs
            }
            if (!Schema::hasColumn('orders', 'ref')) {
                $table->string('ref')->nullable()->after('custom_side'); // Payment reference
            }
            if (!Schema::hasColumn('orders', 'track_id')) {
                $table->string('track_id', 13)->nullable()->after('ref'); // Tracking ID
            }
            if (!Schema::hasColumn('orders', 'decoration_type')) {
                $table->string('decoration_type')->default('print')->after('track_id'); // Decoration type
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['custom_designs', 'ref', 'track_id', 'decoration_type']);
        });
    }
};

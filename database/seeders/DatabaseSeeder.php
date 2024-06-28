<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::unprepared("INSERT INTO boards (id, name) VALUES (1, 'Projeto 01')");
        DB::unprepared("INSERT INTO columns (id, name, has_estimative, board_id) VALUES (1, 'Coluna A', true, 1)");
        DB::unprepared("INSERT INTO columns (id, name, has_estimative, board_id) VALUES (2, 'Coluna B', true, 1)");
        DB::unprepared("INSERT INTO columns (id, name, has_estimative, board_id) VALUES (3, 'Coluna C', false, 1)");
        DB::unprepared("INSERT INTO columns (id, name, has_estimative, board_id) VALUES (4, 'Coluna D', true, 1)");
        DB::unprepared("INSERT INTO cards (id, title, estimative, column_id) VALUES (1, 'Atividade 01', 3, 1)");
        DB::unprepared("INSERT INTO cards (id, title, estimative, column_id) VALUES (2, 'Atividade 02', 2, 1)");
        DB::unprepared("INSERT INTO cards (id, title, estimative, column_id) VALUES (3, 'Atividade 03', 1, 1)");
    }
}

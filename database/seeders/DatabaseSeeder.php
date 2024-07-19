<?php

namespace Database\Seeders;

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
        DB::unprepared("INSERT INTO columns (name, has_estimative, board_id) VALUES ('Coluna A', true, 1)");
        DB::unprepared("INSERT INTO columns (name, has_estimative, board_id) VALUES ('Coluna B', true, 1)");
        DB::unprepared("INSERT INTO columns (name, has_estimative, board_id) VALUES ('Coluna C', false, 1)");
        DB::unprepared("INSERT INTO columns (name, has_estimative, board_id) VALUES ('Coluna D', true, 1)");
        $column = DB::table('columns')->first(['id']);
        $columnId = $column->id;
        DB::unprepared("INSERT INTO cards (title, estimative, column_id) VALUES ('Atividade 01', 3, {$columnId})");
        DB::unprepared("INSERT INTO cards (title, estimative, column_id) VALUES ('Atividade 02', 2, {$columnId})");
        DB::unprepared("INSERT INTO cards (title, estimative, column_id) VALUES ('Atividade 03', 1, {$columnId})");
    }
}

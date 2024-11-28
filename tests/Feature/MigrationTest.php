<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class MigrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_books_table_structure()
    {
        $this->assertTrue(Schema::hasTable('books'), 'Table "books" does not exist.');

        $this->assertTrue(Schema::hasColumns('books', [
            'id', 'judul', 'penulis', 'kategori', 'terbit', 'status', 'created_at', 'updated_at'
        ]), 'Table "books" does not have the correct columns.');
    }

    public function test_members_table_structure()
    {
        $this->assertTrue(Schema::hasTable('members'), 'Table "members" does not exist.');

        $this->assertTrue(Schema::hasColumns('members', [
            'id', 'nama', 'email', 'password', 'created_at', 'updated_at'
        ]), 'Table "members" does not have the correct columns.');
    }

    public function test_loans_table_structure()
    {
        $this->assertTrue(Schema::hasTable('loans'), 'Table "loans" does not exist.');

        $this->assertTrue(Schema::hasColumns('loans', [
            'id', 'members_id', 'books_id', 'tanggal_pinjam', 'tanggal_kembali', 'status', 'created_at', 'updated_at'
        ]), 'Table "loans" does not have the correct columns.');
    }
}

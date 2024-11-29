<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use App\Models\User;
use App\Models\Book;
use App\Models\Loan;
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


    public function test_admin_dashboard_displays_correctly()
    {
        // Create an admin user
        $admin = User::factory()->create(['role' => 'admin']);

        // Create some test data
        User::factory()->count(5)->create(['role' => 'anggota']);

        // Act as the admin and visit the dashboard
        $response = $this->actingAs($admin)->get('/dashboard');

        // Assert the response is successful
        $response->assertStatus(200);

        // Assert the page contains the expected elements
        $response->assertSee('Admin Dashboard');
        $response->assertSee(now()->format('d-m-Y'));

        // Assert statistics are present
        $response->assertSee('Statistik Buku');
        $response->assertSee('10'); // Total books
        $response->assertSee('Statistik Anggota');
        $response->assertSee('5'); // Total members
        $response->assertSee('Statistik Peminjaman');
        $response->assertSee('3'); // Total loans

        // Assert the recent loans table is present
        $response->assertSee('Peminjaman Terbaru');
        $response->assertSee('Anggota');
        $response->assertSee('Buku');
        $response->assertSee('Tanggal Pinjam');
        $response->assertSee('Status');

        // You can add more specific assertions here if needed
    }
}

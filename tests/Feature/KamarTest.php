<?php
 
use App\Models\User;
use App\Models\Kamar;
 
test('guest cannot access rooms page', function () {
    $response = $this->get(route('kamar.index'));
    $response->assertRedirect(route('login'));
});
 
test('authenticated user can view rooms page', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->get(route('kamar.index'));
    $response->assertStatus(200);
});
 
test('admin can create a new room', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->post(route('kamar.store'), [
        'nomor_kamar' => '888',
        'tipe_kamar' => 'Deluxe Suite',
        'harga' => 350.00,
        'status_kamar' => 'tersedia',
    ]);
    
    $response->assertRedirect(route('kamar.index'));
    $this->assertDatabaseHas('kamar', [
        'nomor_kamar' => '888',
        'tipe_kamar' => 'Deluxe Suite',
        'harga' => 350.00,
    ]);
});
 
test('admin can update an existing room', function () {
    $user = User::factory()->create();
    $kamar = Kamar::create([
        'nomor_kamar' => '999',
        'tipe_kamar' => 'Standard King',
        'harga' => 150.00,
        'status_kamar' => 'tersedia',
    ]);
 
    $response = $this->actingAs($user)->put(route('kamar.update', $kamar->id_kamar), [
        'nomor_kamar' => '999',
        'tipe_kamar' => 'Presidential Suite',
        'harga' => 1200.00,
        'status_kamar' => 'terisi',
    ]);
 
    $response->assertRedirect(route('kamar.index'));
    $this->assertDatabaseHas('kamar', [
        'id_kamar' => $kamar->id_kamar,
        'tipe_kamar' => 'Presidential Suite',
        'harga' => 1200.00,
        'status_kamar' => 'terisi',
    ]);
});
 
test('admin can delete a room', function () {
    $user = User::factory()->create();
    $kamar = Kamar::create([
        'nomor_kamar' => '777',
        'tipe_kamar' => 'Standard King',
        'harga' => 150.00,
        'status_kamar' => 'tersedia',
    ]);
 
    $response = $this->actingAs($user)->delete(route('kamar.destroy', $kamar->id_kamar));
 
    $response->assertRedirect(route('kamar.index'));
    $this->assertDatabaseMissing('kamar', [
        'id_kamar' => $kamar->id_kamar,
    ]);
});

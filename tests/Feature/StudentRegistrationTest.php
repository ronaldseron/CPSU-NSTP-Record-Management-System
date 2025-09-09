<?php

use App\Models\User;

test('student form registration data is saved to the database', function () {
    $user = User::factory()->create([
        'role' => 'user',
    ]);

    $response = $this->actingAs($user, 'sanctum')
    ->post('/api/form-registration', [
        'category'             => 'CWTS',
        'status'               => 'pending',
        'school_year'          => '2025-2026',
        'school_id'            => 'SCH123',
        'course'               => 'BSIT',
        'last_name'            => 'Doe',
        'first_name'           => 'John',
        'middle_initial'       => 'A',
        'extension_name'       => 'Jr.',
        'gender'               => 'male',
        'cp_number'            => '09123456789',
        'province_name'        => 'Test Province',
        'city_name'            => 'Test City',
        'brgy_name'            => 'Test Barangay',
        'hei_name'             => 'Test HEI University',
        'constitution_code'    => 'CONST01',
        'type_heis'            => 'Public',
        'program_level_code'   => 'PL001',
    ]);

    $response->assertStatus(201)
             ->assertJson(['message' => 'Registration successful']);
});

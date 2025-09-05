<?php

use App\Models\User;

test('student form registration data is saved to the database', function () {
    $user = User::factory()->create([
        'role' => 'user',
    ]);

    $response = $this->actingAs($user)
    ->post('/users/form-registration', [
        'category'         => 'CWTS',
        'schoolYear'       => '2025-2026',
        'schoolId'         => 'SCH123',
        'course'           => 'BSIT',
        'lastName'         => 'Doe',
        'firstName'        => 'John',
        'middleInitial'    => 'A',
        'extensionName'    => 'Jr.',
        'gender'           => 'Male',
        'cpNumber'         => '09123456789',
        'province'         => 'PRV001',
        'provinceName'     => 'Test Province',
        'city'             => 'CTY001',
        'cityName'         => 'Test City',
        'brgy'             => 'BRG001',
        'brgyName'         => 'Test Barangay',
        'heiName'          => 'Test HEI University',
        'constitutionCode' => 'CONST01',
        'typeHeis'         => 'Public',
        'programLevelCode' => 'PL001',
    ]);

    $response->assertStatus(201)
             ->assertJson(['message' => 'Registration successful']);
});

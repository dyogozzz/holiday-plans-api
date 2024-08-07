<?php

namespace Tests\Feature;

use App\Models\HolidayPlan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class HolidayPlanTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_user_can_create_holiday_plan()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $response = $this->postJson('/api/holiday-plans', [
            'title' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'date' => $this->faker->date,
            'location' => $this->faker->address,
        ]);

        $response->assertStatus(201)->assertJsonStructure([
            'id', 'title', 'description', 'date', 'location', 'created_at', 'updated_at'
        ]);
    }

    public function test_user_can_view_holiday_plans()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        HolidayPlan::factory()->count(3)->create();

        $response = $this->getJson('/api/holiday-plans');

        $response->assertStatus(200)->assertJsonCount(3);
    }

    public function test_user_can_view_specific_holiday_plan()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $holidayPlan = HolidayPlan::factory()->create();

        $response = $this->getJson("/api/holiday-plans/{$holidayPlan->id}");

        $response->assertStatus(200)->assertJsonStructure([
            'id', 'title', 'description', 'date', 'location', 'created_at', 'updated_at'
        ]);
    }

    public function test_user_can_update_holiday_plan()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $holidayPlan = HolidayPlan::factory()->create();

        $response = $this->putJson("/api/holiday-plans/{$holidayPlan->id}", [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
        ]);

        $response->assertStatus(200)->assertJsonFragment([
            'title' => 'Updated Title',
            'description' => 'Updated Description',
        ]);
    }

    public function test_user_can_delete_holiday_plan()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $holidayPlan = HolidayPlan::factory()->create();

        $response = $this->deleteJson("/api/holiday-plans/{$holidayPlan->id}");

        $response->assertStatus(204);
    }

    public function test_user_can_generate_pdf_for_holiday_plan()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $holidayPlan = HolidayPlan::factory()->create();

        $response = $this->postJson("/api/holiday-plans/{$holidayPlan->id}/generate-pdf");

        $response->assertStatus(200)->assertHeader('Content-Type', 'application/pdf');
    }
}

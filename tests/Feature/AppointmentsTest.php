<?php

namespace Tests\Feature;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AppointmentsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_appointment_can_be_scheduled()
    {
        $data = data();
        $this->withExceptionHandling();
        $this->asDoctor()->post('/appointments', $data)->assertRedirectContains('appointments');
        $this->assertDatabaseHas('appointments', $data);
    }



    /** @test */
    public function appointments_can_be_cancelled_or_fufilled()
    {
        $active = Appointment::APPOINTMENT_STATUSES['active'];
        $canceled = Appointment::APPOINTMENT_STATUSES['cancelled'];
        $fulfiled = Appointment::APPOINTMENT_STATUSES['fulfilled'];
        $appointment = Appointment::factory()->create(['status' => $active]);
        $this->assertEquals($active, $appointment->status);

        //canceled
        $this->asDoctor()
            ->put("/appointments/$appointment->id", ['status' => $canceled])
            ->assertStatus(302)
            ->assertRedirect("/appointments/$appointment->id");
        $appointment->refresh();
        $this->assertEquals($canceled, $appointment->status);

        //fulfiled
        $response = $this->asDoctor()
            ->put("/appointments/$appointment->id", ['status' => $fulfiled])
            ->assertStatus(302)
            ->assertRedirect("/appointments/$appointment->id");
        $appointment->refresh();
        $this->assertEquals($fulfiled, $appointment->status);
    }

    /** @test */
    public function appointments_can_be_deleted()
    {
        $this->withExceptionHandling();
        $appointment = Appointment::factory()->create();
        $this->assertModelExists($appointment);
        $this->asDoctor()->delete("/appointments/$appointment->id");
        $this->assertModelMissing($appointment);
    }
}



function data()
{
    return
        [
            "user_id" => User::factory()->create()->id,
            "patient_id" => Patient::factory()->create()->id,
            'reason' => 'nothing',
            'date_time' => Carbon::now()->toDateTimeString()
        ];
}

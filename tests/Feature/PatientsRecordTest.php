<?php

namespace Tests\Feature;

use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PatientsRecordTest extends TestCase
{


    /** @test */
    public function a_user_can_add_patient_records()
    {
        $this->withExceptionHandling();
        $data = Patient::factory()->make()->toArray();
        $this->assertDatabaseMissing('patients', $data);
        $this->asDoctor()->post('/patients', $data)->assertStatus(302);
        $this->assertDatabaseHas('patients', $data);
    }
    /** @test */
    public function a_user_can_modify_patient_records()
    {
        $patient = Patient::factory()->create();
        $newPatientRecord = Patient::factory()->make()->toArray();
        $this->assertDatabaseMissing('patients', $newPatientRecord);
        $response = $this->asDoctor()->put("/patients/{$patient->id}", [])->assertStatus(302);
        $this->assertDatabaseHas('patients', $newPatientRecord);
    }

    /** @test */
    public function a_user_can_view_patient_records()
    {
        $patient = Patient::factory()->create();
        $response = $this->asDoctor()->get('/patients')->assertSee($patient->first_name);
    }


    /** @test */
    public function a_user_can_delete_patient_records()
    {
        $this->withExceptionHandling();
        $model = Patient::factory()->create();
        $this->assertModelExists($model);
        $this->asDoctor()->delete("/patients/$model->id");
        $this->assertModelMissing($model);
    }
}

<?php

namespace Tests\Feature;

use App\Models\Drug;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DrugsTest extends TestCase
{
    /** @test */
    public function a_user_can_add_a_drug_to_the_database()
    {
        $data = ['name' => 'Paracetamol', 'brand' => 'mzor', 'size' => '400mg'];
        $this->withExceptionHandling();
        $this->asDoctor()->post('/drugs', $data)->assertRedirect('/drugs');

        $this->assertDatabaseHas('drugs', $data);
        // dump($response);
    }


    /** @test */
    public function a_user_can_delete_a_drug_from_the_database()
    {
        $this->withExceptionHandling();
        $drug = Drug::factory()->create();
        $this->assertModelExists($drug);
        $this->asDoctor()->delete("/drugs/$drug->id");
        $this->assertModelMissing($drug);
    }
}

<?php

namespace Tests\Feature;
use App\User;
use App\Prospect;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProspectTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function check_if_a_user_can_upload_an_image()
    {   $this->withoutExceptionHandling();
        $user = $this->actingAs(factory(User::class)->create()) ;
         $response = $this->post('/saveprospect', [
            'title_id' => 'Mr',
            'gender_id' =>'Male', 
            'first_name' =>'xyz',
            'last_name' =>'abc',
            'middle_name'=>'Ray',
            'identification' =>'12345'

        ]);

        
        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg');
        $response = $this->put('/updateCert/1', [
            'certificate' => $file
        ])->assertRedirect('/documents/1');

        

    }

    public function only_logged_in_user_can_see_prospects()
    {
         $response = $this->get('/prospects')->assertRedirect('/login');
    }


 public function login_user_can_check_the_prospects()
    {
        $user = factory(User::class)->create() ;
        $response = $this->actingAs($user)->get('/prospects')->assertStatus(200);
    }


public function check_if_a_user_can_create_a_prospect()
    {
        $user = $this->actingAs(factory(User::class)->create());
        $response = $this->post('/saveprospect', [
            'title_id' => 'Mr',
            'gender_id' =>'Male', 
            'first_name' =>'xyz',
            'last_name' =>'abc',
            'middle_name'=>'Ray',
            'identification' =>'12345'

        ]);

        $this->assertCount(1, Prospect::all());
    }


public function check_if_user_can_update_a_prospect()
    {   $this->withoutExceptionHandling();
        $user = $this->actingAs(factory(User::class)->create());

        $response = $this->post('/saveprospect', [
            'title_id' => 'Mr',
            'gender_id' =>'Male', 
            'first_name' =>'xyz',
            'last_name' =>'abc',
            'middle_name'=>'Ray',
            'identification' =>'12345'

        ]);
        $response = $this->put('/prospect/program/update/1', [
            'program_id' => '1',
        ])->assertRedirect('/portfolio/1');

    }

    
}





    

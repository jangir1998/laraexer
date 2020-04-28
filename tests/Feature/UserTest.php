<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase; 

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // $user=factory(User::class)->create();
        // $response=$this->actingAs($user)->get('/');
        // $responss->assertSuccessful($user)->get('/');    
        // $user->forceDelete();

        $response=$this->withSession(['foo'=>'baar'])->get('/ok');        
        $response->assertStatus(200);

    }
   

}

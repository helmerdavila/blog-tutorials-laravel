<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ChainControllerTest extends TestCase
{
    public function test_using_facades()
    {
        Storage::fake('photos');

        Storage::shouldReceive('disk')->once()->with('local')->andReturnSelf();
        Storage::shouldReceive('put')->once()->withSomeOfArgs('/images/content');

        $response = $this->post('/chain', ['demo' => UploadedFile::fake()->image('hello.jpeg')]);
        $response->assertStatus(200);
    }
}

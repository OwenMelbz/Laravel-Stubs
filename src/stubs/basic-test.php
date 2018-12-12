<?php

namespace Tests\{TEST}\Modules\{MODULE};

use App\Api\V1\Models\{MODEL};
use Tests\TestCase;

class {MODEL}Test extends TestCase
{

   /** @test */
   public function testIndex()
   {
       factory({MODEL}::class, 10)->create();
       $response = $this->json('GET', 'api/auth/{URL}');
       $expect = $response->decodeResponseJson();
       $response
           ->assertOk()
           ->assertExactJson($expect);
   }

   /** @test */
   public function testShow()
   {
       factory({MODEL}::class, 10)->create();
       $random_id = random_int(1, 10);
       $response = $this->json('GET', 'api/auth/{URL}/' . $random_id);
       $expect = $response->decodeResponseJson();
       $response
           ->assertOk()
           ->assertExactJson($expect);
   }

   /** @test */
   public function testStore()
   {
       factory({MODEL}::class, 10)->create();
       $data = ['name' => 'Category 1'];
       $response = $this->json('POST', 'api/auth/{URL}', $data);
       $expect = $response->decodeResponseJson();
       $response
           ->assertOk()
           ->assertExactJson($expect);
   }

   /** @test */
   public function testUpdate()
   {
       factory({MODEL}::class, 10)->create();
       $random_id = random_int(1, 10);
       $data = ['nome' => 'Category updated'];
       $response = $this->json('PUT', 'api/auth/{URL}/' . $random_id, $data);
       $expect = $response->decodeResponseJson();
       $response
           ->assertOk()
           ->assertExactJson($expect);
   }

   /** @test */
   public function testDelete()
   {
       factory({MODEL}::class, 10)->create();
       $random_id = random_int(1, 10);
       $response = $this->json('DELETE', 'api/auth/{URL}/' . $random_id);
       $expect = $response->decodeResponseJson();
       $response
           ->assertOk()
           ->assertExactJson($expect);
   }
}

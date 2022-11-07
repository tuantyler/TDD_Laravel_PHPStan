<?php

namespace Tests\Feature;
use Tests\TestCase;
use App\Models\Todo;
use Faker;

class TodoTest extends TestCase
{
    /** @test */
    public function app_homepage_accessible_in_todoapp_route()
    {
        $response = $this->get('/todoapp');
        $response->assertStatus(200);
    }  
    /** @test */
    public function todoapp_page_display_data_correctly()
    {
        // Todo::factory()->count(3)->create();
        $response = $this->get('/todoapp');
        $todos = Todo::get();
        $response->assertViewIs('todoapp')->assertViewHas('todos', $todos);
    }
    /** @test */
    public function todoapp_add_data_successfully()
    {
        $faker = Faker\Factory::create();
        $addData = [
            'name' => $faker->name,
            'completed' => $faker->boolean
        ];
        $this->post('/todoapp', $addData)
        ->assertRedirect('/todoapp');
        $this->assertDatabaseHas('todos', $addData);
    }

    /** @test */
    public function todoapp_change_completed_state_successfully(){
        $faker = Faker\Factory::create();
        $addData = [
            'name' => $faker->name,
            'completed' => 0
        ];
        $addID = Todo::insertGetId($addData);
        $this->post('/changestate', ["id" => $addID])
        ->assertRedirect('/todoapp');
        $this->assertEquals($addData["completed"], !Todo::where("id" , $addID)->first()["completed"]);
    }

    /** @test */
    public function todoapp_delete_completed_state_successfully(){
        $faker = Faker\Factory::create();
        $addData = [
            'name' => $faker->name,
            'completed' => 1
        ];
        $this->post('/todoapp', $addData)
        ->assertRedirect('/todoapp');
        $this->assertDatabaseHas('todos', $addData);
        $this->post('/deletecompleted')
        ->assertRedirect('/todoapp');
        $todosNotCompleted = Todo::where("completed" , false)->get();
        $this->assertEquals(Todo::get(), $todosNotCompleted);
    }
}









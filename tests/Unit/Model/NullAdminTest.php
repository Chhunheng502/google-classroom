<?php

namespace Tests\Unit\Model;

use App\Models\Classroom;
use Tests\TestCase;

class NullAdminTest extends TestCase
{
    /** @test */
    public function name_must_not_be_null()
    {
        $classroom = Classroom::factory()->make();

        $this->assertEquals($classroom->admin->name, 'Admin Not Found');
    }
    
    /** @test */
    public function email_must_not_be_null()
    {
        $classroom = Classroom::factory()->make();
    
        $this->assertEquals($classroom->admin->email, 'Email Not Found');
    }
}

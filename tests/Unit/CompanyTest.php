<?php

namespace Tests\Unit;

use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_has_a_path()
    {
        $company = Company::factory()->create();

        $this->assertEquals('/companies/'.$company->id, $company->path());
    }
}

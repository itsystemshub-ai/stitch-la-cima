<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate');
    }

    protected function tearDown(): void
    {
        $this->artisan('migrate:rollback');
        parent::tearDown();
    }
}

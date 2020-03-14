<?php

namespace Openresources\UsersRolesTableAdditions\Tests;

use Orchestra\Testbench\TestCase;
use Openresources\UsersRolesTableAdditions\UsersRolesTableAdditionsServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [UsersRolesTableAdditionsServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Openresources\UsersRolesTableAdditions\Tests\App\User;
use Openresources\UsersRolesTableAdditions\UsersRolesTableAdditionsServiceProvider;
use Orchestra\Testbench\TestCase;

class RefreshDatabaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        // $this->artisan('migrate');
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testing');
        $app['config']->set('auth.providers.users.model', User::class);
    }

    /**
     * Get package providers.  At a minimum this is the package being tested, but also
     * would include packages upon which our package depends, e.g. Cartalyst/Sentry
     * In a normal app environment these would be added to the 'providers' array in
     * the config/app.php file.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [UsersRolesTableAdditionsServiceProvider::class];
    }

    /**
     * Get package aliases.  In a normal app environment these would be added to
     * the 'aliases' array in the config/app.php file.  If your package exposes an
     * aliased facade, you should add the alias here, along with aliases for
     * facades upon which your package depends, e.g. Cartalyst/Sentry.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'UsersRolesTableAdditions' => 'Openresources\UsersRolesTableAdditions\UsersRolesTableAdditionsFacade',
        ];
    }

    /** @test */
    public function itRunsTheMigrations()
    {

        $user = factory(User::class)->create([
            'name' => 'Bob',
            'email' => 'bob@acme.test',
        ]);

        $this->assertTrue(Schema::hasTable('users'));
        $this->assertEquals('Bob', $user->name);
        $this->assertEquals('bob@acme.test', $user->email);

        $this->assertEquals([
            'id',
            'email',
            'email_verified_at',
            'password',
            'remember_token',
            'created_at',
            'updated_at',
            'avatar',
            'role_id',
            'status_id',
            'last_login',
            'current_login',
            'login_count',
            'name',
        ], Schema::getColumnListing('users'));
    }
}

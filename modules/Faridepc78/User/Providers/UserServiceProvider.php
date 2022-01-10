<?php


namespace Faridepc78\User\Providers;


use Faridepc78\RolePermissions\Models\Permission;
use Faridepc78\User\Http\Middleware\StoreUserIp;
use Faridepc78\User\Database\Seeds\UsersTableSeeder;
use Faridepc78\User\Models\User;
use Faridepc78\User\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/user_routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom( __DIR__ . '/../Resources/Views', 'User');
        $this->loadJsonTranslationsFrom(__DIR__ . "/../Resources/Lang");
        $this->app['router']->pushMiddlewareToGroup('web', StoreUserIp::class);

        Factory::guessFactoryNamesUsing(function (string $modelName) {
            return 'Faridepc78\User\Database\Factories\\' . class_basename($modelName) .'Factory' ;
        });

        config()->set('auth.providers.users.model', User::class);
        Gate::policy(User::class, UserPolicy::class);
        \DatabaseSeeder::$seeders[] = UsersTableSeeder::class;
    }
    public function boot()
    {
        config()->set('sidebar.items.users', [
            "icon" => "i-users",
            "title" => "کاربران",
            "url" => route('users.index'),
            "permission" => Permission::PERMISSION_MANAGE_USERS
        ]);

        $this->app->booted(function () {
            config()->set('sidebar.items.usersInformation', [
                "icon" => "i-user__inforamtion",
                "title" => "اطلاعات کاربری",
                "url" => route('users.profile')
            ]);
        });
    }
}

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


#########################################################################
# PROJECT CAREER PORTAL
> composer create-project laravel/laravel careerPortal
> cd careerPortal
> cp .env.example .env
> php artisan key:generate

# Laravel Breeze (Provides Lightweight Authentification)
> composer require laravel/breeze --dev
> php artisan breeze:install 
> npm install 
> npm run dev

> php artisan migrate

# Controllers
> php artisan make:controller Admin/AdminController
> php artisan make:controller Applicant/ApplicantController
> php artisan make:controller Guest/GuestController
> php artisan make:controller HR/HRController
> php artisan make:controller Management/ManagementController

# Models
> php artisan make:model Applicant
> php artisan make:model Job
> php artisan make:model Profile 
> php artisan make:model User

> php artisan make:model JobPosting -m  
            // -m flag creates a migration file along with the model


# Install Spatie Laravel Permission Package
> composer require spatie/laravel-permission

# publish configuration 
> php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
> php artisan migrate

# Tinker (CLI that allow users unteract with their Laravel Application:
It uses PsySH package)
> composer require laravel/tinker 
> php artisan tinker
# sample test on role and privileges
> use \App\models\User;
> use \App\models\Roler;
> Role::all();
> Role::create(['name'=>'admin']);

> $user = User::find(1);
> $user->assignRole('admin');
> $user->hasRole('admin')


# SEEDING
# Create a Factory for Seeding Data
> php artisan make:factory JobPostingFactory --model=JobPosting
return [
            'title' => $this->faker->jobTitle(),
            'position_needed' => $this->faker->numberBetween(1, 10),
            'job_grade' => $this->faker->randomElement(['A', 'B', 'C']),
            'advert_no' => $this->faker->unique()->word(),
            'description' => $this->faker->paragraph(),
        ];
# Seed the Database
database/seeders/DatabaseSeeder.php
public function run()
    {
        // Seed 10 job postings
        JobPosting::factory()->count(10)->create();
    }

> php artisan db:seed


# Run the Appliction
> php artisan serve


Prospects
Admin(),
HR(),
Management(),
Applicants(),
Guests(). 


# Technology stack:
    > Backend:  Laravel(PHP FRamework)
    > Frontend: HTML,CSS,Javascript, Blade (Laravel livewire)
    > Database:MySQL
    > File Storage: Local
    > Security: Laravel Breeze
    > Version control: Git->Github
    
# Project structure
    Routing



# PROJECT STRUCTURE
app/
├── Http/
│   ├── Controllers/
│   │   ├── AdminController.php
│   │   ├── HRController.php
│   │   ├── ManagementController.php
│   │   ├── ApplicantController.php
│   │   └── GuestController.php
│   ├── Middleware/
│   │   ├── AdminMiddleware.php
│   │   ├── HRMiddleware.php
│   │   ├── ManagementMiddleware.php
│   │   └── ApplicantMiddleware.php
├── Models/
│   ├── User.php
│   ├── Job.php
│   ├── Application.php
│   └── Profile.php
resources/
├── views/
│   ├── layouts/
│   │   └── master.blade.php
│   ├── admin/
│   ├── hr/
│   ├── management/
│   ├── applicant/
│   └── guest/
routes/
├── web.php
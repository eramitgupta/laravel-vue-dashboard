## Admin  Dashboard | Laravel x11 Built with Vue.js 3x, Tailwind CSS x3.4, PRIMEVUE x4.0, and Vite

### Getting Started
To get a local copy up and running, follow these simple steps.

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/eramitgupta/laravel-vue-dashboard.git
   ```
2. Navigate to the project directory
   ```sh
   cd laravel-vue-dashboard
   ```
3. Install PHP dependencies & Install NPM packages
   ```sh
   composer install && npm install
   ```
  
4. Copy the example environment file and modify it according to your environment
   ```sh
   cp .env.example .env
   ```
5. Generate an application key
   ```sh
   php artisan key:generate
   ```
6. Run the database migrations
   ```sh
   php artisan migrate
   ```
7. Start the development server
   ```sh
   npm run dev
   ```
8. (Optional) Start Laravel's built-in server
   ```sh
   php artisan serve
   ```

## Advanced Command Line

### PHP Style Fix

To fix PHP coding style issues, run:
```sh
composer lint
```

### Vue or Blade Style Fix

To fix Vue or Blade template coding style issues, run:



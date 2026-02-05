<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

$user = User::create([
    'name' => 'Admin',
    'email' => 'mamaruf317@gmail.com',
    'password' => Hash::make('admin123')
]);

echo "Admin user created successfully!\n";
echo "Email: mamaruf317@gmail.com\n";
echo "Password: admin123\n";

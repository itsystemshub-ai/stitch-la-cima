<?php

use Illuminate\Support\Facades\Hash;
use App\Models\User;

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "--- Resetting Admin Password ---\n";

$admin = User::where('email', 'admin@lacima.com')->first();

if ($admin) {
    // Now that the 'hashed' cast is removed from User model,
    // Hash::make will hash it once, and the model will store it as is.
    $admin->password = Hash::make('admin123');
    $admin->save();
    echo "Password for admin@lacima.com has been RESET to 'admin123'.\n";
} else {
    echo "Admin user not found.\n";
}

echo "Done.\n";

<?php
// Автозагрузчик по PSR-4: App\ => src/
spl_autoload_register(function (string $class): void {
    $prefix  = 'App\\';
    $baseDir = __DIR__ . '/src/';

    if (str_starts_with($class, $prefix)) {
        $relative = substr($class, strlen($prefix));
        $file = $baseDir . str_replace('\\', '/', $relative) . '.php';
        if (file_exists($file)) {
            require $file;
        }
    }
});

use App\Models\Product;
use App\Services\PriceFormatter;

$product = new Product('Ноутбук', 1250.5);

echo 'Название: ' . $product->getTitle() . PHP_EOL;
echo 'Цена: ' . PriceFormatter::format($product->getPrice()) . PHP_EOL;

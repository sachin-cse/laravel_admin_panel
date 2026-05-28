<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeService extends Command
{
    protected $signature = 'make:service {name}';
    protected $description = 'Create a new service class';

    public function handle()
    {
        $name = $this->argument('name');

        // Convert path
        $name = str_replace('\\', '/', $name);

        $className = class_basename($name);
        $folderPath = dirname($name);

        // Full path
        $basePath = app_path('Services');
        $fullPath = $basePath . '/' . $name . '.php';

        // Create directory if not exists
        if (!is_dir(dirname($fullPath))) {
            mkdir(dirname($fullPath), 0755, true);
        }

        // Namespace build
        $namespace = 'App\\Services';
        if ($folderPath != '.') {
            $namespace .= '\\' . str_replace('/', '\\', $folderPath);
        }

        if (file_exists($fullPath)) {
            $this->error('Service already exists!');
            return;
        }

        $content = "<?php

namespace {$namespace};

class {$className}
{
    //
}";

        file_put_contents($fullPath, $content);

        $this->info("Service created at: {$fullPath}");
    }
}
?>
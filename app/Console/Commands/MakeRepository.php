<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeRepository extends Command
{
    protected $signature = 'make:repository {name}';
    protected $description = 'Create a new repository class';

    public function handle()
    {
        $name = str_replace('\\', '/', $this->argument('name'));

        $className = class_basename($name);
        $folderPath = dirname($name);

        $basePath = app_path('Repositories');
        $fullPath = $basePath . '/' . $name . '.php';

        // Create directory if not exists
        if (!is_dir(dirname($fullPath))) {
            mkdir(dirname($fullPath), 0755, true);
        }

        // Namespace
        $namespace = 'App\\Repositories';
        if ($folderPath != '.') {
            $namespace .= '\\' . str_replace('/', '\\', $folderPath);
        }

        if (file_exists($fullPath)) {
            $this->error('Repository already exists!');
            return;
        }

        $content = "<?php

namespace {$namespace};

class {$className}
{
    //
}";

        file_put_contents($fullPath, $content);

        $this->info("Repository created at: {$fullPath}");
    }
}

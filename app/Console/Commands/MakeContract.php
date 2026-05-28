<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeContract extends Command
{
    protected $signature = 'make:contract {name}';
    protected $description = 'Create a new contract (interface)';

    public function handle()
    {
        $name = str_replace('\\', '/', $this->argument('name'));

        $className = class_basename($name);
        $folderPath = dirname($name);

        $basePath = app_path('Contracts');
        $fullPath = $basePath . '/' . $name . '.php';

        // Create directory if not exists
        if (!is_dir(dirname($fullPath))) {
            mkdir(dirname($fullPath), 0755, true);
        }

        // Namespace
        $namespace = 'App\\Contracts';
        if ($folderPath != '.') {
            $namespace .= '\\' . str_replace('/', '\\', $folderPath);
        }

        if (file_exists($fullPath)) {
            $this->error('Contract already exists!');
            return;
        }

        $content = "<?php

namespace {$namespace};

interface {$className}
{
    //
}";

        file_put_contents($fullPath, $content);

        $this->info("Contract created at: {$fullPath}");
    }
}

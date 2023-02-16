<?php

namespace Laravel\Start\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use RuntimeException;
use Symfony\Component\Process\Process;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'start:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the startkit controllers and resources';

    /**
     * The available stacks.
     *
     * @var array<int, string>
     */
    /**
     * Execute the console command.
     *
     * @return int|null
     */
    public function handle()
    {
        $this->updatePackages();
        $this->copyFiles();
        $this->installPackagesAndBuild();
        return Command::SUCCESS;
    }
    protected static function updateNodePackages(callable $callback, $dev = true)
    {
        if (!file_exists(base_path('package.json'))) {
            return;
        }

        $configurationKey = $dev ? 'devDependencies' : 'dependencies';

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages[$configurationKey] = $callback(
            array_key_exists($configurationKey, $packages) ? $packages[$configurationKey] : [],
            $configurationKey
        );

        ksort($packages[$configurationKey]);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . PHP_EOL
        );
    }
    public function updatePackages()
    {
        $this->updateNodePackages(function ($packages) {
            return [
                '@tailwindcss/forms' => '^0.5.2',
                'alpinejs' => '^3.4.2',
                'autoprefixer' => '^10.4.2',
                'postcss' => '^8.4.6',
                'tailwindcss' => '^3.1.0',
            ] + $packages;
        });
    }
    public function copyFiles()
    {

        (new Filesystem)->ensureDirectoryExists(app_path('Http/Requests'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../app/Http/Requests', app_path('Http/Requests'));

        (new Filesystem)->ensureDirectoryExists(app_path('View/Pages'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../app/View/Pages', app_path('View/Pages'));

        (new Filesystem)->ensureDirectoryExists(app_path('View/Components'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../app/View/Components', app_path('View/Components'));

        (new Filesystem)->ensureDirectoryExists(resource_path('views'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../resources/views', resource_path('views'));

        copy(__DIR__ . '/../../routes/web.php', base_path('routes/web.php'));

        copy(__DIR__ . '/../../tailwind.config.js', base_path('tailwind.config.js'));
        copy(__DIR__ . '/../../postcss.config.js', base_path('postcss.config.js'));
        copy(__DIR__ . '/../../vite.config.js', base_path('vite.config.js'));
        copy(__DIR__ . '/../../resources/css/app.css', resource_path('css/app.css'));
        copy(__DIR__ . '/../../resources/js/app.js', resource_path('js/app.js'));
    }
    public function installPackagesAndBuild()
    {
        if (file_exists(base_path('pnpm-lock.yaml'))) {
            $this->runCommands(['pnpm install', 'pnpm run build']);
        } elseif (file_exists(base_path('yarn.lock'))) {
            $this->runCommands(['yarn install', 'yarn run build']);
        } else {
            $this->runCommands(['npm install', 'npm run build']);
        }
    }
    protected function runCommands($commands)
    {
        $process = Process::fromShellCommandline(implode(' && ', $commands), null, null, null, null);

        if ('\\' !== DIRECTORY_SEPARATOR && file_exists('/dev/tty') && is_readable('/dev/tty')) {
            try {
                $process->setTty(true);
            } catch (RuntimeException $e) {
                $this->output->writeln('  <bg=yellow;fg=black> WARN </> ' . $e->getMessage() . PHP_EOL);
            }
        }

        $process->run(function ($type, $line) {
            $this->output->write('    ' . $line);
        });
    }
}

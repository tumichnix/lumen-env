<?php

namespace Tumichnix\Maintenance\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class Set extends Command
{
    protected $signature = 'env:set';
    protected $description = 'Set the value of a specific environment';

    public function handle()
    {
        $path = base_path($this->option('file'));
        $env = $this->argument('env');
        $set = $this->option('set');
        if (! file_exists($path)) {
            touch($path);
        }

        $ini = parse_ini_file($path, false, INI_SCANNER_RAW);
        $this->comment('set ENV_VAR "'.$env.'" => '.$set);
        $ini[$env] = $set;
        write_ini_file($path, $ini);
    }

    protected function getOptions()
    {
        return [
            ['set', null, InputOption::VALUE_REQUIRED, 'The new value for the specified ENV_VAR'],
            ['file', null, InputOption::VALUE_OPTIONAL, 'The env file to handle', '.env'],
        ];
    }

    protected function getArguments()
    {
        return [
            ['env', InputArgument::REQUIRED, 'The ENV_VAR to handle'],
        ];
    }
}

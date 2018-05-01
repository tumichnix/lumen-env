<?php

namespace Tumichnix\Env\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class Get extends Command
{
    protected $signature = 'env:get';
    protected $description = 'Get the value of a specific environment';

    public function handle()
    {
        $path = base_path($this->option('file'));
        $env = $this->argument('env');

        if (!file_exists($path)) {
            touch($path);
        }

        $ini = parse_ini_file($path, false, INI_SCANNER_RAW);
        if (!array_key_exists($env, $ini)) {
            $this->error('Environment "' . $env . '" dosent exists!');
        } else {
            $this->comment($ini[$env]);
        }
    }

    protected function getOptions()
    {
        return [
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

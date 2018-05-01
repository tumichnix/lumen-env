<?php

namespace Tumichnix\Env\Console;

use Illuminate\Console\Command as IlluminateCommand;

abstract class Command extends IlluminateCommand
{
    protected function getPath(): string
    {
        return base_path('.env');
    }

    protected function parseEnv($path): array
    {
        return parse_ini_file($path, false, INI_SCANNER_RAW);
    }

    protected function store($file, array $data)
    {
        $output = '';
        foreach ($data as $key => $val) {
            $output .= "$key=$val".PHP_EOL;
        }
        file_put_contents($file, trim($output));
    }
}

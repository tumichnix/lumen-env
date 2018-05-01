<?php

namespace Tumichnix\Env\Console\Commands;

use Tumichnix\Env\Console\Command;

class Set extends Command
{
    protected $signature = 'env:set {key} {val}';
    protected $description = 'Set the value for a specific key ';

    public function handle()
    {
        $path = $this->getPath();
        $key = strtoupper($this->argument('key'));
        $val = $this->argument('val');

        if (! file_exists($path)) {
            touch($path);
        }

        $ini = $this->parseEnv($path);
        $this->comment('set "'.$key.'" => '.$val);
        $ini[$key] = $val;

        $this->store($path, $ini);
    }
}

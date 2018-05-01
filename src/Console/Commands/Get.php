<?php

namespace Tumichnix\Env\Console\Commands;

use Tumichnix\Env\Console\Command;

class Get extends Command
{
    protected $signature = 'env:get {key}';
    protected $description = 'Get the value of a specific key';

    public function handle()
    {
        $path = $this->getPath();
        $key = strtoupper($this->argument('key'));

        if (! file_exists($path)) {
            touch($path);
        }

        $ini = $this->parseEnv($path);
        if (! array_key_exists($key, $ini)) {
            $this->error('Key "'.$key.'" dosent exists!');
        } else {
            $this->comment($ini[$key]);
        }
    }
}

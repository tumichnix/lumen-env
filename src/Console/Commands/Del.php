<?php

namespace Tumichnix\Env\Console\Commands;

use Tumichnix\Env\Console\Command;

class Del extends Command
{
    protected $signature = 'env:del {key}';
    protected $description = 'Delete a specific key';

    public function handle()
    {
        $path = $this->getPath();
        $key = strtoupper($this->argument('key'));

        $ini = $this->parseEnv($path);
        if (array_key_exists($key, $ini)) {
            unset($ini[$key]);
            $this->store($path, $ini);
            $this->comment('Deleted "'.$key.'"!');
        }
    }
}

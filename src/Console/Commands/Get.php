<?php

namespace Tumichnix\Env\Console\Commands;

use Illuminate\Console\Command;

class Get extends Command
{
    protected $signature = 'env:get {key}';
    protected $description = 'Get the value of a specific key';

    public function handle()
    {
        $path = base_path('.env');
        $key = strtoupper($this->argument('key'));

        if (! file_exists($path)) {
            touch($path);
        }

        $ini = parse_ini_file($path, false, INI_SCANNER_RAW);
        if (! array_key_exists($key, $ini)) {
            $this->error('Key "'.$key.'" dosent exists!');
        } else {
            $this->comment($ini[$key]);
        }
    }
}

<?php

namespace Tumichnix\Env\Console\Commands;

use Illuminate\Console\Command;

class Set extends Command
{
    protected $signature = 'env:set {key} {val}';
    protected $description = 'Set the value of a specific environment';

    public function handle()
    {
        $path = base_path('.env');
        $key = $this->argument('key');
        $val = $this->argument('val');

        if (! file_exists($path)) {
            touch($path);
        }

        $ini = parse_ini_file($path, false, INI_SCANNER_RAW);
        $this->comment('set "'.$key.'" => '.$val);
        $ini[$key] = $val;

        $this->store($path, $ini);
    }

    protected function store($file, array $data)
    {
        $output = '';
        foreach ($data as $key => $val) {
            $output .= "$key=$val" . PHP_EOL;
        }
        file_put_contents($file, trim($output));
    }
}

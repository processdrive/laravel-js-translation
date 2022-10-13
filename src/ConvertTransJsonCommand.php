<?php

namespace ProcessDrive\LaravelJSTranslation;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;


class ConvertTransJsonCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trans:json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'My trans json command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $trans = $this->generateTrans();
        return;
    }
    

    public function generateTrans()
    {
        $scan = scandir(resource_path('lang'));
        foreach($scan as $key => $folder) {
            if (is_dir(resource_path("lang/$folder")) && $key > 1) {
                $files = collect(File::files(resource_path('lang/'.$folder)));
                $trans = $files->reduce(function($trans, $file) use ($folder) {
                    $filename = pathinfo($file)['filename'];
                    $translations = require($file);
                    if (!array_key_exists($folder, $trans)) {
                        $trans[$folder] = [];
                    }
                    $finalTrans = array();

                    foreach($translations as $key =>  $translation) {
                        $finalTrans[$filename.'.'.$key] = $translation;
                    }
                
                    $trans[$folder] = array_merge($trans[$folder], $finalTrans);
                    return $trans;
                }, []);

                collect($trans)->each(function($item, $lang) {
                    $this->writeJson($lang, $item);
                });
            }
        }
    }

    protected function writeJson($lang, $trans) {
        $filename = resource_path().'/'.$lang.'.json';
            if (!$handle = fopen($filename, 'w')) {
                $this->error( "Cannot open file: $filename");
                return;
            }

            // Write $somecontent to our opened file.
            if (fwrite( $handle, json_encode($trans) ) === FALSE) {
                $this->error( "Cannot write to file: $filename");
                return;
            }

            $this->info("Write trans to: $filename");

            fclose($handle);
    }
}

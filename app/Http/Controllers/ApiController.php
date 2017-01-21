<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use ZipArchive;

class ApiController extends Controller
{
    public function updateLanguageFiles(Request $request)
    {
        $url = 'https://s3-eu-west-1.amazonaws.com/lokalise-assets/'.$request->input('file','');
        $local_file = tempnam(sys_get_temp_dir(), 'Lang_');
        $extract_path = resource_path('lang');
        $zip = new ZipArchive();

        $ch = curl_init();
        $fp = fopen($local_file, "w");

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        curl_exec($ch);

        curl_close($ch);
        fclose($fp);

        if ($zip->open($local_file)) {
            $zip->extractTo($extract_path);
            $zip->close();
            Log::info('Language files updated');
        } else
            Log::error('Could not download remote file.');
    }
}

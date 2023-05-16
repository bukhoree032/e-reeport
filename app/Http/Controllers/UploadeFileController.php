<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UploadeFileController extends Controller
{
    public $filesystem;

    public function uploadVideo($Video, $path1)
    {
            $extension = $Video->getClientOriginalExtension();
            $ramdom = Str::random(5);
            $ramdom2 = Str::random(5);
            $name = $ramdom . '_' . $ramdom2 . '.' . $extension;
            $path = public_path().'/storage/' . $path1 .'/';
            $Video->move($path, $name);
            $thumbnail_file = $path1 . '/' . $name;
            
            return $thumbnail_file;
    }

    public function uploadImage($image, $path, $name_file)
    {
        $extension = $image->getClientOriginalExtension();
        $this->filesystem = env('FILESYSTEM_DRIVER', 'public');
        $thumbnail_data = [];
        $width = 600;
        $height = 400;
        $quality = 80;
        $upsize = false;
        $resize = true;
        try {
            $ramdom = Str::random(5);
            $name = $name_file . '_' . $ramdom;

            $file = $image->storeAs($path, $name . '.' . $extension, $this->filesystem);
            $file = preg_replace('#/+#', '/', $file);

            $content = Storage::disk($this->filesystem)->get($file);
            //$thumbnail = Image::make($content);
            
            // if ($resize) {
            //     $thumbnail = $thumbnail->resize(
            //         $width,
            //         ($height ?? null),
            //         function ($constraint) use ($thumbnail_data) {
            //             $constraint->aspectRatio();
            //             if (!($upsize ?? true)) {
            //                 $constraint->upsize();
            //             }
            //         }
            //     );
            // }

            // $thumbnail_file = $path . '/' . $name . '-' . 'thumbnail' . '.' . $extension;
            // Storage::disk($this->filesystem)->put($thumbnail_file, $thumbnail->encode($extension, ($quality ?? 90))->encoded);

        } catch (\Exception $e) {
            $message = $e->getMessage();
            throw new \Exception($message);
        }

        $link = asset('storage');
        return $path = preg_replace('/^public\//', '', $link.'/'.$file);
    }

    public function uploadPDF($pdf, $path, $name_file)
    {
        $extension = $pdf->getClientOriginalExtension();
        $this->filesystem = storage_path('public');

        $name_file = str_replace("." . $extension, "", $pdf->getClientOriginalName());
        try {
            $ramdom = Str::random(5);
            $file = $pdf->storeAs($path, $name_file . '_' . $ramdom . '.' . $extension, $this->filesystem);
            $file_size = filesize($file);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $path = '';
        }

        $path = preg_replace('/^public\//', '', $file);

        return [
            'file_size' => $file_size,
            'path' => $path
        ];
    }

    public function fileDelete(Request $request)
    {
        $code = substr($request->id, -6);
        $id = intval($code);

        DB::table($request->db)
            ->where("{$request->where}", $id)
            ->update([
                "{$request->field}" => null
            ]);

        return response([
            'message' => __('voyager::generic.successfully_updated'),
            'alert-type' => 'success',
        ]);
    }
}

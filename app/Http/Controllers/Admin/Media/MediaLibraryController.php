<?php

namespace App\Http\Controllers\Admin\Media;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Core\MediaLibararyRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\MediaLibrary;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class MediaLibraryController extends AdminController
{
    public function index()
    {
        $medias = MediaLibrary::paginate(10);
        return view('admin.media.library', compact('medias'));
    }

    public function upload()
    {
        return view('admin.media.upload');
    }

    public function submitUpload(MediaLibararyRequest $request)
    {
        try {
            $imageAccepted = false;
            $groupedImages = null;

            // Get the uploaded file
            $uploadedFile = $request->file('file');
            $originalName = $request->has('original_name');
            $resizeImages = $request->has('resize_images');
            $medGroupBase = $request->med_group;

            // Generate a unique file name using Str::random(40)
            $fileName = Str::random(20);

            // Extract the file format from the original name
            $fileFormat = $uploadedFile->getClientOriginalExtension();

            // Specify the storage directory
            $storageDirectory = 'public/medias/' . $fileFormat . '/';

            // Store the file in the storage directory with the generated filename
            $path = $uploadedFile->storeAs($storageDirectory, $fileName . '.' . $fileFormat);

            // Check if the uploaded file is an image
            $allowedExtensionsForResizing = ['jpg', 'jpeg', 'png'];

            if($path){
                if (in_array(strtolower($fileFormat), $allowedExtensionsForResizing))
                    $imageAccepted = true;

                if ($imageAccepted) {
                    if ($resizeImages) {
                        // Create resized images
                        $resizedImages = [];

                        $sizes = [
                            ['loopNumber' => 1, 'width' => 200, 'height' => 200],
                            ['loopNumber' => 2, 'width' => 600, 'height' => 600],
                        ];

                        foreach ($sizes as $size) {

                            // Generate the resized image using Intervention Image
                            $resizedImage = Image::make($uploadedFile)->resize($size['width'], $size['height']);

                            // Generate a unique filename for the resized image
                            $resizedFileName = $fileName . '_' . $size['width'] . 'x' . $size['height'] . '.' . $uploadedFile->getClientOriginalExtension();

                            // Save the resized image in the storage directory with the generated filename
                            $resizedImage->save(storage_path('app/' . $storageDirectory . '/' . $resizedFileName));

                            // Save the resized image details in the database
                            $media = new MediaLibrary();
                            $media->med_group_base = $medGroupBase;
                            $media->med_uploader_id = auth()->user()->id;
                            $media->med_group_images = null;
                            $media->med_path = $storageDirectory . '/' . $resizedFileName;
                            $media->med_name = $uploadedFile->getClientOriginalName();
                            $media->med_hash_name = $resizedFileName;
                            $media->med_mime_type = $uploadedFile->getClientMimeType();
                            $media->med_size = $uploadedFile->getSize();
                            $media->med_extension = $uploadedFile->getClientOriginalExtension();
                            $media->med_dimension = $size['width'] . 'x' . $size['height'];
                            $media->save();

                            if (is_null($groupedImages))
                                $groupedImages = $media->id;

                            $media->med_group_images = $groupedImages;
                            $media->save();

                            $resizedImages[$size['width'] . 'x' . $size['height']] = $media->id;
                        }
                    }
                }
            }else{
                $this->logError($e);

                return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
            }

            $dimensions = getimagesize($uploadedFile);

            $media = new MediaLibrary();
            $media->med_group_base = $medGroupBase;
            $media->med_uploader_id = auth()->user()->id;
            $media->med_group_images = !empty($groupedImages) ? $groupedImages : null;
            $media->med_path = $path;
            $media->med_name = $uploadedFile->getClientOriginalName();
            $media->med_hash_name = $fileName;
            $media->med_mime_type = $uploadedFile->getClientMimeType();
            $media->med_size = $uploadedFile->getSize();
            $media->med_extension = $uploadedFile->getClientOriginalExtension();
            $media->med_dimension = $imageAccepted == true ? $dimensions[0] . 'x' . $dimensions[1] : null;
            $media->save();

            return redirect()->route('adm.media.library')->withSuccess('فایل مورد نظر با موفقیت آپلود گردید');
        }catch (\Exception $e) {
            $this->logError($e);

            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroyFile($id)
    {
        try {
            $media = MediaLibrary::find($id);
            $media->delete();

            return redirect()->back()->withSuccess('فایل مورد نظر با موفقیت حذف گردید');
        }catch (\Exception $e) {
            $this->logError($e);

            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
}

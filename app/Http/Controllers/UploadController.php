<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadBookImage(Request $request){
        $data = $request->all(); 
        if($data['pageImg']){
                $extension = $data['pageImg']->getClientOriginalExtension();
                $imageName = str_slug(substr($data['pageImg']->getClientOriginalName(), 0, -4));
                $newImageName = $imageName . '-' . rand(11111, 99999) . '.' . $extension;
                $path = 'public/adminStroage/bookPages/'; 
                
                $upload_success = $data['pageImg']->move($path, $newImageName);
                $newImageNameTest = 'bookPages/'.$newImageName;
                
                if ($upload_success) {
                    return response()->json([
                        'success'   => true,
                        'message'   => 'Successfully...',
                        'image'     => adminUrl('bookPages/'.$newImageName),
                        'imageName' => $newImageNameTest
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Error'
                    ]);
                }
        }
    }
    
    public function uploadTestReport(Request $request){
        $data = $request->all(); 
        if($data['pageImg']){
                $extension = $data['pageImg']->getClientOriginalExtension();
                $imageName = str_slug(substr($data['pageImg']->getClientOriginalName(), 0, -4));
                $newImageName = $imageName . '-' . rand(11111, 99999) . '.' . $extension;
                $path = 'public/adminStroage/testReport/'; 
                
                $upload_success = $data['pageImg']->move($path, $newImageName);
                $newImageNameTest = 'testReport/'.$newImageName;
                
                if ($upload_success) {
                    return response()->json([
                        'success'   => true,
                        'message'   => 'Successfully...',
                        //'image'     => adminUrl('testReport/'.$newImageName),
                        'imageName' => $newImageNameTest
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Error'
                    ]);
                }
        }
    }

    public function uploadBookThumb(Request $request){
        $data = $request->all(); 
        if($data['thumb']){
                $extension = $data['thumb']->getClientOriginalExtension();
                $imageName = str_slug(substr($data['thumb']->getClientOriginalName(), 0, -4));
                $newImageName = $imageName . '-' . rand(11111, 99999) . '.' . $extension;
                $path = 'public/adminStroage/bookPages/'; 
                
                $upload_success = $data['thumb']->move($path, $newImageName);
                $newImageNameTest = 'bookPages/'.$newImageName;
                
                if ($upload_success) {
                    return response()->json([
                        'success'   => true,
                        'message'   => 'Successfully...',
                        'image'     => adminUrl('bookPages/'.$newImageName),
                        'imageName' => $newImageNameTest
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Error'
                    ]);
                }
        }
    }
    
    public function uploadUserThumb(Request $request){
        $data = $request->all(); 
        if($data['picture']){
                $extension = $data['picture']->getClientOriginalExtension();
                $imageName = str_slug(substr($data['picture']->getClientOriginalName(), 0, -4));
                $newImageName = $imageName . '-' . rand(11111, 99999) . '.' . $extension;
                $path = 'public/adminStroage/users/'; 
                
                $upload_success = $data['picture']->move($path, $newImageName);
                $newImageNameTest = 'users/'.$newImageName;
                
                $oldlocation = 'public/adminStroage/users/'.$newImageName; 
                $savelocation = 'public/adminStroage/users/';
                $thumbName = $imageName . '-' .rand(11111, 99999) . 'thumb.'.$extension;
                $location = $savelocation.$thumbName; 
                $thumb = $this->image_resize($oldlocation, $location, 512, 512);
                $fildArray = array();
                $fildArray['thumb'] = 'users/'.$thumbName;
                $fildArray['large'] = $newImageNameTest;
                if ($upload_success) {
                    return response()->json([
                        'success'   => true,
                        'message'   => 'Successfully...',
                        'image'     => adminUrl('users/'.$newImageName),
                        'imageName' => json_encode($fildArray)
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Error'
                    ]);
                }
        }
    }
    
    public function uploadTestThumb(Request $request){
        $data = $request->all(); 
        if($data['testThumb']){
                $extension = $data['testThumb']->getClientOriginalExtension();
                $imageName = str_slug(substr($data['testThumb']->getClientOriginalName(), 0, -4));
                $newImageName = $imageName . '-' . rand(11111, 99999) . '.' . $extension;
                $path = 'public/adminStroage/tests/'; 
                
                $upload_success = $data['testThumb']->move($path, $newImageName);
                $newImageNameTest = 'tests/'.$newImageName;
                
                $oldlocation = 'public/adminStroage/tests/'.$newImageName; 
                $savelocation = 'public/adminStroage/tests/';
                $thumbName = $imageName . '-' .rand(11111, 99999) . 'thumb.'.$extension;
                $location = $savelocation.$thumbName;  
                $thumb = $this->image_resize($oldlocation, $location, 360, 234);
                $fildArray = array();
                $fildArray['thumb'] = 'tests/'.$thumbName;
                $fildArray['large'] = $newImageNameTest;
                if ($upload_success) {
                    return response()->json([
                        'success'   => true,
                        'message'   => 'Successfully...',
                        'image'     => adminUrl('tests/'.$newImageName),
                        'imageName' => json_encode($fildArray)
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Error'
                    ]);
                }
        }
    }
    
    public function uploadPartnerThumb(Request $request){
        $data = $request->all(); 
        if($data['thumb']){
                $extension = $data['thumb']->getClientOriginalExtension();
                $imageName = str_slug(substr($data['thumb']->getClientOriginalName(), 0, -4));
                $newImageName = $imageName . '-' . rand(11111, 99999) . '.' . $extension;
                $path = 'public/adminStroage/partner/';
                $upload_success = $data['thumb']->move($path, $newImageName);
                $newImageNameTest = 'partner/'.$newImageName;
                if ($upload_success) {
                    return response()->json([
                        'success'   => true,
                        'message'   => 'Successfully...',
                        'image'     => adminUrl('partner/'.$newImageName),
                        'imageName' => $newImageNameTest
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Error'
                    ]);
                }
        }
    }
    
    public function uploadSliderThumb(Request $request){
        $data = $request->all(); 
        if($data['thumb']){
                $extension = $data['thumb']->getClientOriginalExtension();
                $imageName = str_slug(substr($data['thumb']->getClientOriginalName(), 0, -4));
                $newImageName = $imageName . '-' . rand(11111, 99999) . '.' . $extension;
                $path = 'public/adminStroage/slider/';
                $upload_success = $data['thumb']->move($path, $newImageName);
                $newImageNameTest = 'slider/'.$newImageName;
                if ($upload_success) {
                    return response()->json([
                        'success'   => true,
                        'message'   => 'Successfully...',
                        'image'     => adminUrl('slider/'.$newImageName),
                        'imageName' => $newImageNameTest
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Error'
                    ]);
                }
        }
    }
    
    public function uploadOfferThumb(Request $request){
        $data = $request->all(); 
        if($data['thumb']){
                $extension = $data['thumb']->getClientOriginalExtension();
                $imageName = str_slug(substr($data['thumb']->getClientOriginalName(), 0, -4));
                $newImageName = $imageName . '-' . rand(11111, 99999) . '.' . $extension;
                $path = 'public/adminStroage/offer/';
                $upload_success = $data['thumb']->move($path, $newImageName);
                $newImageNameTest = 'offer/'.$newImageName;
                if ($upload_success) {
                    return response()->json([
                        'success'   => true,
                        'message'   => 'Successfully...',
                        'image'     => adminUrl('offer/'.$newImageName),
                        'imageName' => $newImageNameTest
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Error'
                    ]);
                }
        }
    }
    
    
    public function uploadClientSayThumb(Request $request){
        $data = $request->all(); 
        if($data['thumb']){
                $extension = $data['thumb']->getClientOriginalExtension();
                $imageName = str_slug(substr($data['thumb']->getClientOriginalName(), 0, -4));
                $newImageName = $imageName . '-' . rand(11111, 99999) . '.' . $extension;
                $path = 'public/adminStroage/clientsay/';
                $upload_success = $data['thumb']->move($path, $newImageName);
                $newImageNameTest = 'clientsay/'.$newImageName;
                if ($upload_success) {
                    return response()->json([
                        'success'   => true,
                        'message'   => 'Successfully...',
                        'image'     => adminUrl('clientsay/'.$newImageName),
                        'imageName' => $newImageNameTest
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Error'
                    ]);
                }
        }
    }
    
    public function uploadhealthThumb(Request $request){
        $data = $request->all(); 
        if($data['thumb']){
                $extension = $data['thumb']->getClientOriginalExtension();
                $imageName = str_slug(substr($data['thumb']->getClientOriginalName(), 0, -4));
                $newImageName = $imageName . '-' . rand(11111, 99999) . '.' . $extension;
                $path = 'public/adminStroage/health/';
                $upload_success = $data['thumb']->move($path, $newImageName);
                $newImageNameTest = 'health/'.$newImageName;
                
                if ($upload_success) {
                    return response()->json([
                        'success'   => true,
                        'message'   => 'Successfully...',
                        'image'     => adminUrl('health/'.$newImageName),
                        'imageName' => $newImageNameTest
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Error'
                    ]);
                }
        }
    }
    
    private function image_resize($newImageNameTest, $location, $thumbNWidth, $thumbNHeight){  
        
        $image = imagecreatefromjpeg( realpath($newImageNameTest) );  
        $filename   = $location; 
        $thumb_width = $thumbNWidth;
        $thumb_height = $thumbNHeight; 
        $width = imagesx($image);
        $height = imagesy($image); 
        $original_aspect = $width / $height;
        $thumb_aspect = $thumb_width / $thumb_height; 
        if ( $original_aspect >= $thumb_aspect ){
           // If image is wider than thumbnail (in aspect ratio sense)
           $new_height = $thumb_height;
           $new_width = $width / ($height / $thumb_height);
        }else{
           // If the thumbnail is wider than the image
           $new_width = $thumb_width;
           $new_height = $height / ($width / $thumb_width);
        }

        $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

        // Resize and crop
        imagecopyresampled($thumb,
                           $image,
                           0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                           0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                           0, 0,
                           $new_width, $new_height,
                           $width, $height);
        imagejpeg($thumb, $filename, 80);  
        return true;
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Offer;

class OfferController extends Controller
{
    public function gatAll()
    {
        $Offers = Offer::all();
        return view('admin.offer.all', compact('Offers'));
    }

    public function add()
    {
        return view('admin.offer.create');
    }

    public function create(Request $request)
    {
        $data = $request->all();
        //$data['thumb'] = $data['thumb'] != null ? $data['thumb'] : "";
        //$data['content'] = $data['content'] != null ? $data['thumb'] : "null";
        $link = $this->clean($data['title']);
        $Offer = Offer::create([
            'title' => $data['title'],
            'link' => strtolower($link),
            'meta_description' => $data['meta_description'],
            'content' => $data['content'],
            'thumb' => $data['thumb']
        ]);
        return redirect()->route('offer.all');
    }

    public function edit($id)
    {
        $Offers = Offer::where('id', $id)->get();
        return view('admin.offer.edit')
            ->with('Offers', $Offers);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        if ($data['offerId']) {
            $Offer = Offer::find($data['offerId']);
            if ($Offer) {
                $link = $this->clean($data['title']);
                //$data['thumb'] = $data['thumb'] != null ? $data['thumb'] : "";
                //$data['content'] = $data['content'] != null ? $data['content'] : "null";
                $Offer->title = $data['title'];
                $Offer->link = strtolower($link);
                $Offer->meta_description = $data['meta_description'];
                $Offer->content = $data['content'];
                $Offer->thumb = $data['thumb'];
                $Offer->save();
                if ($Offer) {
                    return redirect()->route('offer.all');
                }
            }
        } else {
            return redirect()->route('offer.all');
        }
    }

    public function delete($id)
    {

        $Offer = Offer::where('id', $id)->first();
        if ($Offer) {
            /*
            $file = str_replace( "/","\/", 'adminStroage/'.$Offer->thumb );
            $filePath = public_path($file);
            unlink($filePath);
             * 
             */
            $Offer->delete();
            return redirect()->route('offer.all');
        } else {
            return redirect()->route('offer.all');
        }
    }

    function clean($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $value = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        $temp = "";
        $flag = true;
        foreach (str_split($value) as $ch) {
            if ($ch == '-') {
                if (!$flag) {
                    continue;
                }
                $temp .= $ch;
                $flag = false;
            } else {
                $temp .= $ch;
                $flag = true;
            }
        }
        return $temp;
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Kosan;
use Illuminate\Http\Request;

class KosanController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit');
        $name = $request->input('name');
        $city = $request->input('city');
        $country = $request->input('country');
        $price = $request->input('price');
        $type_kosan = $request->input('type_kosan');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $map_url = $request->input('map_url');
        $number_of_bedrooms = $request->input('number_of_bedrooms');
        $number_of_bathrooms = $request->input('number_of_bathrooms');
        $number_of_cupboards = $request->input('number_of_cupboards');

        if ($id) {
            $kosan = Kosan::with(['galleries'])->find($id);

            if ($kosan) {
                return ResponseFormatter::success(
                    $kosan,
                    'Data Berhasil Diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data Tidak Ada',
                    404
                );
            }
        }

        $kosan = Kosan::with(['galleries']);

        if ($name) {
            $kosan->where('name', 'like', '%', $name, '%');
        }

        if ($city) {
            $kosan->where('city', 'like', '%', $city, '%');
        }

        if ($country) {
            $kosan->where('country', 'like', '%', $country, '%');
        }

        if ($price) {
            $kosan->where('price', 'like', '%', $price, '%');
        }

        if ($type_kosan) {
            $kosan->where('type_kosan', 'like', '%', $type_kosan, '%');
        }

        if ($address) {
            $kosan->where('address', 'like', '%', $address, '%');
        }

        if ($phone) {
            $kosan->where('phone', 'like', '%', $phone, '%');
        }

        if ($map_url) {
            $kosan->where('map_url', 'like', '%', $map_url, '%');
        }

        if ($number_of_bedrooms) {
            $kosan->where('number_of_bedrooms', 'like', '%', $number_of_bedrooms, '%');
        }

        if ($number_of_bathrooms) {
            $kosan->where('number_of_bathrooms', 'like', '%', $number_of_bathrooms, '%');
        }

        if ($number_of_cupboards) {
            $kosan->where('number_of_cupboards', 'like', '%', $number_of_cupboards, '%');
        }

        return ResponseFormatter::success(
            $kosan->paginate($limit),
            'Data Berhasil Diambil'
        );
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\Temperature;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class HaydayController extends Controller
{

    public function index()
    {

        $query = Instansi::latest();
        if (request('search')) {
            $query->where('Humidity', 'like', '%' . request('search') . '%')
                ->orWhere('Capacity', 'like', '%' . request('search') . '%');
        }
        $Instansis = $query->paginate(6)->withQueryString();
        return view('homepage', compact('Instansis'));
    }

    public function hometamu()
    {
        $Instansi = Instansi::all();
        return view('hometamu');
    }
    public function tutor()
    {
        $Instansi = Instansi::all();
        return view('tutorial');
    }

    public function toko()
    {
        $Instansi = Instansi::all();
        return view('store');
    }



    public function detail($id)
    {
        $Instansi = Instansi::find($id);
        return view('detail', compact('Instansi'));
    }

    public function create()
    {
        $categories = Temperature::all();
        return view('input', compact('categories'));
    }




    public function store(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'string', 'max:255', Rule::unique('Instansis', 'id')],
            'Humidity' => 'required|string|max:255',
            'Temperature_id' => 'required|integer',
            'Capacity' => 'required|string',
            'tahun' => 'required|integer',
            'foto_sampul' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Jika validasi gagal, kembali ke halaman input dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect('Instansis/create')
                ->withErrors($validator)
                ->withInput();
        }

        $randomName = Str::uuid()->toString();
        $fileExtension = $request->file('foto_sampul')->getClientOriginalExtension();
        $fileName = $randomName . '.' . $fileExtension;

        // Simpan file foto ke folder public/images
        $request->file('foto_sampul')->move(public_path('images'), $fileName);
        // Simpan data ke table Instansis
        Instansi::create([
            'id' => $request->id,
            'Humidity' => $request->Humidity,
            'Temperature_id' => $request->Temperature_id,
            'Capacity' => $request->Capacity,
            'tahun' => $request->tahun,
            'foto_sampul' => $fileName,
        ]);

        return redirect('/homepage')->with('success', 'Data berhasil disimpan');
    }





    public function data()
    {
        $Instansis = Instansi::latest()->paginate(10);
        return view('data-Instansis', compact('Instansis'));
    }

    public function edit($id)
    {
        $Instansi = Instansi::find($id);
        $categories = Temperature::all();
        return view('form-edit', compact('Instansi', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'Humidity' => 'required|string|max:255',
            'Temperature_id' => 'required|integer',
            'Capacity' => 'required|string',
            'tahun' => 'required|integer',
            'foto_sampul' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Jika validasi gagal, kembali ke halaman edit dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect("/Instansi/{$id}/edit")
                ->withErrors($validator) 
                ->withInput();
        }

        // Ambil data Instansi yang akan diupdate
        $Instansi = Instansi::findOrFail($id);

        // Jika ada file yang diunggah, simpan file baru
        if ($request->hasFile('foto_sampul')) {
            $randomName = Str::uuid()->toString();
            $fileExtension = $request->file('foto_sampul')->getClientOriginalExtension();
            $fileName = $randomName . '.' . $fileExtension;

            // Simpan file foto ke folder public/images
            $request->file('foto_sampul')->move(public_path('images'), $fileName);

            // Hapus foto lama jika ada
            if (File::exists(public_path('images/' . $Instansi->foto_sampul))) {
                File::delete(public_path('images/' . $Instansi->foto_sampul));
            }

            // Update record di database dengan foto yang baru
            $Instansi->update([
                'Humidity' => $request->Humidity,
                'Capacity' => $request->Capacity,
                'Temperature_id' => $request->Temperature_id,
                'tahun' => $request->tahun,
                'foto_sampul' => $fileName,
            ]);
        } else {
            // Jika tidak ada file yang diunggah, update data tanpa mengubah foto
            $Instansi->update([
                'Humidity' => $request->Humidity,
                'Capacity' => $request->Capacity,
                'Temperature_id' => $request->Temperature_id,
                'tahun' => $request->tahun,
            ]);
        }

        return redirect('/Instansis/data')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $Instansi = Instansi::findOrFail($id);

        // Delete the Instansi's photo if it exists
        if (File::exists(public_path('images/' . $Instansi->foto_sampul))) {
            if ($Instansi->foto_sampul != 'default.jpg') {
                File::delete(public_path('images/' . $Instansi->foto_sampul));
            }
        }

        // Delete the Instansi record from the database
        $Instansi->delete();

        return redirect('/Instansis/data')->with('success', 'Data berhasil dihapus');
    }
}

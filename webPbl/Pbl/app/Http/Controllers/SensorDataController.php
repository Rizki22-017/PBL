<?php
namespace App\Http\Controllers;

use App\Models\SensorData;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SensorDataController extends Controller
{
    public function index()
    {
        $sensorData = SensorData::orderBy('created_at', 'desc')->paginate(10);
        return view('sensordata', compact('sensorData'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'temperature' => 'nullable|numeric',
            'distance' => 'nullable|numeric',
            'soilMoisture' => 'nullable|numeric',
        ]);

        $sensorData = new SensorData();
        $sensorData->temperature = $request->input('temperature');
        $sensorData->distance = $request->input('distance');
        $sensorData->soil_moisture = $request->input('soilMoisture');
        $sensorData->save();

        return response()->json(['message' => 'Data berhasil disimpan'], 200);
    }

    public function showLatestData()
    {
        $latestData = SensorData::orderBy('created_at', 'desc')->first();
        $firstData = SensorData::orderBy('created_at', 'asc')->first();
        
        $capacityNotification = null;
        $timeNotification = null;

        if ($latestData && $firstData) {
            $startDate = Carbon::parse($firstData->created_at);
            $currentDate = Carbon::now();
            $daysDiff = $startDate->diffInDays($currentDate);

            if ($daysDiff >= 14) {
                $timeNotification = 'Pupuk sudah siap digunakan.';
            }

            if ($latestData->distance == 100) {
                $capacityNotification = 'Kapasitas penuh.';
            }
        } else {
            $daysDiff = 0;
            $startDate = null;
        }

        return view('homepage', compact('latestData', 'daysDiff', 'startDate', 'capacityNotification', 'timeNotification'));
    }
}

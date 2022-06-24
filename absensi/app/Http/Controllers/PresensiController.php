<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\Presensi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('presensi.masuk');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
        $presensi = Presensi::where([
            ['user_id', '=', auth()->user()->id],
            ['tgl', '=', $tanggal],
        ])->first();
        if ($presensi) {
            return redirect()->back()->with('Anda Sudah Check In');
        } else {
            Presensi::create([
                'user_id' => auth()->user()->id,
                'tgl' => $tanggal,
                'jammasuk' => $localtime,
                'keterangan' => $telat

            ]);
        }
        return redirect()->back()->with('Success', 'Anda Berhasil Check In');
        // return redirect('presensi.masuk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function halamanrekap()
    {
        $label_bar = ['presensi'];
        $data_bar = [];

        foreach ($label_bar as $key => $value) {
            $data_bar[$key]['label'] = $label_bar[$key];
            $data_bar[$key]['backgroundcolor'] = $key == 0 ? 'rgba(60,141,188,0.9)' : 'rgba(210,214,222,1)';
            $data_month = [];

            foreach (range(1, 12) as $month) {
                if ($key == 0) {
                    $data_month[] = Presensi::select(db::raw("count(*)as total"))->wheremonth('created_at', $month)->first()->total;
                } else {
                    $data_month[] = Presensi::select(db::raw("count(*)as total"))->wheremonth('updated_at', $month)->first()->total;
                }
            }
            $data_bar[$key]['data'] = $data_month;
        }
        return view('presensi.rekap_karyawan', compact('label_bar', 'data_bar'));
    }

    public function presensipulang()
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');

        $presensi = Presensi::where([
            ['user_id', '=', auth()->user()->id],
            ['tgl', '=', $tanggal],
        ])->first();

        $dt = [
            'jamkeluar' => $localtime,
            'jamkerja' => date('H:i:s', strtotime($localtime) - strtotime($presensi->jammasuk))
        ];

        if ($presensi->jamkeluar == "") {
            $presensi->update($dt);
            return redirect()->back()->with('Success', 'Anda Berhasil Check Out');
        } else {
            return redirect()->back()->with('Anda Sudah Check Out');
        }
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function test_spatie()
    {
        // $role = Role::create(['name' => 'admin']);
        // $permission = Permission::create(['name' => 'rekap_karyawan']);
        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);
        // $user = auth()->user();
        // $user->assignRole('admin');
        // return $user;
        // $user = User::with('roles')->get();
        // return $user;
        // $user = auth()->user();
        // $user->removeRole('admin');
    }
}

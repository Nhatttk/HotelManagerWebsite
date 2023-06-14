<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LichsudatphongController extends Controller
{
    public function viewLichsudatphong() {
       $result = DB::table('thongtindatphong')->where('maKH', session()->get('maKH'))->get();
    //    dd($result->maKH);
       return view('hotel.lichsudatphong', compact('result'));
    }

    public function destroy($id) {
      $result = DB::table('thongtindatphong')->where('madatphong', $id)->first();
      $date = date('Y-m-d H:i:s');
      // dd($date,$result->CheckIn);
      if ($result->CheckIn < $date) {
         return redirect()->route('viewLichsudatphong')->with('errorQuahan', 'Đã quá hạn hủy đặt phòng');
      }
      else {
         DB::table('thongtindatphong')->where('madatphong', $id)->delete();
         return redirect()->route('viewLichsudatphong')->with('huydatphongthanhcong', 'Bạn đã hủy đặt phòng thành công');
      }
    }
}

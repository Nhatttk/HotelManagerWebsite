@extends('hotel.back.datphong.master2')
@section('main')
    <div class="info-thong_tin" style="margin: 50px; align-items: center">

        <h1>Lịch sử đặt phòng</h1>

        <table class="styled-table">
            <thead>
                <tr>
                    <th>Mã đặt phòng</th>
                    <th>CheckIn</th>
                    <th>CheckOut</th>
                    <th>Số phòng</th>
                    <th>Acction</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($result as $item)
                    <tr>

                        <td>{{ $item->madatphong }}</td>
                        <td>{{ $item->CheckIn }}</td>
                        <td>{{ $item->CheckOut }}</td>
                        <td scope="row">{{ $item->sophong }}</td>
                        <td>
                            <form action="{{ route('huydatphong', $item->madatphong) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Hủy đặt phòng" class="btn btn-danger btn-sm">
                            </form>
                        </td>
                    </tr>
                @endforeach
                <!-- and so on... -->
            </tbody>
        </table>

        @if (session('errorQuahan'))
            <script>
                alert('Đã quá hạn hủy đặt phòng');
            </script>
        @endif
        @if (session('huydatphongthanhcong'))
            <script>
                alert('Bạn đã hủy đặt phòng thành công');
            </script>
        @endif

    </div>
@endsection

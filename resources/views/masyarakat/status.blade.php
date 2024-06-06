@extends('masyarakat.master')

@section('content')
<div class="navbars" style="background-image: url('images/navbar-image.png'); filter: blur(2px); width: 100vw;"></div>

<div class="status-body" style="background-image: url('images/bg.png');">
  <div class="bg-box">
    {{-- <img src="images/bg.png" alt=""> --}}
    <div style="width: 1293px; height: 866px; left: 81px; top: 197px; position: absolute; background: rgba(255, 255, 255, 0.23); box-shadow: 0px 2px 8.4px 7px rgba(255, 255, 255, 0.12); border-radius: 30px; border: 1px rgba(255, 255, 255, 0.46) solid;"></div>

    <div style="left: 612px; top: 51px; position: absolute; text-align: center; color: #FEF0D5; font-size: 64px; font-weight: 700; word-wrap: break-word;">Status</div>

    @foreach ([
        ['top' => 242, 'date' => '11/02/2024', 'status' => 'Tuntas', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do...'],
        ['top' => 313, 'date' => '16/03/2024', 'status' => 'Proses', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do...'],
        ['top' => 384, 'date' => '19/03/2024', 'status' => 'Proses', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do...'],
        ['top' => 455, 'date' => '21/03/2024', 'status' => 'Proses', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do...']
    ] as $item)
        <a href="{{ url('/detailstatus', ['date' => $item['date']]) }}" style="display: block; width: 1191px; height: 71px; left: 132px; top: {{ $item['top'] }}px; position: absolute; text-decoration: none; color: inherit;">
            <div style="width: 100%; height: 100%; background: rgba(217, 217, 217, 0.28); border: 1px white solid; display: flex; align-items: center; justify-content: space-between; padding: 0 20px; box-sizing: border-box;">
                <div style="color: white; font-size: 26px; font-weight: 700;">{{ $item['status'] }}</div>
                <div style="color: white; font-size: 24px; font-weight: 400; flex: 1; text-align: left; padding-left: 20px;">{{ $item['desc'] }}</div>
                <div style="color: #FEF0D5; font-size: 16px; font-weight: 400;">{{ $item['date'] }}</div>
            </div>
        </a>
    @endforeach
</div>
</div>
@endsection

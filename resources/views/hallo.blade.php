<html>

<head>
    <!-- memanggil bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Bootstap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

    <body>

    @php
    $isActive=false;
    $hasError=true;
    @endphp

    <span @class ([p-4 font told => $isActive,
        'text-gray-500' => !$isActive,
        'bg-red'=> $hasError
        ])>{{$nama}}</span>

        <span class="p-4 text-gray-500 bg danger"></span>

        @foreach($array as $data)
        @if($loop->first)
        Ini adalah index pertama
        @endif
        
        @if($loop->last)
        Ini adalah loop terakhir
        @endif

        <p>This is data {{$data}}</p>
        @endif


        <hr>

        @forelse($array as $data)
        <li>{{$data}}</li>
        @empty
        <p>No Data</p>
        @endforelse

        <hr>

        @foreach($array as $data)
        <p>This Data {{$data}}</p>
        @endforeach

        <hr>

        {{-- for loop --}}
        @for($i=0; $i<10; $i++) The current value is {{$i}} <br>
            @endfor 
        <hr>
        @switch($nama)
        @case("jong kodung")
        <h1>Halo, aku {{$nama}}</h1>
        @break
        @case("")
        <h1>Maaf aku tidak punya nama</h1>
        @break
        @default <h1>Halo, aku baru bangun</h1>
        @endswitch
    
        <hr>

        @auth
        user diautentikasi
        @endauth

        @guest
        user sebagai guest
        @endguest

        <hr>

        @if($nama=="")
        <h1>Maaf aku tidak punya nama</h1>
        @elseif($nama=="Jong Koding")
        <h1>Halo, Aku {{$nama}}</h1>
        @else <h1>Hai, aku bukan jong koding</h1>
        @endif


        <h1>Hallo, Aku {{$nama}}</h1>
        <h1>Hallo, Aku <?= $nama ?> </h1>
        <h1>Hallo, Aku <?php echo $nama ?></h1>

        <script>
            var app = <?php echo jason_encode($array); ?>
            var app_two = @json($array);
        </script>
    </body>
</html>
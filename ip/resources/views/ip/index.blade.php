<x-layout title="ip">
    <a href="{{ route('home.index') }}" class="btn btn-dark my-3">Home</a>
    <a href="{{route('ip.create')}}" class="btn btn-dark my-3">Adicionar ip</a>



    <table class="table table-striped">
        {{$i = 0}}
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">IP</th>
            <th scope="col">cidade</th>
            <th scope="col">Continente</th>
            <th scope="col">regiao</th>
            <th scope="col">Empresa</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($dados as $dado)
            <tr>
                <th>{{$i= $i + 1}}</th>
                <td>{{$dado->ip}}</td>
                <td>{{$dado->cidade}}</td>
                <td>{{$dado->continente}}</td>
                <td>{{$dado->regiao}}</td>
                <td>{{$dado->empresa}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <div id="map" style="height: 400px; width: 100%;"></div>
    <body onload="initMap()">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEvahuPXOfV0OOZjtI0OSpbe57pXhnNzY"></script>
</x-layout>











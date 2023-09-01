@extends('layout.master')


@section('content')
    @php
        $array = ['jhon deo', 'Ricky', 'Albart', 'jhonny'];
    @endphp
    <ul>
        @foreach ($array as $arr)
            <li>{{ $arr }}</li>
        @endforeach
    </ul>
    <ul>
        @for ($i = 0; $i < count($array); $i++)
            <li>
                {{ $array[$i] }}
            </li>
        @endfor
    </ul>
    <h2>content section</h2>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam quia beatae, ducimus dolorum dolores assumenda
        dolore autem quae ipsam laboriosam recusandae veritatis atque aspernatur sit! Illum cumque quod voluptatem? Aperiam!
    </p>
@endsection

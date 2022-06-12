@props(['reservations'=>$reservations])

<head>
    <style>
        .grid{
                display: grid;
                grid-template-columns: repeat(6,1fr);
                border-top:1px solid black;
                border-right:1px solid black;
                margin-top:50px;
            }

            .grid > div {
                padding:8px 4px;
                border-left:1px solid black;
                border-bottom:1px solid black;
            }
            .table_heading{
                background: gray;
            }
            .row:nth-child(even){
                background-color:rgb(184, 183, 183);
            }  
    </style>
</head>

<div class="grid" >
    @foreach ($reservations as $reservation)
<div class="row" >
<div class="item" >{{$reservation->name_surname}}</div>
<div class="item" >{{$reservation->service}}</div>
<div class="item" >{{$reservation->persons}}</div>
<div class="item" >{{$reservation->date}}</div>
<div class="item" >{{$reservation->period}}</div>
<div class="item" >{{$reservation->status}}</div>
</div>
@endforeach
</div>
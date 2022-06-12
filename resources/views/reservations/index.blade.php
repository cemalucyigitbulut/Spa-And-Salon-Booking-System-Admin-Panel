 <head>
    
        <style>
                .container {
                    font-family: arial;
                    font-size: 24px;
                    margin: 25px;
                    width: 600px;
                    height: 200px;
                    /* Setup */
                    position: relative;
            }
                .child {
                    width: 50px;
                    height: 50px;
                    /* Center vertically and horizontally */
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    margin: -25px 0 0 -25px; /* Apply negative top and left margins to truly center the element */
            }
            
            .grid{
                display: grid;
                grid-template-columns: repeat(8,1fr);
                border-top:1px solid black;
                margin-top:50px;
            }
            .grid > span {
                padding:8px 4px;
                border-left:1px solid black;
                border-bottom:1px solid black;
            }
            .table_heading{
                background: gray;
            }
        </style>
        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 </head>   
 <div>
     <h1 style="margin:20px" >Bookings</h1>
 </div>

    @if(auth()->user())
    <form action="{{route('search')}}">
        <div style="width:20%;margin-top:30px;margin-left:10px;margin-bottom:20px" class="input-group">
            <input name="search" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <button type="submit" class="btn btn-outline-primary">search</button>
          </div>
   <div>
       <div class="grid" >
           <span class="table_heading" >
               <strong>Name Surname</strong>
           </span>
           <span class="table_heading" >
               <strong>Service</strong>
           </span>
           <span class="table_heading" >
               <strong>Persons</strong>
           </span>
           <span class="table_heading" >
               <strong>Date</strong>
           </span>
           <span class="table_heading" >
               <strong>Period</strong>
           </span>
           <span class="table_heading" >
            <strong>Status</strong>
           </span>
           <span class="table_heading">
            <strong> Payment ID </strong>
            </span>
           <span class="table_heading">
               <strong>Change Status</strong>
           </span>
           
        
       {{-- {{dd($reservations);}}  --}}
        @if($reservations->count())
        
             @foreach ($reservations as $reservation)
            <div class="item" >{{$reservation->name_surname}}</div>
            <div class="item" >{{$reservation->service}}</div>
            <div class="item" >{{$reservation->persons}}</div>
            <div class="item" >{{$reservation->date}}</div>
            <div class="item" >{{$reservation->period}}</div>
            <div class="item" >{{$reservation->status}}</div>
            <div class="item" >{{$reservation->payment_id}}</div>
        </form>
           <div>
            <form style="display:inline" action="{{route('served')}}" method="POST" >
                @csrf
                <input name="served" value={{$reservation->id}} style="display: none" type="text">
                <button type="submit" >served</button>
            </form>
            <form action="{{route('cancelled')}}" style="display: inline" method="POST" >    
                @csrf
            <input style="display: none" type="text" name="cancelled" value={{$reservation->id}}>
            <button type="submit" >Cancelled</button>   
        </form>
            </div>
            @endforeach
        @else
        <div> There are no bookings </div>
    @endif
    {{$reservations->links()}}

</div>
   </div>
    <form action="{{route('logout')}}" method="post" class="p-3 inline" >
        @csrf
        <p style="position: absolute;top:0; right:100px;top:15px" > {{auth()->user()->name}} </p>
        <button style="position: absolute;top:0;right:0;margin:10px" type="submit">Logout</button>
    </form>
    @else
        
        <form action="/" method="POST">
            @csrf
                <div class="container">
                <div class="child">
                    @if (session('status'))
                    <div>{{session('status')}}</div>
                @endif
                    <h3> Admin Login </h3>      
                <label for="email">Email</label>
                <input required type="email" name="email" placeholder="Email here..." >
                <br>
                <br>
                <label for="password">Password</label>
                <input required type="password" name="password" placeholder="Password here...">
                <br>
                <br>
                <button type="submit" > Login </button>
                </div>
            </div>
        </form>
@endif


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
    </style>
</head>   
@if (auth()->user())
<form action="{{route('logout')}}" method="post" class="p-3 inline" >
    @csrf
    <button type="submit">Logout</button>
</form>
@else
<form action="{{route('register')}}" method="POST">
    @csrf
        <div class="container">
        <div class="child">
            <h3> Admin Registration </h3>      
        <label for="name">Name</label>
        <input required type="text" name="name" placeholder="Enter your full name here...">
        <br>
        <br>
        <label for="email">Email</label>
        <input required type="email" name="email" placeholder="Email here..." >
        <br>
        <br>
        <label for="password">Password</label>
        <input required type="password" name="password" placeholder="Password here...">
        <br>
        <br>
        <label for="password_confirmation">Confirm Password</label>
        <input required type="password" name="password_confirmation" placeholder="Confirm password here..." >
        <br>
        <br>
        <button type="submit" > Register </button>      
        </div>
    </div>
</form>

@endif
    

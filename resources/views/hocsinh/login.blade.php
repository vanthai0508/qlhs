
<html>
<head>
<link href="{{asset('css/create.css')}}" rel="stylesheet" >
</head>
    <div class="login-box">
        <h2>LOGIN</h2>
        @if(session('status'))
        <ul>
            <li class="text-danger">{{ session('status') }} </li>
        </ul>
        @endif
        <form  method="post" action="" >
            <!-- @if($errors->has('username'))
            <div>
                    {{$errors->first('username')}}
            </div>
            @endif -->
        <!-- <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}"/> -->
            <div class="user-box">
                <input type="text" name="username" id="username">
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" id="password">
                <label>Password</label>
            </div>
            
            <input type="submit" value="login">
                
        @csrf
        </form>
        <!-- <a href="index.php?Controller=user&Action=dangnhap">DANG NHAP</a> 
    
        pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number."
        
    pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Invalid email address"
-->
    </div>
</html>
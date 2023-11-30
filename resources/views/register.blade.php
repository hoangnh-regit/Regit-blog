<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Regit Blogs|Sign up</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet" />
    <link href="https://fonts.cdnfonts.com/css/svn-gilroy" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" />
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="containers">
        <div class="logo">
            <img src="./images/Group 155.png" alt="">
        </div>
        <div class="form">
            <h1>Sign up</h1>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-input">
                    <label for="name">Username <span>* </span></label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="form-input">
                    <label for="email">Email <span>* </span></label>
                    <input type="text" name="email" id="email">
                </div>
                <div class="form-input">
                    <label for="password">Password <span>* </span></label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form-input">
                    <label for="rePassword">Password Confirm <span>* </span></label>
                    <input type="password" name="password_confirmation" id="rePassword">
                </div>
                <div class="button">
                    <button class="" type="submit">Sign up</button>
                </div>
                <a href="">Already have an account? Login</a>
            </form>
        </div>
    </div>
</body>

</html>

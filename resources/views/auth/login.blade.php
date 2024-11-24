<div class="wrap">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            height: 100%;
            background: #222222;
            background: linear-gradient(to top, #679e34, #bed43d);
            color: white;
        }

        body {
            font-family: Arial, sans-serif;;
            font-size: 1rem;
            line-height: 1.6;
            height: 100%;
        }

        nav {
            width: 95vw;
            margin: 15px auto;
            display: flex;
            justify-content: space-between;
        }

        .boutons {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        nav .bouton {
            font-size: 18px;
            padding: 8px 10px;
            color: #123d4c;
            margin-right: 30px;
            background: #22b9c1;
            border-style: none;
            border-radius: 25px;
            display: inline-block;
        }

        nav .bouton a {
            text-decoration: none;
        }


        .main-container a {
            color: white;
        }

        .main-container {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100vh;
        }

        .footer {
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 10vh;
            width: 500px;
            margin: 0 auto;
        }

        .wrap {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: black;
            /*background: #fafafa;*/
        }

        .login-form {
            width: 350px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 2rem;
            background: #ffffff;
        }

        .form-input {
            background: #fafafa;
            border: 1px solid #eeeeee;
            padding: 12px;
            width: 100%;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .remember {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-button {
            background: #69d2e7;
            border: 1px solid #ddd;
            color: #ffffff;
            padding: 10px;
            width: 100%;
            text-transform: uppercase;
        }

        .form-button:hover {
            background: #69c8e7;
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-footer {
            text-align: center;
        }

        .form-footer a {
            color: #69c8e7;
        }
    </style>
    <form class="login-form" action="{{route('login')}}" method="post">
        @csrf
        <div class="form-header">
            <h3>Connexion</h3>
            <p>Accès au tableau de bord</p>
        </div>
        <!--Email Input-->
        <div class="form-group">
            <input type="text" name="email" class="form-input" placeholder="email@example.com">
        </div>
        <!--Password Input-->
        <div class="form-group">
            <input type="password" name="password" class="form-input" placeholder="password">
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" name="remember"> Rester connecté
            </label>
        </div>
        <!--Login Button-->
        <div class="form-group">
            <button class="form-button" type="submit">Login</button>
        </div>
        <div class="form-footer">
            Vous n'avez pas de compte ? <a href="{{route('register')}}">Enregistrement</a>
        </div>
    </form>
</div><!--/.wrap-->

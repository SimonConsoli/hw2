<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="{{ url('css/login.css')}}">
        <script src="{{ url('js/login.js') }}" defer></script>

</head>
<body>
    <article id="main">
    <section id="form">
            
        <form name="login_form" method="post" action="{{ route('loginPage') }}">
            <h3 id="title_site">LebonBlog</h3>
               
                <p>
                    <label class="username">Nome Utente<input type='text' name='username' value="{{ old('username') }}"></label>
                </p>
             
                
                <p> 
                    <label class="password">Password <input type='password' name='password'></label>
                </p>
                 <div class="login_err hidden">I due campi non possono essere vuoti.</div>
               <p id="subm">
                    <a href="{{ route('registrazione') }}">Non sei registrato? Clicca qui<a>
                        <input type='submit' value="Login"></label>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />



            </form>
        </section>
        </article>
    </body>
</html>
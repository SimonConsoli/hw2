<html>
    <head>
          <title>Registrati ->LebonBlog<-</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ url('css/registration.css')}}">
        <script src="{{ url('js/registrazione.js') }}" defer></script>
       <script type="text/javascript">
      const Registrazione_ROUTE="{{url("registrazione")}}";
        </script>

</head>
<body>
    <article id="main">
    <section id="form">
         
           
        <form name="registration_form" id="reg_form" method="post" action="{{ route('registrazione') }}">
            
            <h3 id="site_name">LebonBlog</h3>
                <div id="register">Registrati</div>
                <div class="error_A hidden">Compila i campi in modo corretto.</div>



                <p class="nome"> 
                    <label>Nome<input type='text' name='name' value="{{ Request::old('name') }}"></label>
                </p>
                 <div id="error_n"class="registration_err hidden">Nome non valido</div>

                <p class="cognome"> 
                    <label>Cognome<input type='text' name='surname' value="{{ Request::old('surname') }}"></label>
                </p>
                <div id="error_s" class="registration_err hidden">Cognome non valido</div>

                <p class="username">
                    <label>Nome Utente<input type='text' name='username' value="{{ old('username') }}"></label>
                </p>
                <div id="error_us" class="registration_err hidden">Username non valido</div>

                <p class="email"> 
                    <label>E-Mail<input type='text' name='email' value="{{ Request::old('email') }}"></label>    
                </p>
                <div id="error_em" class="registration_err hidden">E-mail non valida</div>

                <p class="password"> 
                    <label>Password <input type='password' name='password' value="{{ Request::old('password') }}"></label>
                </p>
                <div id="error_pass" class="registration_err hidden">La password deve essere compresa tra 8 e 16 caratteri</div>
                
                <p class="confirm_password"> 
                    <label>Conferma Password<input type='password' name='confirm_password'value="{{ Request::old('confirm_password') }}"></label>
                </p>
                <div id="error_cp" class="registration_err hidden">Le password non corrispondono</div>

                <p id="logandsubmit">
                    <a href="{{ route('loginPage') }}" id="loginredirect">Già registrato? Effettua il login.</a><input type='submit' id="submit" value="Registrati">
                </p>
               <input type="hidden" name="_token" value="{{ csrf_token() }}" />


            </form>
          
        </section>
        </article>
    </body>
</html
  
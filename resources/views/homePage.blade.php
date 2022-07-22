<!DOCTYPE html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LebonBlog</title>
   <link rel="stylesheet" href="{{ url('css/home_page.css')}}">
        <script src="{{ url('js/home_page.js') }}" defer></script>
        <script src="{{ url('js/navbar.js') }}" defer></script>
       
    

</head>
<body >
<section id="bo">
<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="{{ url('homePage') }}">Home</a>
  <a href="{{ url('loginPage') }}">Login</a>
  <a href="{{ url('registrazione') }}">Signup</a>
  <a href="{{ url('logout') }}">Logout</a>
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()"> Open Sidebar</button>
</div>
</section>
    

    <header id="home" class="header">
        <div class="overlay"></div>

        <div id="header-c" class="c slide" data-ride="c">  
            <div class="container">
                <div class="c-inner">
                    <div class="c-item active">
                        <div class="c-caption ">
                            <h1 class="c-title">Passato, presente e futuro<br> Qui e ora</h1>
                            <button id="showpost" class=" btn btn-primary btn-rounded" href="{{url('osservaPost')}}">Leggi i post</button>
                       <section id="posts"></section>
                        </div>
                    </div>            
                </div>
            </div>        
        </div>
        <div class="hidden show"></div>

        <div class="infos container ">
            <div class="title">
              
                <h5>Il blog di domani</h5>
                <p class="font-small">Un solo owner, una community di publisher</p>
            </div>
            <div class="socials ">
                <div >
                    <div>
                        <a > @Simon_Consoli</a>
                       
                    </div>
                    <div >
                        <h6 class="subtitle ">Social Media</h6>
                       
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="section" id="testmonial">
        <div class="container">
            <div id="titoletto">
            <h3 class="section-title" id="gfds">Testimonials</h3>
</div>

            <div id="owl-testmonial" class="owl-carousel owl-theme mt-4">
                <div class="item">
                    <div class="textmonial-item">
                        <img src="{{ url('imgs/avatar1.jpeg') }}" class="avatar" >
                        <div >
                            <p>In questo sito ho notato la differenza con altri blog, la possibilità di esprimere la propria e di renderla pubblica è una rivoluzione.<br><br>Un nuovo punto di riferimento per i millenials. Viva la generazione Z!</p>
                            <div class="line"></div>
                            <h6 class="name">Lucy Hawkings</h6>
                            <h6 class="name">Economista</h6>
                        </div>
                    </div>
                </div>
             
             
    </section>
     <article id="background">
            <article id="sezionepost">
               
             <h9 >Sezione post </h9><h10> Qui puoi sfruttare la tua immaginazione e scrivere la tua sugli eventi che accadono in tutto il mondo.</h10>
             <div class="possibilities">
                  <div class="withdiv">
                      <button class="variety" data-button="writeit">Scrivi il tuo post</button>
                     <form  id="spotify" name="spotify">
                     
                       <input type="text"  id="takeasong" name="takeasong" placeholder="Cerca la canzone che esprime meglio il tuo pensiero">
                       <input type="submit" class="variety"id="inline" value="Aggiungi una canzone"> </form>
                <div id="canzone">
</div>  
                </div>
              </div>
            


         


            <div class="withpost hidden">
                <form name="mypost" id="mypost" method="POST" action="{{ route('inviopost') }}">
                   @csrf
                    <label name="titolo"><br>Titolo</label><input type="text" id="titolo" name="titolo" placeholder="Inserisci il titolo">
                    
                    <label name="opinion">La tua opinione</label><textarea id="opinion" name="opinion" placeholder="Scrivi la tua opinione in merito!" rows="20" cols="200" wrap="soft"></textarea>
                    
                    <input type="submit" id="submit" value="Posta!">
                  
                </form>
            </div>
            </article>  
            </article>
    
   
            <footer class="footer mt-5 border-top">
                        <p class="mb-0">Simone Consoli 1000004441 </p>
                    </div>
                    
            </footer>
        </div>
    </section>
</body>
</html>
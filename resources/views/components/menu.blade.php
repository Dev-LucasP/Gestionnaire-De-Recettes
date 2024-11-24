<nav>
    <!-- Pages accessibles par tous -->
    <button><a href="{{ route('accueil') }}">🏛 Accueil</a></button>
    <button><a href="{{ route('presentation') }}">❔ À propos</a></button>
    <button><a href="{{ route('contact') }}">☎️ Contacts</a></button>

    <!-- Pages accessibles uniquement par les utilisateurs connectés -->
    @auth
        <button><a href="{{ route('recettes.index') }}">📜 Recettes</a></button>
    @endauth


<!-- Menu connexion / déconnexion -->
@guest
    <div>
        <button><a href="{{ route('register') }}">📥 Enregistrement</a></button>
        <button><a href="{{ route('login') }}">😎 Connexion</a></button>
    </div>
@endguest

@auth
    <div>
        {{ Auth::user()->name }}
        <button><a href="#" id="logout">🔓 Déconnexion</a></button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <script>
        document.getElementById('logout').addEventListener("click", (event) => {
            event.preventDefault();
            document.getElementById('logout-form').submit();
        });
    </script>
@endauth
</nav>

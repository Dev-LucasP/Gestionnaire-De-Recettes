<div>
    {{ Auth::user()->name }}
    <button><a href="#" id="logout">Déconnexion</a></button>
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

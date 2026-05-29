@if($mensagem = session('erro'))
    {{$mensagem}}
@endif

<form action ="{{ route('site.login') }}" method="POST">
    @csrf
    <div class="row container">
        Email:</br> <input type="email" name="email" class="validate"></br>
        Senha:</br> <input type="password" name="password" class="validate"></br>
        <button class="btn waves-effect waves-light blue" type="submit" name="action">Entrar</button>
    </div>
</form>
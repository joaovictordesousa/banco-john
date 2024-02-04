@include('header.header')

<section>
    <div class="row" id="div_results">
        <div class="col-sm-2" id="div_results_dentro">
            <div class="card" id="cards">
                <div class="card-body">
                    <h5 class="card-title">SALDO</h5>
                    <p class="card-text"><b>R$ {{ $somavalor }}</b></p>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<section>
    <form action="{{ route('register.store') }}" method="POST" id="form_cadastro">
        @csrf

        @if (session('success'))
            <div class="alert alert-primary">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(function() {
                    document.querySelector('.alert-primary').style.display = 'none';
                }, {{ session('display_time', 5000) }});
            </script>
        @endif

        <div class="div_form">
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Nome do depositante</label>
                <input type="text" class="form-control" name="nome" id="nome" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">VALOR</label>
                <div class="input-group">
                    <span class="input-group-text" id="inputGroupPrepend2">R$</span>
                    <input type="text" class="form-control" name="valor" id="valor" oninput="formatarValor(this)" required>
                </div>
            </div>

        </div>
        <div class="butao">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
</section>

<section>
    <table class="table" id="tabela">
        <thead>
            <tr>
                <th>DEPOSITANTE</th>
                <th>VALOR</th>
                <th>DATA</th>
                <th>HORA</th>
                <th>AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Allregister as $item)
                <tr>
                    <td>{{ $item->nome }}</td>
                    <td>R${{ $item->valor }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td> {{-- data formatada --}}
                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('H:i:s') }}</td> {{-- Hora formatada --}}
                    <td>
                        <form action="{{ route('register.destroy', ['item' => $item->id]) }}" method="POST"
                            onsubmit="return confirm('Tem certeza que deseja excluir?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" title="Excluir">Excluir</button>
                        </form>
                    </td>
                </tr>   
            @endforeach
        </tbody>
    </table>
</section>
<br><br><br><br><br>

@include('footer.footer')

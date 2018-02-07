<div id="navegacao" class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Navegação</h3>
    </div>
    <div class="box-body">
        <ol class="breadcrumb">
            <li><a href="/">Início</a></li>       
            @foreach ($Navegacao as $value)
                @if ($value['url'] != '#')
                    <li><a href='{{$value['url']}}'>{{$value['Descricao']}}</a></li>
                @else
                    <li class="active">{{$value['Descricao']}}</li>
                @endif
            @endforeach                                               
        </ol>
    </div>
</div>
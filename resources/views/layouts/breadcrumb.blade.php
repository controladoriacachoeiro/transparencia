@section('breadcrumb')

    <?php if(!empty($consulta) && !empty($subConsulta)) { ?>
        
        <li><a href="{{ route('filtroConsulta', ['consulta' => $consulta]) }}"><?php echo $consulta ?></a></li>
        

        <?php if(!empty($subConsulta) && !empty($tipoConsulta)) { ?>
        
            <li><a href="{{ route('filtroSubconsulta', ['consulta' => $consulta,'subConsulta' => $subConsulta]) }}"><?php echo $subConsulta ?></a></li>


            <?php if(!empty($tipoConsulta)) { ?>
                <li class='active'><?php echo $tipoConsulta ?></li>
            <?php } ?>

                
        <?php } elseif(!empty($subConsulta)) { ?>
            <li class='active'><?php echo $subConsulta ?></li>
        <?php } else { ?>
            <li class='active'><?php echo $consulta ?></li>
        <?php } ?>


    <?php } elseif(!empty($consulta)) { ?>
            <li class='active'><?php echo $consulta ?></li>
        <?php } ?>

@endsection
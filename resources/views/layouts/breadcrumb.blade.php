@section('breadcrumb')

    <?php if(!empty($consulta) && !empty($subConsulta)) { ?>
        
        <li><spam><?php echo $consulta ?></spam></li>
        

        <?php if(!empty($subConsulta) && !empty($tipoConsulta)) { ?>
        
            <li><spam><?php echo $subConsulta ?></spam></li>


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
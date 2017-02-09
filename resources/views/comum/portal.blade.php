@extends('layouts.app')
@section('htmlheader_title', 'O Portal')

@section('cssheader')
@endsection

@section('main-content')

      <div class="row">
        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-video-camera"></i>

              <h3 class="box-title">Vídeo Institucional</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs" frameborder="0" allowfullscreen></iframe>
                  </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-university"></i>

              <h3 class="box-title">O que é o Portal da Transparência?</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body text-justify">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in eleifend augue, eget lobortis magna. Aenean vitae dui ligula. Integer in congue dolor. Donec id condimentum justo. Maecenas sit amet elit odio. Morbi ultrices nisi felis, quis gravida magna vulputate ut. Vestibulum euismod elit at orci bibendum dictum. Donec a justo lorem. Fusce ullamcorper, nunc ac venenatis dapibus, nisl ante condimentum nibh, eget posuere lectus quam et nulla. Nullam sit amet viverra lacus. Mauris tempor lobortis mi sit amet cursus. Nunc orci erat, suscipit ut diam nec, lacinia faucibus mauris.</p>

                <p>Morbi tincidunt eget nulla in tincidunt. Morbi consequat malesuada mollis. Cras mattis iaculis leo ut dapibus. Sed semper gravida justo, et molestie quam venenatis eget. Nulla facilisis massa maximus enim rhoncus, ac sollicitudin justo cursus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris aliquet magna est. Ut finibus justo id ligula pellentesque sagittis. Vivamus mollis elementum congue. In a nibh dui.</p>

                <p>Sed a metus nec ante laoreet lobortis. Aenean eget rhoncus mauris, in consequat purus. Morbi et viverra eros. Nullam ultricies justo sem, in consequat felis tempor sit amet. Vivamus aliquam, metus quis interdum tempor, nulla nunc feugiat ligula, egestas ultrices neque est at ipsum. Fusce accumsan nisl quis velit blandit, non vehicula quam condimentum. Nulla semper velit nec nibh dapibus, id congue orci ultricies. Maecenas maximus mi sed velit scelerisque, ut bibendum nibh venenatis. Nunc porttitor sem sed sollicitudin euismod. Fusce non lectus felis. Etiam dapibus ante bibendum, iaculis augue quis, mattis ligula. Etiam fringilla tortor non tortor fermentum, quis malesuada mi hendrerit.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

@endsection

@section('scripts')
@endsection
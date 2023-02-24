@props(['ce','cv','pv'])
<div class="row" id="tarjetas">
    <div class="col-lg-4 col-md-6 col-12">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$ce->count()}}</h3>

          <p>Celulas Evangelisticas</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{route('celulas_evangelisticas.index')}}" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
 
    <div class="col-lg-4 col-md-6 col-12">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{$cv}}</h3>

          <p>Celulas Visitadas</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="{{route('visitas_todas')}}" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-12">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{$pv}}<sup style="font-size: 20px"></sup></h3>

          <p>Celulas Por Visitar</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="{{route('visitas_pendientes')}}" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
@extends('layouts/master')

@section('content')
{{ HTML::script('js/orders/show.js') }}

<div class="col-lg-12 centeredTitle "><h1>{{$company->fancy_name}} </h1></div>
<div class="col-lg-12"><h4> Estandares de calidad {{$company->fancy_name}} </h4></div>
<div class="col-lg-12"><h4>Puedo vender mis productos a {{$company->fancy_name}}? </h4></div>

<div class="col-sm-3 col-md-3 col-lg-3">
    <div class="thumbnail">
          {{ HTML::image("images/products/".$orders->product->img_url, $alt="$orders->product->name", $attributes = array('class'=>'insideImg')) }}
          <div class="caption">
            <h3>{{$orders->product->name}}</h3>  
            <p id="days" class="centeredTitle">
              Aún no haz Ofertado. Qué esperas?
            </p>
        </div>
</div>

</div>
{{Form::open(['route' => ['offers.store'],'id'=>'form'])}}
{{Form::hidden('order', $orders->id ) }}
{{Form::hidden('company', $company->id ) }}
<div class="col-sm-9  col-md-9 col-lg-9 ">
  <div class="panel-group" id="accordion">
    @foreach($dates as $month => $weeks)
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#{{$month}}">
              {{$month}}
            </a>
          </h4>  
        </div>
      <div id="{{$month}}" class="panel-collapse collapse in">
        <div class="panel-body">
          
          @foreach($weeks as $week => $Dates)
           
            <div class="row col-sm-12  col-md-12 col-lg-12 "><h4>Semana {{ $week}}</h4>
            
            @foreach(array_chunk($Dates,3) as $row) 
             
              <div class="row ">
                @foreach($row as $key => $date)
                  @if(!in_array($date->complete,$offer_dates))
                    <div class="col-sm-4 col-md-4 col-lg-4 centeredTitle datesCalendar">
                        <div id="{{ $date->day }}" class="datesNumber col-sm-12 col-md-12 col-lg-12">
                            <h1> {{ $date->day }}</h1>
                        </div>
                    <div id="f{{ $date->day }}" class="datesInput col-sm-12 col-md-12 col-lg-12" style="display: none;">
                    <!-- Dates Form Input -->
                    <div class="form-group">
                        {{ Form::label('amount', 'Cantidad a Entregar:') }}
                        {{ Form::text('amount[]', null , ['id'=>'i'.$date->day,'class'=> 'form-control']) }}
                        {{ Form::label('precio', 'Precio de Venta:') }}
                        {{ Form::text('price[]', null , ['id'=>'i'.$date->day,'class'=> 'form-control']) }}
                        {{ Form::hidden('date[]', $date->year.'-'.$date->month.'-'.$date->day ) }}
                    </div>
                    </div>

                    </div>
                
                @endif
            @endforeach
        </div>
        @endforeach
    </div>
    @endforeach
    </div>
</div>
</div>

    @endforeach
{{Form::submit()}}
</div>
</div>
</div>
</div>

{{Form::close()}}
@stop

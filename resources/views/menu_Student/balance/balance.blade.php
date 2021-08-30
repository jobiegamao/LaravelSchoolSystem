@extends('layouts.app')

@section('content')
<div class="content p-3">
    {{-- details on student --}}

    <style>
        table {
          font-family: arial, sans-serif;
          color: black;
          border-collapse: collapse;
          width: 100%;
        }
        
        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }
        
        tr:nth-child(even) {
          background-color: #dddddd;
        }
        </style>

        @php
            $y = 0.00;
            $x = number_format($y, 2)
        @endphp

    <div class="card">
        <div class="card-body">
            
            <table>
                <td valign='top' width="600">
                    <h4><b> Statement of Account Summary </b></h4>
                    <span><b> S.Y. {{ $acadPeriod->acadYear }} {{ $acadPeriod->acadSemText() }}  </b></span>
                    <table>
                        <tbody>
                            
                            <tr>
                                <td style="font-weight:bold">CURRENT DUE:</td>
                                <td style="text-align:right;">{{ $totalTuition ?? $x}}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold" colspan="2">LESS</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;padding-left: 30px">ADJUSTMENTS:</td>
                                <td style="text-align:right">{{ $adj ?? $x}}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;padding-left: 30px">PAYMENTS:</td>
                                <td style="text-align:right">{{ $totalPay ?? $x}} </td>
                            </tr>
                            <tr>
                               
                                <td style="font-weight:bold; font-size: 14px; color: red">BALANCE:</td>
                                <td style="font-weight:bold; font-size: 14px; text-align:right; color: red">{{ $balance ?? 0.00}}</td>
                                
                            </tr>
                        </tbody>
                        
                    </table>
                </td>

                <td valign="top" width="400">
                    <h4>Breakdown of Fees</h4>
                    
                    
                        <table>
                                <tbody>
                                    <tr>
                                        <td><strong>TUITION FEE</strong></td>
                                        <td style="text-align:right"><strong>{{ $unitsFee ?? $x}}</strong></td>
                                    </tr>
                                    <tr>
                                    <td><strong>MISCELLANEOUS FEES</strong></td>
                                        <td style="text-align:right">
                                            @if ($isGrad)
                                                <strong>{{ $fees->totalMisc() + $fees->totalGradFee() }}</strong>
                                            @else
                                                <strong>{{ $fees->totalMisc() }}</strong>
                                            @endif
                                        </td>
                                    
                                    @if ($isGrad)
                                        <tr>
                                            <td style="padding-left: 30px;">GRADUATION FEE</td>
                                            <td style="text-align:right"> {{ $fees->gradfee }}</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 30px;">RETREAT FEE</td>
                                            <td style="text-align:right"> {{ $fees->retreatfee }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td style="padding-left: 30px;">LABORATORY FEE</td>
                                        <td style="text-align:right"> {{ $totalLabFee ?? $x}}</td> 
                                    </tr>
                                    <tr>
                                        <td style="padding-left: 30px;">A-DCB STUDENT ACTIVITIES</td>
                                        <td style="text-align:right"> {{ $fees->misc_dcb }}</td>
                                    </tr><tr>
                                        <td style="padding-left: 30px;">A-DEVELOPMENT FEE</td>
                                        <td style="text-align:right"> {{ $fees->misc_devfee }}</td>
                                    </tr><tr>
                                        <td style="padding-left: 30px;">A-ENERGY FEE</td>
                                        <td style="text-align:right">{{ $fees->misc_energyfee }}</td>
                                    </tr><tr>
                                        <td style="padding-left: 30px;">A-FACILITIES IMPROVEMENTS</td>
                                        <td style="text-align:right">{{ $fees->misc_facimp }}</td>
                                    </tr><tr>
                                    <td style="padding-left: 30px;">A-GUIDANCE &amp; COUNSELLING</td>
                                    <td style="text-align:right">{{ $fees->misc_guidfee }}</td>
                                    </tr><tr>
                                    <td style="padding-left: 30px;">A-INFORMATION TECHNOLOGY FEE</td>
                                    <td style="text-align:right">{{ $fees->misc_ITfee }}</td>
                                    </tr>
                                    <tr>
                                    <td style="padding-left: 30px;">A-INST RES/STUDENT INFO SYS FEE</td>
                                    <td style="text-align:right">{{ $fees->misc_inst }}</td>
                                    </tr>
                                    <tr>
                                    <td style="padding-left: 30px;">A-LIBRARY</td>
                                    <td style="text-align:right">{{ $fees->misc_studIns }}</td>
                                    </tr>
                                    <tr>
                                    <td style="padding-left: 30px;">A-MEDICO DENTAL</td>
                                    <td style="text-align:right">{{ $fees->misc_medfee }}</td>
                                    </tr>
                                    <tr>
                                    <td style="padding-left: 30px;">A-REGISTRATION FEE-OLD</td>
                                    <td style="text-align:right">{{ $fees->regFee }}</td>
                                    </tr>
                                    <tr>
                                    <td style="font-size: 14px;color:blue;"><strong>TOTAL TUITION FEE</strong></td>
                                    <td style="text-align:right;font-size: 14px;color:blue;"><strong>
                                        {{  $totalTuition ?? $x}}
                                    </strong></td>
                                    </tr>
                                </tbody>
                        </table>
                </td>
                
            </table>
           
            <div class="d-flex flex-row">
                <!-- show next button if this is not the latest acadPeriod -->
                @if( App\Models\AcadPeriod::find( ($acadPeriod->id) -1) != null)
                <div class="p-2">
                    {!! Form::open(['method' => 'GET', 'route' => ['balance', 'id' => $student->person_id] ]) !!}
                        {!! Form::hidden('acadPeriod_id', $acadPeriod->id - 1) !!}
                        {{Form::submit('&larr; Prev',['class' => 'btn btn-link'])}}
                    {!! Form::close() !!}
                </div>
                @endif
                @if(!($acadPeriod->id == $student->StudentUpdateLatest->acadPeriod_id))
                    <div class="p-2"> 
                    {!! Form::open(['method' => 'GET', 'route' => ['balance', 'id' => $student->person_id] ]) !!}
                        {!! Form::hidden('acadPeriod_id', $acadPeriod->id + 1) !!}
                        {{Form::submit('Next &rarr;',['class' => 'btn btn-link'])}}
                    {!! Form::close() !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
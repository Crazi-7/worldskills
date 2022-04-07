@extends('app')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"> </script>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="events/index.html">Manage Events</a></li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>{insert event name}</span>
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="{{route('showEvent', ['id' => $event->id])}}">Overview</a></li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Reports</span>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item"><a class="nav-link active" href="reports/index.html">Room capacity</a></li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="border-bottom mb-3 pt-3 pb-2">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                    <h1 class="h2">{{$event->name}}</h1>
                </div>
                <span class="h6">{{$event->date}}</span>
            </div>

            <div class="mb-3 pt-3 pb-2">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                    <h2 class="h4">Room Capacity</h2>
                </div>
            </div>
            <canvas id="myChart"></canvas>
            <script>
                var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    
                    labels: {!!$sessionName!!},
                    datasets: [{
                        label: 'Attendees',
                        data: {!!$sesreg!!},
                        
                        backgroundColor: [
                            @foreach ($colors as $color)
                                @if ($color)
                                'rgba(255, 99, 132, 0.2)',
                                @else
                                'rgba(75, 192, 192, 0.2)',
                                @endif
                            @endforeach
                        ],
                        borderColor: [
                            @foreach ($colors as $color)
                                @if ($color)
                                'rgba(255, 99, 132, 1)',
                                @else
                                'rgba(75, 192, 192, 1)',
                                @endif
                            @endforeach
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Capacity',
                        data: {!!$capacity!!},
                        
                        backgroundColor: [
                            @foreach ($colors as $color)
                            'rgba(54, 162, 235, 0.2)',
                            @endforeach
                            
                        ],
                        borderColor: [
                            @foreach ($colors as $color)
                            'rgba(54, 162, 235, 1)',
                            @endforeach
                        ],
                        borderWidth: 1
                    }
                ]
                },
                options: {
                    
                    scales: {
                        xAxes: [{
                            
                        }],
                        yAxes: [{
                            
                        }]
                    }
                }
            });
            </script>
            

        </main>
    </div>
</div>

</body>
</html>

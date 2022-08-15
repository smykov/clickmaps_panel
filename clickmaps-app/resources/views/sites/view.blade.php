<!-- resources/views/sites/index.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap шаблон... -->
    <div class="panel-body p-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ url('sites/') }}">Сайты</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$site->name?>: Статистика</li>
            </ol>
        </nav>
        <h2 class="panel-heading">
            <?=$site->name?>: Статистика
        </h2>
        <!-- график распределения активности пользователя по часам  -->
        <h3 class="panel-heading">
            График распределения активности пользователя по часам
        </h3>
        <canvas id="lineChart"></canvas>
        @push('scripts')
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
            <script type="text/javascript">
                var url = "{{url('site/' . $site->id . '/chart/')}}";
                var Labels = [];
                var Data = [];
                $(document).ready(function () {
                    $.get(url, function (response) {
                        response.forEach(function (data) {
                            Labels.push(data.Labels);
                            Data.push(data.Data);
                        });

                        var ctxL = document.getElementById("lineChart").getContext('2d');
                        new Chart(ctxL, {
                            type: 'line',
                            data: {
                                labels: Labels,
                                datasets: [{
                                    label: "Clicks chart",
                                    data: Data,
                                    backgroundColor: [
                                        'rgba(105, 0, 132, .2)',
                                    ],
                                    borderColor: [
                                        'rgba(200, 99, 132, .7)',
                                    ],
                                    borderWidth: 2,
                                }
                                ]
                            },
                            options: {
                                responsive: true
                            }
                        });
                    });
                });
            </script>
    @endpush
@endsection

<x-layout>
    @include('partials._heroStatistics')
    <a href="/books" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back</a>
    <div style="height: 350px;">
    <canvas id="mostRequestedChart"></canvas>
    </div>
    <!-- Include charting library and script to generate the chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js" defer></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var mostRequestedData = @json($mostRequested);

            var labels = mostRequestedData.map(function(item) {
                return item.book.title;
            });

            var data = mostRequestedData.map(function(item) {
                return item.total;
            });

            var ctx = document.getElementById('mostRequestedChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Most Requested Books',
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Books'
                            },
                            maxBarThickness: 40
                        },
                        y: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Number of Requests'
                            },
                            beginAtZero: true,
                            maxTicksLimit: 7,
                        }
                    }
                }
            });
        });
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-wiget@0/build/assets/css/chat.min.css">
    <script>
        var botmanWidget ={
            aboutText: 'Read & Share',
            introMessage: "Hi! My name is Toby and I am your personal assistant. Feel free to ask me any questions about Read & Share App functionalities, or you can ask me for some book recommendations based on genre."
        };
    </script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
</x-layout>

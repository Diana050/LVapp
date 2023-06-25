<x-layout>
    @include('partials._heroStatistics')
    <a href="/books" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back</a>
    <div style="height: 350px;">
    <canvas id="bookCountChart"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var languages = @json($languages);
            var counts = @json($counts);

            var ctx = document.getElementById('bookCountChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: languages,
                    datasets: [{
                        label: 'Book Count by Language',
                        data: counts,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0,
                            maxTicksLimit: 7,
                            stepSize: 1
                        },
                        x: {
                            maxBarThickness: 40
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

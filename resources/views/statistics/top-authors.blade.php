<x-layout>
    @include('partials._heroStatistics')
    <a href="/books" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back</a>
    <div style="height: 350px;">
        <canvas id="top-authors-chart"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Fetch the data from the PHP variable
        var topAuthorsData = @json($topAuthors);

        // Prepare the chart labels and data
        var labels = topAuthorsData.map(author => author.author);
        var data = topAuthorsData.map(author => author.total_books);

        // Create the chart
        var ctx = document.getElementById('top-authors-chart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Top Authors',
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
                    y: {
                        beginAtZero: true,
                        maxTicksLimit: 7
                    },
                    x: {
                        maxBarThickness: 40
                    }
                }
            }
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

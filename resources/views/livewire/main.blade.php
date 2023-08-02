<div class="p-5">
    <h1>MMOL</h1>

    @isset($entries)

        <canvas class="w-full h-full" x-data="chart" />

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('chart', () => ({
                    entries: @js($entries),

                    init() {
                        const data = {
                            labels: this.entries.map(entry => entry.date),
                            datasets: [{
                                label: 'Glucoshizzle',
                                data: this.entries.map(entry => entry.sgvMmol),
                                fill: false,
                                borderColor: 'rgb(75, 192, 192)',
                                tension: 0.2
                            }]
                        };

                        new Chart(this.$el, {
                            type: 'line',
                            data,
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                    title: {
                                        display: true,
                                        text: 'Chart.js Line Chart'
                                    }
                                },
                                scales: {
                                    x: {
                                        type: 'time',
                                        time: {
                                            unit: 'minute'
                                        }
                                    }
                                }
                            },
                        });
                    }
                }))
            })
        </script>

    @else
        <h1>No entries...</h1>
    @endisset

</div>

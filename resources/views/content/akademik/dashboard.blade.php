<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Akademik</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <x-header></x-header>
        <x-sidebar></x-sidebar>
        <main class="p-16 md:ml-64 h-auto pt-20">
            <div class="text-3xl font-sans font-semibold text-gray-600 m-3">
                <h1>Dashboard</h1>
            </div>
            <div class="rounded shadow-2xl">
                <h2 class="flex text-gray-700 font-sans font-medium m-4 justify-center text-lg">Data Ruangan</h2>
                <div class="py-6" id="pie-chart-1"></div>
            </div>
        </main>
        <x-footerdosen></x-footerdosen>
    </div>
    
</body>
<script>
    const getChartOptions = (labels) => {
    return {
        series: labels.length === 2 ? [70, 30] : [14.2, 14.2, 14.2, 14.2, 14.2, 14.2, 14.2], // Example data
        colors: ["#9CA3AF", "#B63546", "#2B2B8B", "#2F8B76", "#53B635", "#E3A008", "#CE39BA"],
        chart: {
        height: 250,
        width: "100%", 
        type: "pie",
        },
        labels: labels,
        dataLabels: {
        enabled: true,
        style: {
            fontFamily: "Inter, sans-serif",
        },
        },
        legend: {
        position: "bottom",
        fontFamily: "Inter, sans-serif",
        },
    };
    };

    // Render chart in the first column
    if (document.getElementById("pie-chart-1")) {
        const chart1 = new ApexCharts(document.getElementById("pie-chart-1"), getChartOptions(["Informatika", "Matematika", "Statistika", "Bioteknologi","Biologi","Fisika","Kimia"]));
        chart1.render();
    }
</script>
</html>
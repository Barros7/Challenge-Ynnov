<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div style="width: 600px; margin: auto;">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            <br>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Qtd de Login</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <tr>
                            <th scope="col">1</th>
                            <th scope="col">José</th>
                            <th scope="col">jose@gmail.com</th>
                            <th scope="col">4</th>
                        </tr>
                        <tr>
                            <th scope="col">2</th>
                            <th scope="col">Jacob</th>
                            <th scope="col">jacob@gmail.com</th>
                            <th scope="col">7</th>
                        </tr>
                        <tr>
                            <th scope="col">3</th>
                            <th scope="col">Barros</th>
                            <th scope="col">barros@gmail.com</th>
                            <th scope="col">11</th>
                        </tr>
                        <tr>
                            <th scope="col">4</th>
                            <th scope="col">Bongo</th>
                            <th scope="col">bongo@gmail.com</th>
                            <th scope="col">18</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let dataServer = JSON.parse(`<?php echo $data ?>`);

        const data = {
             labels: dataServer['nameUser'],
             datasets: [{
                 label: 'Quantidade de login por utilizadores',
                 backgroundColor: 'blue',
                 data: dataServer['qtdLogin'],
            }]
        };
    
        const config = {
            type: 'bar',
            data: data,
            options: {}
        };
    
        new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</x-app-layout>

// Obtener los datos del PHP
var data = <?php echo json_encode($data); ?>;

// Crear un objeto para almacenar los valores por color
var valuesByColor = {
    green: [],
    yellow: [],
    red: []
};

// Recorrer los datos y agregarlos al objeto correspondiente
data.forEach(function(item) {
    if (item.calificaciones == 3) {
        valuesByColor.green.push({x: item.fecha, y: 3});
    } else if (item.calificaciones == 2) {
        valuesByColor.yellow.push({x: item.fecha, y: 2});
    } else {
        valuesByColor.red.push({x: item.fecha, y: 1});
    }
});

// Crear los arrays de valores y etiquetas para cada color
var greenValues = valuesByColor.green;
var yellowValues = valuesByColor.yellow;
var redValues = valuesByColor.red;

var labels = Object.keys(valuesByColor);

// Configurar el gráfico inicial
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Calificaciones de satisfacción',
            data: [greenValues.length, yellowValues.length, redValues.length],
            backgroundColor: [getBackgroundColor('green'), getBackgroundColor('yellow'), getBackgroundColor('red')],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            },
            x: {
                stacked: true
            }
        }
    }
});

// Función para obtener el color de fondo según el color seleccionado
function getBackgroundColor(color) {
    if (color === 'green') {
        return '#2ECC40'; // Verde
    } else if (color === 'yellow') {
        return '#FFDC00'; // Amarillo
    } else if (color === 'red') {
        return '#FF4136'; // Rojo
    }
}

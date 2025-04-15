let table = new DataTable('#example', {
    // dom: 'Bfrtip', // Configura el DOM para incluir los botones
    // buttons: [
    //     'copy', // Copiar al portapapeles
    //     'excel', // Exportar a Excel
    //     'pdf', // Exportar a PDF
    //     'print' // Imprimir
    // ],
    // responsive: true, // Habilitar el modo responsivo
    caption: 'Tabla de usuarios',
    language: {
        search: 'Buscar:',
        searchPlaceholder: 'Buscar...',
        lengthMenu: 'Mostrar _MENU_ entradas',
        info: 'Mostrando _START_ a _END_ de _TOTAL_ entradas',
        infoEmpty: 'No hay entradas disponibles',
        infoFiltered: '(filtrado de _MAX_ entradas totales)',
        paginate: {
            first: 'Primero',
            last: 'Último',
            next: 'Siguiente',
            previous: 'Anterior'
        },
        zeroRecords: 'No se encontraron resultados',
        emptyTable: 'No hay datos disponibles en la tabla'
    }, // Configuración de idioma para el español

    // lengthMenu: [5, 10, 15, 20, 25, 50, 100], // Opciones del menú de longitud

    // pageLength: 5, // Establecer la cantidad inicial a 5

    stateSave: true, // Habilitar el estado de guardado

    layout: {
        topStart: {
            pageLength: {
                menu: [5, 10, 15, 20, 25, 50, 100],
            }
        },
        top2Start: function () {
            let btn = document.createElement('button');
            btn.textContent = 'Agregar';
            btn.classList.add('btn', 'btn-primary', 'btn-sm', 'mb-2');
            btn.addEventListener('click', function () {
                alert('Agregando...');
            });
            return btn;
        },
        topEnd: 'search',
        bottomStart: 'info',
        bottomEnd: 'paging'
    }
});

$('#selectPosition').on('change', function () {
    table.search.fixed('position', $(this).val()).draw();
});
$('#selectOffice').on('change', function () {
    table.search.fixed('office', $(this).val()).draw();
});

table.ready(function () {
    // alert('La tabla está lista y funcionando.');
    // table.search.fixed('date', '2012-11-27').draw(); // Buscar registros con fecha igual a 2012-11-27
    // table.search.fixed('age', 25).draw(); // Buscar registros con edad igual a 25
});

let tableAPI = new DataTable('#myTableApi', {
    ajax: {
        url: 'https://jsonplaceholder.typicode.com/posts', // URL de la API
        dataSrc: function (data) {
            return data;
        }
    },
    columns: [
        {data: 'userId'},
        {data: 'id'},
        {data: 'title'},
        {data: 'body'}
    ],
    caption: 'Tabla de usuarios a traves de la API',
    language: {
        search: 'Buscar:',
        searchPlaceholder: 'Buscar...',
        lengthMenu: 'Mostrar _MENU_ entradas',
        info: 'Mostrando _START_ a _END_ de _TOTAL_ entradas',
        infoEmpty: 'No hay entradas disponibles',
        infoFiltered: '(filtrado de _MAX_ entradas totales)',
        zeroRecords: 'No se encontraron resultados',
        emptyTable: 'No hay datos disponibles en la tabla',
        buttons: {
            colvis: 'Visibilidad',
            colvisRestore: 'Restaurar visibilidad'
        }

    },
    stateSave: true, // Habilitar el estado de guardado
    layout: {
        topStart: {
            // buttons: ['pageLength'],// Configuración de botones para paginación
            pageLength: {
                menu: [5, 10, 15, 20, 25, 50, 100],
            }
        },
        top2End: {
            buttons: [
                // {
                //     extend: 'spacer',
                //     style: 'bar',
                //     text: 'Export files:'
                // },
                'copy',
                'csv',
                'excel',
                'pdf',
                'print',
                {
                    text: 'My button',
                    className: 'my-button', // Clase personalizada para el botón, se utiliza para aplicar estilos
                    key: {
                        shiftKey: true,
                        key: '2'
                    }, // Configuración de teclas de acceso rápido
                    action: function (e, dt, node, config) {
                        alert('Button activated');
                    },
                },
                {
                    extend: 'spacer',
                    style: 'bar',
                    text: ''
                },
                {
                    popoverTitle: 'Control de visibilidad',
                    extend: 'colvis',
                    collectionLayout: 'one-column',// Cantidad de columnas para mostrar (#-column)(one-column, two-column)
                    postfixButtons: ['colvisRestore'] // Botones de restauración de visibilidad
                } // Configuración de controles de visibilidad
            ]
        },
        top3End: {
            buttons: [
                {
                    extend: 'collection',
                    text: 'Actions',
                    buttons: [
                        'copy',
                        'csv',
                        'excel',
                        'pdf',
                        'print',
                        {
                            text: 'My button',
                            className: 'my-button', // Clase personalizada para el botón, se utiliza para aplicar estilos
                            key: {
                                shiftKey: true,
                                key: '2'
                            }, // Configuración de teclas de acceso rápido
                            action: function (e, dt, node, config) {
                                alert('Button activated');
                            },
                        },
                        {
                            popoverTitle: 'Control de visibilidad',
                            extend: 'colvis',
                            collectionLayout: 'two-column'
                        } // Configuración de controles de visibilidad
                    ]
                }
            ]

        },
        topEnd: 'search',
        bottomStart: 'info',
        bottomEnd: 'paging'
    }
});

// Inicializar el DataTable utulizando JavaScript
let tableAPI1 = new DataTable('#myTableAPI1', {
    columns: [
        {title: "ID", data: "id"},
        {title: "NOMBRE", data: "name"},
        {title: "EXTRENO", data: "air_date"},
        {title: "EPISODIO", data: "episode"},
        {title: "URL", data: "url"},
        // {title: "PERSONAJES", data: "characters"}
    ]
});

// Función para obtener datos de la API
function fetchEpisodes() {
    fetch('https://rickandmortyapi.com/api/episode')
        .then(response => response.json())
        .then(data => {
            // Extraer resultados
            let episodes = data.results.map(episode => ({
                id: episode.id,
                name: episode.name,
                air_date: episode.air_date,
                episode: episode.episode,
                url: episode.url,
                // characters: episode.characters.join(', ')
            }));

            // Limpiar la tabla y agregar los nuevos datos
            tableAPI1.clear().rows.add(episodes).draw();
        })
        .catch(error => console.error('Error fetching episodes:', error));
}

// Llamar a la función para obtener episodios
fetchEpisodes();


let tableRailway = new DataTable('#myTableRailway', {
    ajax: {
        url: '../backend/index.php', // URL de la API
        dataSrc: function (data) {
            return data;
        }
    },
    columns: [
        {data: 'id'},
        {data: 'description'},
        {data: 'stock'},
        {data: 'price'},
    ],
});

new DataTable('#myTableFixedColumns', {
    fixedColumns: {
        start: 3
    },
    scrollCollapse: true,
    scrollX: true
});
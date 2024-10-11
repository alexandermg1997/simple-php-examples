document.addEventListener('DOMContentLoaded', () => {
    const themeToggle = document.getElementById('theme-toggle');
    const moonIcon = document.getElementById('moon-icon');
    const sunIcon = document.getElementById('sun-icon');
    const backToTopButton = document.getElementById('back-to-top');
    const filterButtons = document.querySelectorAll('[data-filter]');
    const galleryItems = document.querySelectorAll('.image-item');
    const navbarToggler = document.querySelector('.navbar-toggler');
    const mainContent = document.querySelector('.main-content');
    const navbar = document.querySelector('.navbar');


    themeToggle.addEventListener('click', () => {
        // Alternar el tema
        const currentTheme = document.documentElement.getAttribute('data-bs-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        document.documentElement.setAttribute('data-bs-theme', newTheme);

        // Alternar iconos
        moonIcon.classList.toggle('d-none'); // Oculta o muestra la luna
        sunIcon.classList.toggle('d-none'); // Oculta o muestra el sol
    });

    // Mostrar/Ocultar el botón "Volver arriba"
    window.onscroll = function () {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            backToTopButton.style.display = "block";
            themeToggle.style.display = "none";
        } else {
            backToTopButton.style.display = "none";
            themeToggle.style.display = "block";
        }
    };

    // Al hacer clic en el botón, desplazar suavemente hacia arriba
    backToTopButton.addEventListener('click', function () {
        const scrollDuration = 1500; // Duración en milisegundos (1.5 segundos)
        const start = window.scrollY;
        const startTime = performance.now();

        function scrollToTop(currentTime) {
            const elapsedTime = currentTime - startTime;
            const progress = Math.min(elapsedTime / scrollDuration, 1); // Normaliza el progreso

            // Easing (opcional)
            const easing = Math.sin(progress * (Math.PI / 2)); // Easing suave
            window.scrollTo(0, start * (1 - easing)); // Desplazamiento

            if (progress < 1) {
                requestAnimationFrame(scrollToTop); // Continuar la animación
            }
        }

        requestAnimationFrame(scrollToTop); // Iniciar la animación
    });

    // Nueva funcionalidad: Filtrado de imágenes
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const filter = button.getAttribute('data-filter');

            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            galleryItems.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });

    navbarToggler.addEventListener('click', function () {
        const isCollapsed = navbarToggler.classList.contains('collapsed'); // Verifica si está colapsado

        if (isCollapsed) {
            mainContent.style.marginTop = '10px'; // Ajusta el espacio al valor original al colapsar
        } else {
            mainContent.style.marginTop = '100px'; // Ajusta el margen al desplegar
        }
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const themeToggle = document.getElementById('theme-toggle');
    const moonIcon = document.getElementById('moon-icon');
    const sunIcon = document.getElementById('sun-icon');
    const backToTopButton = document.getElementById('back-to-top');
    const filterButtons = document.querySelectorAll('[data-filter]');
    const galleryItems = document.querySelectorAll('.image-item');
    const navbarToggler = document.querySelector('.navbar-toggler');
    const mainContent = document.querySelector('.main-content');

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
        const scrollDuration = 500; // Duración en milisegundos (1.5 segundos)
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
    const gallery = document.getElementById('gallery'); // Definir el contenedor de la galería

    // Guardar la altura original del contenedor antes de ocultar las imágenes
    const originalHeight = gallery.offsetHeight;

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const filter = button.getAttribute('data-filter');
            const visibleItems = Array.from(galleryItems).filter(item => filter === 'all' || item.getAttribute('data-category') === filter);

            // Activar el botón seleccionado y desactivar los demás
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            // Ocultar todas las imágenes primero con una transición suave
            galleryItems.forEach(item => {
                item.classList.add('hidden');
                setTimeout(() => {
                    item.style.display = 'none';
                }, 500); // Asegurar que todas se oculten antes de mostrar las nuevas
            });

            // Ajustar la altura del contenedor al inicio para evitar el salto de contenido
            if (visibleItems.length > 0) {
                gallery.style.height = `${originalHeight}px`; // Fijar la altura si hay imágenes para mostrar
            }

            // Mostrar las imágenes correspondientes después de que todas las imágenes se oculten
            setTimeout(() => {
                let totalVisible = 0; // Contar cuántos elementos se muestran

                visibleItems.forEach((item, index) => {
                    setTimeout(() => {
                        item.style.display = 'block'; // Asegurar que esté visible antes de animar
                        item.classList.remove('hidden');
                        item.classList.add('showing');
                        totalVisible++; // Contamos cuántos elementos se muestran
                        setTimeout(() => {
                            item.classList.remove('showing'); // Finaliza la animación de aparición
                        }, 600); // Tiempo para completar la animación
                    }, index * 150); // Retraso en base al índice para un efecto secuencial
                });

                // Ajustar la altura del contenedor al final de la carga
                setTimeout(() => {
                    if (totalVisible === 0) {
                        // Si no hay imágenes visibles, colapsamos el contenedor
                        gallery.style.height = 'auto';
                    } else {
                        // Si hay imágenes visibles, quitar la altura fija para permitir la transición normal
                        gallery.style.height = ''; // Restablecer a su altura natural
                    }
                }, visibleItems.length * 150 + 600); // Tiempo suficiente para que aparezcan todas
            }, 500); // Esperar a que todas las imágenes se oculten completamente
        });
    });



    // Aumente el espacio al desplegar el menú de navegación
    navbarToggler.addEventListener('click', function () {
        const isCollapsed = navbarToggler.classList.contains('collapsed'); // Verifica si está colapsado

        if (isCollapsed) {
            mainContent.style.marginTop = '10px'; // Ajusta el espacio al valor original al colapsar
        } else {
            mainContent.style.marginTop = '100px'; // Ajusta el margen al desplegar
        }
    });
});

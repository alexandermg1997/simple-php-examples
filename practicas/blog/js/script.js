document.addEventListener('DOMContentLoaded', () => {
    const scrollContent = document.getElementById('scrollContent');
    const scrollbarThumb = document.getElementById('scrollbarThumb');
    const backToTopButton = document.getElementById('back-to-top');
    const scrollToBottomButton = document.getElementById('scroll-to-bottom');
    const customScrollbar = document.querySelector('.custom-scrollbar');
    let isDragging = false;
    let startY;

    // Detector de proximidad del mouse
    document.addEventListener('mousemove', function (e) {
        const mouseX = e.clientX;
        const windowWidth = window.innerWidth;
        const hoverZone = 30; // Distancia en píxeles desde el borde derecho

        if (windowWidth - mouseX <= hoverZone || isDragging) {
            customScrollbar.style.opacity = '1';
        } else {
            customScrollbar.style.opacity = '0';
        }
    });

    // Resto del código del scrollbar...
    function updateThumbPosition() {
        const scrollPercentage = scrollContent.scrollTop /
            (scrollContent.scrollHeight - scrollContent.clientHeight);
        const thumbPosition = scrollPercentage *
            (scrollContent.clientHeight - scrollbarThumb.offsetHeight);
        scrollbarThumb.style.top = `${thumbPosition}px`;
    }

    function initThumbSize() {
        const scrollRatio = scrollContent.clientHeight / scrollContent.scrollHeight;
        const thumbHeight = Math.max(scrollRatio * 100, 10);
        scrollbarThumb.style.height = `${thumbHeight}%`;
    }

    scrollbarThumb.addEventListener('mousedown', function (e) {
        isDragging = true;
        startY = e.clientY - scrollbarThumb.offsetTop;
        scrollbarThumb.classList.add('active');
        document.body.style.userSelect = 'none';
        e.preventDefault();
    });

    document.addEventListener('mousemove', function (e) {
        if (!isDragging) return;

        const y = e.clientY - startY;
        const maxTop = scrollContent.clientHeight - scrollbarThumb.offsetHeight;
        const boundedY = Math.max(0, Math.min(y, maxTop));
        const scrollRatio = boundedY / maxTop;

        scrollContent.scrollTop = scrollRatio *
            (scrollContent.scrollHeight - scrollContent.clientHeight);
    });

    document.addEventListener('mouseup', function () {
        if (isDragging) {
            isDragging = false;
            scrollbarThumb.classList.remove('active');
            document.body.style.userSelect = '';
        }
    });

    scrollContent.addEventListener('scroll', updateThumbPosition);

    const resizeObserver = new ResizeObserver(() => {
        initThumbSize();
        updateThumbPosition();
    });

    resizeObserver.observe(scrollContent);

    initThumbSize();
    updateThumbPosition();

    window.addEventListener('resize', function () {
        initThumbSize();
        updateThumbPosition();
    });

    // Función para animar el scroll
    function smoothScroll(element, target, duration) {
        const start = element.scrollTop;
        const distance = target - start;
        const startTime = performance.now();

        function animation(currentTime) {
            const elapsedTime = currentTime - startTime;
            const progress = Math.min(elapsedTime / duration, 1);

            // Easing suave
            const easing = Math.sin(progress * (Math.PI / 2));
            element.scrollTop = start + (distance * easing);

            if (progress < 1) {
                requestAnimationFrame(animation);
            }
        }

        requestAnimationFrame(animation);
    }

    // Actualizar visibilidad de los botones
    scrollContent.addEventListener('scroll', function () {
        const isNearTop = scrollContent.scrollTop > 100;
        const isNearBottom = scrollContent.scrollHeight - scrollContent.scrollTop - scrollContent.clientHeight < 100;

        // Mostrar/ocultar botón de subir
        backToTopButton.style.display = isNearTop ? "flex" : "none";

        // Mostrar/ocultar botón de bajar
        scrollToBottomButton.style.display = !isNearBottom ? "flex" : "none";

    });

    // Click en botón de subir
    backToTopButton.addEventListener('click', function () {
        smoothScroll(scrollContent, 0, 500);
    });

    // Click en botón de bajar
    scrollToBottomButton.addEventListener('click', function () {
        const bottomPosition = scrollContent.scrollHeight - scrollContent.clientHeight;
        smoothScroll(scrollContent, bottomPosition, 500);
    });

    // Disparar el evento scroll inicialmente para establecer el estado correcto de los botones
    scrollContent.dispatchEvent(new Event('scroll'));
});
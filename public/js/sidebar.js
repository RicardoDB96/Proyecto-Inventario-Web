    // Verifica el 'localStorage' al cargar la página
    document.addEventListener("DOMContentLoaded", function() {
        var estadoGuardado = localStorage.getItem("elementState");
        var elemento = document.getElementById("barside");

        // Aplica el estilo inicial al elemento basado en el 'localStorage'
        if (estadoGuardado === "visible") {
        elemento.style.display = "flex";
        } else {
        elemento.style.display = "none";
        }
    });

    // Agrega un event listener al botón para mostrar u ocultar el elemento y guarda el estado en 'localStorage'
    document.getElementById("showHide").addEventListener("click", function() {
        var elemento = document.getElementById("barside");
        if (elemento.style.display === "none") {
        elemento.style.display = "flex";
        // Guarda el estado en 'localStorage'
        localStorage.setItem("elementState", "visible");
        } else {
        elemento.style.display = "none";
        // Remueve el estado de 'localStorage'
        localStorage.removeItem("elementState");
        }
    });

document.addEventListener("DOMContentLoaded", () => {
  const tabs = document.querySelectorAll(".mc-tab");
  const contents = document.querySelectorAll(".mc-seccion");

  // Asegurarse de que el primer tab está activo al cargar
  if (tabs.length > 0 && contents.length > 0) {
    // En caso de que se haya quitado el 'active' y 'visible' del HTML
    // tabs[0].classList.add("active");
    // contents[0].classList.add("visible");
  }

  tabs.forEach(tab => {
    tab.addEventListener("click", () => {
      const tabId = tab.getAttribute("data-tab");

      // Quitar clases activas previas
      tabs.forEach(t => t.classList.remove("active"));
      contents.forEach(c => c.classList.remove("visible"));

      // Activar la pestaña clicada
      tab.classList.add("active");

      // Activar el contenido correspondiente
      const target = document.getElementById(tabId);
      if (target) {
        target.classList.add("visible");
      }
    });
  });
});
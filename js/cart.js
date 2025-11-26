const faqItems = document.querySelectorAll(".faq-item");

faqItems.forEach(item => {
    const question = item.querySelector(".faq-question");
    const answer = item.querySelector(".faq-answer");

    question.addEventListener("click", () => {

        // Cierra todos los demás
        faqItems.forEach(i => {
            if (i !== item) {
                i.classList.remove("active");
                i.querySelector(".faq-answer").style.maxHeight = null;
            }
        });

        // Alterna el actual
        const isOpen = item.classList.contains("active");

        if (isOpen) {
            item.classList.remove("active");
            answer.style.maxHeight = null;
        } else {
            item.classList.add("active");
            answer.style.maxHeight = answer.scrollHeight + "px";
        }
    });
});

// ===================== SELECCIÓN DE EDICIONES =====================

const editionCards = document.querySelectorAll(".select-edition");

editionCards.forEach(card => {
    card.addEventListener("click", () => {

        // Quitar selección previa
        editionCards.forEach(c => c.classList.remove("selected"));

        // Seleccionar esta
        card.classList.add("selected");
    });
});

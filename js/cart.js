const faqItems = document.querySelectorAll(".faq-item");

faqItems.forEach(item => {
    const question = item.querySelector(".faq-question");
    const answer = item.querySelector(".faq-answer");

    question.addEventListener("click", () => {

        faqItems.forEach(i => {
            if (i !== item) {
                i.classList.remove("active");
                i.querySelector(".faq-answer").style.maxHeight = null;
            }
        });

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


const editionCards = document.querySelectorAll(".select-edition");
const inputProducto = document.getElementById("productoSeleccionado");

const heroImg = document.querySelector(".hero-img img");

const imgDeluxe = "https://www.minecraft.net/content/dam/minecraftnet/games/minecraft/key-art/PDP-Hero_OV-Deluxe_16x9.jpg";

const imgStandard = "https://www.minecraft.net/content/dam/minecraftnet/games/minecraft/key-art/PDP-Hero_OV-Standard_16x9.jpg";

inputProducto.value = "Deluxe PC Collection";
heroImg.src = imgDeluxe;

editionCards.forEach(card => {
    card.addEventListener("click", () => {

        editionCards.forEach(c => {
            c.classList.remove("selected");

            const icon = c.querySelector(".price-icon");
            icon.classList.remove("bi-circle-fill");
            icon.classList.add("bi-circle");
        });

        card.classList.add("selected");

        const selectedIcon = card.querySelector(".price-icon");
        selectedIcon.classList.remove("bi-circle");
        selectedIcon.classList.add("bi-circle-fill");

        const product = card.dataset.product;

        if (product === "Deluxe PC Collection") {
            heroImg.src = imgDeluxe;
        } else if (product === "Standard PC Edition") {
            heroImg.src = imgStandard;
        }

        inputProducto.value = product;
    });
});

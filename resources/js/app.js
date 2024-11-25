import './bootstrap';
import 'flowbite';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// Select the button and modal elements
const modalToggleButtons = document.querySelectorAll("[data-modal-toggle]");
const body = document.body;

modalToggleButtons.forEach(button => {
    button.addEventListener("click", () => {
        if (body.classList.contains("modal-open")) {
            // Remove class and padding when modal closes
            body.classList.remove("modal-open");
            body.style.paddingRight = "";
        } else {
            // Add class and padding when modal opens
            body.classList.add("modal-open");
            const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
            body.style.paddingRight = `${scrollbarWidth}px`;
        }
    });
});


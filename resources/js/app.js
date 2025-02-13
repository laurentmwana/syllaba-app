import Turbolinks from 'turbolinks';
import './bootstrap';
import Alpine from 'alpinejs';
import { animate } from "motion"

window.Alpine = Alpine;

Alpine.start();

if (Turbolinks.supported) {
    Turbolinks.start()
    Turbolinks.clearCache()
}

const createDataLabelForTable = () => {
    document.querySelectorAll(".custom-response-table").forEach((table) => {
        const labels = Array.from(table.querySelectorAll("th")).map(th => th.innerText);
        table.querySelectorAll("td").forEach((td, index) => {
            td.setAttribute("data-label", labels[index % labels.length]);
        });
    });
}

document.addEventListener("DOMContentLoaded",  () => {
    createDataLabelForTable();
});
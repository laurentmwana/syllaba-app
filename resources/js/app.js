import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


document.addEventListener("DOMContentLoaded", function () {
    function setDataLabels() {
        document.querySelectorAll(".custom-response-table").forEach((table) => {
            const labels = Array.from(table.querySelectorAll("th")).map(th => th.innerText);
            
            table.querySelectorAll("td").forEach((td, index) => {
                td.setAttribute("data-label", labels[index % labels.length]);
            });
        });
    }
    setDataLabels();
});
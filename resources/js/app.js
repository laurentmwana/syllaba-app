import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


const preaload = () => {
    const preloader = document.querySelector('#preloader')
    if (preloader) {
        document.body.classList.add('overflow-hidden')

        preloader.remove()
        document.body.classList.remove('overflow-hidden')
    }
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


window.addEventListener('load', () => {
    preaload()
})
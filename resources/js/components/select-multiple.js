class SelectMultiple {
    constructor(container, options, placeholder = "Sélectionnez les options...", onChange = () => {}, isPending = false) {
        this.container = container;
        this.options = options;
        this.placeholder = placeholder;
        this.onChange = onChange;
        this.isPending = isPending;
        this.isOpen = false;
        this.selectedOptions = [];
        this.searchTerm = "";

        this.render();
        this.addEventListeners();
    }

    render() {
        this.container.innerHTML = `
            <div class="select-wrapper">
                <div class="select-button ${this.isPending ? 'is-pending' : ''}">
                    ${this.isPending ? this.renderLoader() : ''}
                    ${this.selectedOptions.length === 0 ?
                        `<div class="placeholder">${this.placeholder}</div>` :
                        this.selectedOptions.map(option => this.renderSelectedOption(option)).join('')
                    }
                    <i data-lucide="chevron-down" class="ml-auto"></i>
                </div>
                ${this.isOpen && !this.isPending ? this.renderDropdown() : ''}
            </div>
        `;
        lucide.createIcons();
    }

    renderLoader() {
        return '<i data-lucide="loader-2" class="loader"></i>';
    }

    renderSelectedOption(option) {
        return `
            <div class="selected-option" data-value="${option.value}">
                <span>${option.label}</span>
                <i data-lucide="x" class="remove-option" size="14"></i>
            </div>
        `;
    }

    renderDropdown() {
        const filteredOptions = this.options.filter(option =>
            option && option.label.toLowerCase().includes(this.searchTerm.toLowerCase())
        );

        return `
            <div class="dropdown">
                <input class="search-input" type="text" placeholder="Recherche..." value="${this.searchTerm}">
                <div class="separator"></div>
                <ul class="options-list">
                    ${filteredOptions.map(option => `
                        <li class="option ${this.selectedOptions.some(item => item.value === option.value) ? 'selected' : ''}" data-value="${option.value}">
                            ${option.label}
                        </li>
                    `).join('')}
                </ul>
            </div>
        `;
    }

    addEventListeners() {
        document.addEventListener('click', this.handleOutsideClick.bind(this));
        this.container.addEventListener('click', this.handleClick.bind(this));
    }

    handleOutsideClick(event) {
        if (!this.container.contains(event.target)) {
            this.isOpen = false;
            this.render();
        }
    }

    handleClick(event) {
        if (this.isPending) return;

        if (event.target.closest('.select-button')) {
            this.toggleDropdown();
        } else if (event.target.closest('.remove-option')) {
            const optionElement = event.target.closest('.selected-option');
            const optionValue = optionElement.dataset.value;
            this.removeOption(optionValue);
        } else if (event.target.closest('.option')) {
            const optionValue = event.target.closest('.option').dataset.value;
            this.toggleOption(optionValue);
        } else if (event.target.matches('.search-input')) {
            event.target.addEventListener('input', this.handleSearch.bind(this));
        }
    }

    toggleDropdown() {
        this.isOpen = !this.isOpen;
        this.render();
    }

    removeOption(value) {
        this.selectedOptions = this.selectedOptions.filter(option => option.value !== value);
        this.onChange(this.selectedOptions.map(option => option.value));
        this.render();
    }

    toggleOption(value) {
        const option = this.options.find(option => option.value === value);
        if (!option) return;

        const index = this.selectedOptions.findIndex(item => item.value === value);
        if (index === -1) {
            this.selectedOptions.push(option);
        } else {
            this.selectedOptions.splice(index, 1);
        }

        this.onChange(this.selectedOptions.map(option => option.value));
        this.render();
    }

    handleSearch(event) {
        this.searchTerm = event.target.value;
        this.render();
    }

    setIsPending(isPending) {
        this.isPending = isPending;
        this.render();
    }
}

// Usage
const container = document.getElementById('multiple-select-container');
const options = [
    { value: 'option1', label: 'Option 1' },
    { value: 'option2', label: 'Option 2' },
    { value: 'option3', label: 'Option 3' },
];

const multipleSelect = new SelectMultiple(container, options, "Sélectionnez les options...", (selectedValues) => {
    console.log('Selected values:', selectedValues);
});

// Example of how to set the component to pending state
// setTimeout(() => {
//     multiple

class SelectSingle {
    constructor(container, options, placeholder = "Sélectionnez une option...") {
      this.container = container
      this.options = options
      this.placeholder = placeholder
      this.isOpen = false
      this.selectedOption = null
      this.searchTerm = ""

      this.render()
      this.addEventListeners()
    }

    render() {
      this.container.innerHTML = `
              <div class="select-wrapper">
                  <div class="select-button">
                      ${this.selectedOption ? this.renderSelectedOption() : `<div class="placeholder">${this.placeholder}</div>`}
                      <i data-lucide="chevron-down" class="ml-auto"></i>
                  </div>
                  ${this.isOpen ? this.renderDropdown() : ""}
              </div>
          `
      lucide.createIcons()
    }

    renderSelectedOption() {
      return `
              <div class="selected-option">
                  <span>${this.selectedOption.label}</span>
                  <i data-lucide="x" class="remove-option" size="14"></i>
              </div>
          `
    }

    renderDropdown() {
      const filteredOptions = this.options.filter((option) =>
        option.label.toLowerCase().includes(this.searchTerm.toLowerCase()),
      )

      return `
              <div class="dropdown">
                  <input class="search-input" type="text" placeholder="Recherche..." value="${this.searchTerm}">
                  <div class="separator"></div>
                  <ul class="options-list">
                      ${filteredOptions
                        .map(
                          (option) => `
                          <li class="option ${this.selectedOption && this.selectedOption.value === option.value ? "selected" : ""}" data-value="${option.value}">
                              ${option.label}
                          </li>
                      `,
                        )
                        .join("")}
                  </ul>
              </div>
          `
    }

    addEventListeners() {
      document.addEventListener("click", this.handleOutsideClick.bind(this))
      this.container.addEventListener("click", this.handleClick.bind(this))
    }

    handleOutsideClick(event) {
      if (!this.container.contains(event.target)) {
        this.isOpen = false
        this.render()
      }
    }

    handleClick(event) {
      if (event.target.closest(".select-button")) {
        this.toggleDropdown()
      } else if (event.target.closest(".remove-option")) {
        this.removeOption()
      } else if (event.target.closest(".option")) {
        this.selectOption(event.target.closest(".option").dataset.value)
      } else if (event.target.matches(".search-input")) {
        event.target.addEventListener("input", this.handleSearch.bind(this))
      }
    }

    toggleDropdown() {
      this.isOpen = !this.isOpen
      this.render()
    }

    removeOption() {
      this.selectedOption = null
      this.onChange()
    }

    selectOption(value) {
      this.selectedOption = this.options.find((option) => option.value === value)
      this.isOpen = false
      this.onChange()
    }

    handleSearch(event) {
      this.searchTerm = event.target.value
      this.render()
    }

    onChange() {
      // You can implement any onChange logic here
      console.log("Selected option:", this.selectedOption)
      this.render()
    }
  }

  // Usage
  const container = document.getElementById("select-container")
  const options = [
    { value: "option1", label: "Option 1" },
    { value: "option2", label: "Option 2" },
    { value: "option3", label: "Option 3" },
  ]

  new SelectSingle(container, options)


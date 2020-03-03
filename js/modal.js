class Modal {

    constructor() {
        this.showModal = this.showModal.bind(this)
        this.hideModal = this.hideModal.bind(this)

        this.display_modal_btn = document.getElementById("show-modal");
        this.modal = document.querySelector(".modal");
        this.display_modal_btn.addEventListener('click', this.showModal);
        this.modal.addEventListener('click', this.hideModal)
        window.addEventListener('keyup', (ev) => {
            if (ev.key === "Escape") this.hideModal({ target: this.modal });
        })
    }

    showModal() {
        this.modal.style.display = 'flex';
        setTimeout(() => { this.modal.style.opacity = 1 }, 10);
    }

    hideModal(event) {
        if (event.target !== this.modal) return;

        const tmp = () => {
            this.modal.style.display = 'none'
            this.modal.removeEventListener('transitionend', tmp)

        }

        this.modal.addEventListener('transitionend', tmp)

        this.modal.style.opacity = 0;
    }
}

new Modal();
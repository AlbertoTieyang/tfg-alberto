import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

document.addEventListener('click', async (event) => {
    const button = event.target.closest('.js-generate-description');

    if (!button) {
        return;
    }

    const form = button.closest('form');
    const nameInput = form?.querySelector('[name="name"]');
    const descriptionInput = form?.querySelector('[name="description"]');
    const tokenInput = form?.querySelector('[name="_token"]');
    const dishName = nameInput?.value.trim();

    if (!dishName) {
        alert('Introduce el nombre del plato.');
        nameInput?.focus();
        return;
    }

    const originalText = button.textContent;
    button.disabled = true;
    button.textContent = 'Generando...';

    try {
        const response = await fetch(button.dataset.url, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': tokenInput?.value ?? '',
            },
            body: JSON.stringify({ name: dishName }),
        });

        const data = await response.json();

        if (!response.ok) {
            throw new Error(data.message ?? 'No se pudo generar la descripcion.');
        }

        descriptionInput.value = data.description;
    } catch (error) {
        alert(error.message);
    } finally {
        button.disabled = false;
        button.textContent = originalText;
    }
});

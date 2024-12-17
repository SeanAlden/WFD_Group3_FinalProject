import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", () => {
    const html = document.documentElement;
    const theme = localStorage.getItem("theme") || "light";
    const themeToggleBtn = document.getElementById("themeToggleBtn");
    const themeIcon = document.getElementById("themeIcon");

    // Set initial theme and icon
    html.classList.toggle("dark", theme === "dark");
    themeIcon.className = theme === "dark" ? "fas fa-sun" : "fas fa-moon";

    // Toggle theme function
    window.toggleTheme = function () {
        const isDark = html.classList.toggle("dark");
        localStorage.setItem("theme", isDark ? "dark" : "light");
        themeIcon.className = isDark ? "fas fa-sun" : "fas fa-moon";
    };

    showAddProductModal();
    hideAddProductModal();
    editProduct();
    hideEditProductModal();
    showDeleteConfirmModal();
    closeDeleteConfirmModal();
    previewImage();
});

function showAddProductModal() {
    document.getElementById('addProductModal').classList.remove('hidden');
}

function hideAddProductModal() {
    document.getElementById('addProductModal').classList.add('hidden');
}

function editProduct(product) {
    document.getElementById('editProductForm').action = `/products/${product.id}`;
    // document.getElementById('editProductImage').value = product.photo;
    document.getElementById('editProductName').value = product.product_name;
    document.getElementById('editProductDesc').value = product.description;
    document.getElementById('editBrand').value = product.brand;
    document.getElementById('editCPU').value = product.cpu;
    document.getElementById('editGPU').value = product.gpu;
    document.getElementById('editMemory').value = product.memory;
    document.getElementById('editStorage').value = product.storage;
    document.getElementById('editStock').value = product.stock;
    document.getElementById('editPrice').value = product.price;
    document.getElementById('editCategoryId').value = product.category_id;
    document.getElementById('editProductModal').classList.remove('hidden');
}

function hideEditProductModal() {
    document.getElementById('editProductModal').classList.add('hidden');
}

// Show Delete Confirm Modal
function showDeleteConfirmModal(productId) {
    const deleteForm = document.getElementById('deleteProductForm');
    deleteForm.action = `/products/${productId}`;
    document.getElementById('deleteConfirmModal').classList.remove('hidden');
}

// Close Delete Confirm Modal
function closeDeleteConfirmModal() {
    document.getElementById('deleteConfirmModal').classList.add('hidden');
}

function previewImage(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function(e) {
            document.querySelector('.avatar-preview img').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

<?php include __DIR__ . '/../layout.php'; ?>

<div class="row g-4">
    <!-- Product Grid -->
    <div class="col-lg-7">
        <div class="admin-card">
            <div class="card-header">
                <div class="d-flex gap-2 align-items-center">
                    <i class="fas fa-box me-1"></i>Products
                    <input type="text" id="posSearch" class="form-control form-control-sm ms-auto" style="max-width:200px;" placeholder="Search...">
                </div>
            </div>
            <div class="p-3">
                <div class="row g-2" id="productGrid">
                    <?php foreach ($products as $p): ?>
                        <div class="col-lg-4 col-md-4 col-6 product-item" data-name="<?= strtolower(htmlspecialchars($p['name'])) ?>">
                            <div class="card h-100 product-card-pos" style="cursor:pointer;transition:all 0.2s;"
                                 onclick="addToCart(<?= $p['id'] ?>, '<?= addslashes($p['name']) ?>', <?= $p['price'] ?>, <?= $p['stock_quantity'] ?>)"
                                 onmouseover="this.style.borderColor='var(--accent)'"
                                 onmouseout="this.style.borderColor='#dee2e6'">
                                <?php if ($p['primary_image']): ?>
                                    <img src="../../../<?= htmlspecialchars($p['primary_image']) ?>" style="height:80px;object-fit:cover;">
                                <?php else: ?>
                                    <div class="d-flex align-items-center justify-content-center bg-light" style="height:80px;">
                                        <i class="fas fa-box text-muted"></i>
                                    </div>
                                <?php endif; ?>
                                <div class="card-body p-2">
                                    <p class="mb-0 small fw-semibold"><?= htmlspecialchars($p['name']) ?></p>
                                    <p class="mb-0 small" style="color:var(--primary);">KES <?= number_format($p['price'], 0) ?></p>
                                    <p class="mb-0 text-muted" style="font-size:0.7rem;">Stock: <?= $p['stock_quantity'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- POS Cart -->
    <div class="col-lg-5">
        <div class="admin-card sticky-top" style="top:80px;">
            <div class="card-header d-flex justify-content-between">
                <span><i class="fas fa-cash-register me-2"></i>Current Sale</span>
                <button class="btn btn-sm btn-outline-light" onclick="clearCart()">Clear</button>
            </div>
            <div class="p-3">
                <div id="cartItems" style="min-height:200px;max-height:300px;overflow-y:auto;">
                    <p class="text-muted text-center py-4" id="emptyMsg">Click products to add them</p>
                </div>
                <hr>
                <div class="d-flex justify-content-between fw-bold fs-5 mb-3">
                    <span>Total:</span>
                    <span style="color:var(--primary);" id="cartTotal">KES 0.00</span>
                </div>

                <form method="POST" action="../../shop/admin/index.php?page=pos-complete" id="posForm">
                    <input type="hidden" name="items" id="itemsInput">
                    <div class="mb-2">
                        <input type="text" name="customer_name" class="form-control form-control-sm" placeholder="Customer name (optional)">
                    </div>
                    <div class="mb-2">
                        <input type="email" name="customer_email" class="form-control form-control-sm" placeholder="Customer email (optional)">
                    </div>
                    <div class="mb-3">
                        <select name="payment_method" class="form-select form-select-sm">
                            <option value="cash">Cash</option>
                            <option value="mpesa">M-Pesa</option>
                            <option value="card">Card</option>
                        </select>
                    </div>
                    <button type="submit" class="btn w-100 fw-bold" style="background:var(--primary);color:#fff;" id="completeBtn" disabled>
                        <i class="fas fa-check-circle me-2"></i>Complete Sale & Print Receipt
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
let cart = {};

function addToCart(id, name, price, stock) {
    if (cart[id]) {
        if (cart[id].qty >= stock) { alert('Maximum stock reached for ' + name); return; }
        cart[id].qty++;
    } else {
        cart[id] = { id, name, price, qty: 1, stock };
    }
    renderCart();
}

function updateQty(id, delta) {
    if (!cart[id]) return;
    cart[id].qty += delta;
    if (cart[id].qty <= 0) delete cart[id];
    renderCart();
}

function clearCart() { cart = {}; renderCart(); }

function renderCart() {
    const container = document.getElementById('cartItems');
    const emptyMsg  = document.getElementById('emptyMsg');
    const items     = Object.values(cart);

    if (items.length === 0) {
        container.innerHTML = '<p class="text-muted text-center py-4">Click products to add them</p>';
        document.getElementById('cartTotal').textContent = 'KES 0.00';
        document.getElementById('completeBtn').disabled = true;
        document.getElementById('itemsInput').value = '[]';
        return;
    }

    let total = 0;
    let html  = '';
    items.forEach(item => {
        const lineTotal = item.price * item.qty;
        total += lineTotal;
        html += `<div class="d-flex align-items-center justify-content-between mb-2 p-2 bg-light rounded">
            <div>
                <div class="fw-semibold small">${item.name}</div>
                <div class="text-muted" style="font-size:0.75rem;">KES ${item.price.toFixed(2)} × ${item.qty}</div>
            </div>
            <div class="d-flex align-items-center gap-1">
                <button class="btn btn-sm btn-outline-secondary" onclick="updateQty(${item.id}, -1)">-</button>
                <span class="fw-bold">${item.qty}</span>
                <button class="btn btn-sm btn-outline-secondary" onclick="updateQty(${item.id}, 1)">+</button>
                <span class="fw-semibold ms-2" style="min-width:80px;text-align:right;">KES ${lineTotal.toFixed(2)}</span>
            </div>
        </div>`;
    });

    container.innerHTML = html;
    document.getElementById('cartTotal').textContent = 'KES ' + total.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    document.getElementById('completeBtn').disabled = false;
    document.getElementById('itemsInput').value = JSON.stringify(items.map(i => ({ id: i.id, qty: i.qty })));
}

// Search filter
document.getElementById('posSearch').addEventListener('input', function() {
    const q = this.value.toLowerCase();
    document.querySelectorAll('.product-item').forEach(el => {
        el.style.display = el.dataset.name.includes(q) ? '' : 'none';
    });
});
</script>

<?php include __DIR__ . '/../layout-end.php'; ?>

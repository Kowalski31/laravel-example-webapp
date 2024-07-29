<div class="main-title">
    <p class="font-weight-bold">Dashboard</p>
</div>

<div class="main-cards">
    <div class="card">
        <div class="card-inner">
            <p class="text-primary">PRODUCTS</p>
            <span class="material-symbols-outlined text-blue">inventory_2</span>
        </div>
        <span class="text-primary font-weight-bold">{{ $product_quantity }}</span>
    </div>

    <div class="card">
        <div class="card-inner">
            <p class="text-primary">PURCHASE ORDERS</p>
            <span class="material-symbols-outlined text-orange">add_shopping_cart</span>
        </div>
        <span class="text-primary font-weight-bold">{{ $order_quantity }}</span>
    </div>

    <div class="card">
        <div class="card-inner">
            <p class="text-primary">CAGTEGORY</p>
            <span class="material-symbols-outlined text-green">shopping_cart</span>
        </div>
        <span class="text-primary font-weight-bold">{{ $category_quantity }}</span>
    </div>

    <div class="card">
        <div class="card-inner">
            <p class="text-primary">INVENTORY ALERTS</p>
            <span class="material-symbols-outlined text-red">notification_important</span>
        </div>
        <span class="text-primary font-weight-bold">0</span>
    </div>
</div>

<div class="charts">
    <div class="charts-card">
        <p class="chart-title">Top 5 Products</p>
        <div id="bar-chart"></div>
    </div>

    <div class="charts-card">
        <p class="chart-title">Purchase and Sales Orders</p>
        <div id="area-chart"></div>
    </div>
</div>

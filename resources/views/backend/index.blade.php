
			
@extends('backend.layouts.main')

@section('title', 'Admin Dashboard | ResellZone')

@section('main-container')
			<div class="page-wrapper">
				<div class="content container-fluid">
					<div class="row">
						<div class="row">
							<!-- Subscriptions -->
							<div class="col-xl-3 col-sm-6 col-12">
								<div class="card">
									<div class="card-body">
										<div class="dash-widget-header">
											<span class="dash-widget-icon bg-1">
												<i class="fas fa-dollar-sign"></i>
											</span>
											<div class="dash-count">
												<div class="dash-title">Subscriptions</div>
												<div class="dash-counts">
													<p>{{$newsletterCount}}</p>
												</div>
											</div>
										</div>
										<div class="progress progress-sm mt-3">
											<div class="progress-bar bg-5" role="progressbar" style="width: {{$newsletterGrowth}}%" 
												 aria-valuenow="{{$newsletterGrowth}}" aria-valuemin="0" aria-valuemax="100">
											</div>
										</div>
										<p class="text-muted mt-3 mb-0">
											<span class="{{ $newsletterGrowth > 0 ? 'text-success' : 'text-danger' }} me-1">
												<i class="fas fa-arrow-{{ $newsletterGrowth > 0 ? 'up' : 'down' }} me-1"></i>
												{{$newsletterGrowth}}%
											</span> today
										</p>
									</div>
								</div>
							</div>
						
							<!-- Customers -->
							<div class="col-xl-3 col-sm-6 col-12">
								<div class="card">
									<div class="card-body">
										<div class="dash-widget-header">
											<span class="dash-widget-icon bg-2">
												<i class="fas fa-users"></i>
											</span>
											<div class="dash-count">
												<div class="dash-title">Customers</div>
												<div class="dash-counts">
													<p>{{$userCount}}</p>
												</div>
											</div>
										</div>
										<div class="progress progress-sm mt-3">
											<div class="progress-bar bg-6" role="progressbar" style="width: {{$userGrowth}}%" 
												 aria-valuenow="{{$userGrowth}}" aria-valuemin="0" aria-valuemax="100">
											</div>
										</div>
										<p class="text-muted mt-3 mb-0">
											<span class="{{ $userGrowth > 0 ? 'text-success' : 'text-danger' }} me-1">
												<i class="fas fa-arrow-{{ $userGrowth > 0 ? 'up' : 'down' }} me-1"></i>
												{{$userGrowth}}%
											</span> today
										</p>
									</div>
								</div>
							</div>
						
							<!-- Total Ads -->
							<div class="col-xl-3 col-sm-6 col-12">
								<div class="card">
									<div class="card-body">
										<div class="dash-widget-header">
											<span class="dash-widget-icon bg-3">
												<i class="fas fa-file-alt"></i>
											</span>
											<div class="dash-count">
												<div class="dash-title">Total Ads</div>
												<div class="dash-counts">
													<p>{{$productCount}}</p>
												</div>
											</div>
										</div>
										<div class="progress progress-sm mt-3">
											<div class="progress-bar bg-7" role="progressbar" style="width: {{$productGrowth}}%" 
												 aria-valuenow="{{$productGrowth}}" aria-valuemin="0" aria-valuemax="100">
											</div>
										</div>
										<p class="text-muted mt-3 mb-0">
											<span class="{{ $productGrowth > 0 ? 'text-success' : 'text-danger' }} me-1">
												<i class="fas fa-arrow-{{ $productGrowth > 0 ? 'up' : 'down' }} me-1"></i>
												{{$productGrowth}}%
											</span> today
										</p>
									</div>
								</div>
							</div>
						
							<!-- User Contacts -->
							<div class="col-xl-3 col-sm-6 col-12">
								<div class="card">
									<div class="card-body">
										<div class="dash-widget-header">
											<span class="dash-widget-icon bg-4">
												<i class="far fa-file"></i>
											</span>
											<div class="dash-count">
												<div class="dash-title">User Contacts</div>
												<div class="dash-counts">
													<p>{{$contactCount}}</p>
												</div>
											</div>
										</div>
										<div class="progress progress-sm mt-3">
											<div class="progress-bar bg-8" role="progressbar" style="width: {{$contactGrowth}}%" 
												 aria-valuenow="{{$contactGrowth}}" aria-valuemin="0" aria-valuemax="100">
											</div>
										</div>
										<p class="text-muted mt-3 mb-0">
											<span class="{{ $contactGrowth > 0 ? 'text-success' : 'text-danger' }} me-1">
												<i class="fas fa-arrow-{{ $contactGrowth > 0 ? 'up' : 'down' }} me-1"></i>
												{{$contactGrowth}}%
											</span> today
										</p>
									</div>
								</div>
							</div>
						
						

						 {{-- <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon bg-1">
                        <i class="fas fa-dollar-sign"></i>
                    </span>
                    <div class="dash-count">
                        <div class="dash-title">Subscriptions</div>
                        <div class="dash-counts">
                            <p>{{$newsletterCount}}</p>
                        </div>
                    </div>
                </div>
                <div class="progress progress-sm mt-3">
                    <div class="progress-bar bg-5" role="progressbar" style="width: {{$newsletterGrowth}}%" 
                         aria-valuenow="{{$newsletterGrowth}}" aria-valuemin="0" aria-valuemax="100">
                    </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                    <span class="{{ $newsletterGrowth >= 0 ? 'text-success' : 'text-danger' }} me-1">
                        <i class="fas fa-arrow-{{ $newsletterGrowth >= 0 ? 'up' : 'down' }} me-1"></i>
                        {{$newsletterGrowth}}%
                    </span> since last week
                </p>
            </div>
        </div>
    </div>

    <!-- Customers -->
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon bg-2">
                        <i class="fas fa-users"></i>
                    </span>
                    <div class="dash-count">
                        <div class="dash-title">Customers</div>
                        <div class="dash-counts">
                            <p>{{$userCount}}</p>
                        </div>
                    </div>
                </div>
                <div class="progress progress-sm mt-3">
                    <div class="progress-bar bg-6" role="progressbar" style="width: {{$userGrowth}}%" 
                         aria-valuenow="{{$userGrowth}}" aria-valuemin="0" aria-valuemax="100">
                    </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                    <span class="{{ $userGrowth >= 0 ? 'text-success' : 'text-danger' }} me-1">
                        <i class="fas fa-arrow-{{ $userGrowth >= 0 ? 'up' : 'down' }} me-1"></i>
                        {{$userGrowth}}%
                    </span> since last week
                </p>
            </div>
        </div>
    </div>

    <!-- Total Ads -->
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon bg-3">
                        <i class="fas fa-file-alt"></i>
                    </span>
                    <div class="dash-count">
                        <div class="dash-title">Total Ads</div>
                        <div class="dash-counts">
                            <p>{{$productCount}}</p>
                        </div>
                    </div>
                </div>
                <div class="progress progress-sm mt-3">
                    <div class="progress-bar bg-7" role="progressbar" style="width: {{$productGrowth}}%" 
                         aria-valuenow="{{$productGrowth}}" aria-valuemin="0" aria-valuemax="100">
                    </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                    <span class="{{ $productGrowth >= 0 ? 'text-success' : 'text-danger' }} me-1">
                        <i class="fas fa-arrow-{{ $productGrowth >= 0 ? 'up' : 'down' }} me-1"></i>
                        {{$productGrowth}}%
                    </span> since last week
                </p>
            </div>
        </div>
    </div>

    <!-- User Contacts -->
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon bg-4">
                        <i class="far fa-file"></i>
                    </span>
                    <div class="dash-count">
                        <div class="dash-title">User Contacts</div>
                        <div class="dash-counts">
                            <p>{{$contactCount}}</p>
                        </div>
                    </div>
                </div>
                <div class="progress progress-sm mt-3">
                    <div class="progress-bar bg-8" role="progressbar" style="width: {{$contactGrowth}}%" 
                         aria-valuenow="{{$contactGrowth}}" aria-valuemin="0" aria-valuemax="100">
                    </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                    <span class="{{ $contactGrowth >= 0 ? 'text-success' : 'text-danger' }} me-1">
                        <i class="fas fa-arrow-{{ $contactGrowth >= 0 ? 'up' : 'down' }} me-1"></i>
                        {{$contactGrowth}}%
                    </span> since last week
                </p>
            </div>
        </div>
    </div> --}}
					</div>
					
				<!-- Include ApexCharts Library -->
				<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

	<div class="row gy-4">
    <!-- Summary Cards -->
    <div class="col-md-4">
        <div class="card border-0 shadow-lg text-white bg-gradient-primary">
            <div class="card-body">
                <h6 class="text-uppercase">Total Orders</h6>
                <h3 id="totalOrders" class="mb-0">--</h3>
                <small>Updated: <span id="orderTimeframe">Monthly</span></small>
            </div>
        </div>
    </div>
  <div class="col-md-4">
    <div class="card border-0 shadow-lg text-white bg-gradient-success">
        <div class="card-body">
            <h6 class="text-uppercase">Top Category</h6>
            <h3 id="topCategory">
                {{ $salesData->first()->category ?? 'No Data' }}
            </h3>
            <small>Updated: Monthly</small>
        </div>
    </div>
</div>


    <!-- Main Charts -->
    <div class="col-lg-7">
        <div class="card shadow-sm border-0">
            <div class="card-header d-flex justify-content-between align-items-center bg-white">
                <h5 class="card-title mb-0 text-dark"><i class="fas fa-chart-line me-2"></i>Order Analytics</h5>
                <select class="form-select form-select-sm w-auto" id="orderFilter">
                    <option value="today">Today</option>
                    <option value="weekly">Weekly</option>
                    <option value="monthly" selected>Monthly</option>
                    <option value="yearly">Yearly</option>
                </select>
            </div>
            <div class="card-body">
                <div id="orders_chart" style="height: 350px;"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card shadow-sm border-0">
            <div class="card-header d-flex justify-content-between align-items-center bg-white">
                <h5 class="card-title mb-0 text-dark"><i class="fas fa-chart-pie me-2"></i>Sales by Category</h5>
                <select class="form-select form-select-sm w-auto" id="categoryFilter">
                    <option value="weekly">Weekly</option>
                    <option value="monthly" selected>Monthly</option>
                    <option value="yearly">Yearly</option>
                </select>
            </div>
            <div class="card-body">
                <div id="sales_chart" style="height: 350px;"></div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const orderChart = new ApexCharts(document.querySelector("#orders_chart"), {
        series: [{ name: "Orders", data: [] }],
        chart: { type: 'area', height: 350, toolbar: { show: false } },
        stroke: { curve: 'smooth', width: 3 },
        xaxis: { categories: [] },
        colors: ['#800000'],
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.6,
                opacityTo: 0.1,
                stops: [0, 100]
            }
        },
        tooltip: { theme: 'dark' }
    });

    orderChart.render();

    const salesChart = new ApexCharts(document.querySelector("#sales_chart"), {
        series: [{ name: "Sales", data: {!! json_encode($salesData->pluck('total_sales')) !!} }],
        chart: { type: 'bar', height: 350 },
        plotOptions: { bar: { borderRadius: 4, columnWidth: '50%' } },
        xaxis: { categories: {!! json_encode($salesData->pluck('category')) !!} },
        colors: ['#800000'],
        tooltip: {
            theme: 'dark',
            y: { formatter: val => `PKR ${val}` }
        }
    });

    salesChart.render();

    // Load Order Analytics
    function loadOrders(timeframe = 'monthly') {
        fetch(`/api/order-stats?timeframe=${timeframe}`)
            .then(res => res.json())
            .then(data => {
                orderChart.updateOptions({
                    xaxis: { categories: data.labels },
                    series: [{ name: 'Orders', data: data.data }]
                });
                document.getElementById('totalOrders').textContent = data.totalOrders;
                document.getElementById('orderTimeframe').textContent = capitalize(timeframe);
            });
    }

    // Load Sales by Category
    function loadCategorySales(range = 'monthly') {
        fetch(`/api/sales-by-category?range=${range}`)
            .then(res => res.json())
            .then(data => {
                salesChart.updateOptions({
                    xaxis: { categories: data.categories },
                    series: [{ name: 'Sales', data: data.sales }]
                });
                document.getElementById('topCategory').textContent = data.categories[0] || 'N/A';
                document.getElementById('categoryTimeframe').textContent = capitalize(range);
            });
    }

    // Utility
    const capitalize = txt => txt.charAt(0).toUpperCase() + txt.slice(1);

    // Event Listeners
    document.getElementById("orderFilter").addEventListener("change", (e) => {
        loadOrders(e.target.value);
    });

    document.getElementById("categoryFilter").addEventListener("change", (e) => {
        loadCategorySales(e.target.value);
    });

    // Initial Load
    loadOrders();
    loadCategorySales();
});
</script>
<style>
.bg-gradient-primary {
    background: linear-gradient(to right, #800000, #b22222);
}
.bg-gradient-success {
    background: linear-gradient(to right, #1d976c, #93f9b9);
}

.card-title {
    font-weight: 600;
    font-size: 16px;
}

select.form-select-sm {
    min-width: 120px;
}

#orders_chart, #sales_chart {
    margin-top: 10px;
}
</style>


<div class="card shadow-lg border-0 mt-4 rounded-4">
    <div class="card-header bg-white d-flex justify-content-between align-items-center rounded-top-4">
        <h5 class="card-title mb-0 text-dark">
            <i class="fas fa-layer-group me-2 text-secondary"></i>
            Orders by Status (Monthly)
        </h5>
    </div>
    <div class="card-body p-4">
        <div id="orderStatusChart" style="height: 400px;"></div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    var options = {
        chart: {
            type: 'bar',
            height: 400,
            stacked: true,
            toolbar: { show: true }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                borderRadius: 6,
                columnWidth: '55%'
            }
        },
        stroke: { width: 1, colors: ['#fff'] },
        xaxis: {
            categories: {!! json_encode($monthLabels) !!}
        },
        yaxis: {
            title: { text: 'Total Orders' }
        },
        fill: { opacity: 1 },
        tooltip: {
            shared: true,
            intersect: false,
            y: {
                formatter: function (val) {
                    return val + " Orders";
                }
            }
        },
        colors: ['#28a745', '#007bff', '#dc3545'],
        series: {!! json_encode($orderStatusData) !!}
    };

    new ApexCharts(document.querySelector("#orderStatusChart"), options).render();
});
</script>


			@endsection
			
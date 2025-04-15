<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Metrological Services - Dashboard</title>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
<div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <div class="bg-blue-800 text-white w-64 flex-shrink-0 hidden md:block">
        <div class="flex items-center justify-center h-16 border-b border-blue-700">
            <span class="text-xl font-bold">Sidime</span>
        </div>
        <nav class="mt-5">
            <div class="px-4">
            <div class="flex items-center px-4 py-3 bg-blue-700 text-white rounded-md cursor-pointer mb-1">
                <i class="fas fa-tachometer-alt mr-3"></i>
                <span>Dashboard</span>
            </div>
            <div class="flex items-center px-4 py-3 text-gray-300 hover:bg-blue-700 hover:text-white rounded-md cursor-pointer mb-1">
                <i class="fas fa-users mr-3"></i>
                <span>Client Management</span>
            </div>
            <div class="flex items-center px-4 py-3 text-gray-300 hover:bg-blue-700 hover:text-white rounded-md cursor-pointer mb-1">
                <i class="fas fa-building mr-3"></i>
                <span>Importer Management</span>
            </div>
            <div class="flex items-center px-4 py-3 text-gray-300 hover:bg-blue-700 hover:text-white rounded-md cursor-pointer mb-1">
                <i class="fas fa-balance-scale mr-3"></i>
                <span>Scales Management</span>
            </div>
            <div class="flex items-center px-4 py-3 text-gray-300 hover:bg-blue-700 hover:text-white rounded-md cursor-pointer mb-1">
                <i class="fas fa-clipboard-check mr-3"></i>
                <span>Metrological Revisions</span>
            </div>
            <div class="flex items-center px-4 py-3 text-gray-300 hover:bg-blue-700 hover:text-white rounded-md cursor-pointer mb-1">
                <i class="fas fa-exclamation-triangle mr-3"></i>
                <span>Penalties & Tracking</span>
            </div>
            <div class="flex items-center px-4 py-3 text-gray-300 hover:bg-blue-700 hover:text-white rounded-md cursor-pointer mb-1">
                <i class="fas fa-user-shield mr-3"></i>
                <span>User Management</span>
            </div>
            <div class="flex items-center px-4 py-3 text-gray-300 hover:bg-blue-700 hover:text-white rounded-md cursor-pointer mb-1">
                <i class="fas fa-file-export mr-3"></i>
                <span>Data Export</span>
            </div>
            <div class="flex items-center px-4 py-3 text-gray-300 hover:bg-blue-700 hover:text-white rounded-md cursor-pointer mb-1">
                <i class="fas fa-user-cog mr-3"></i>
                <span>Profile Settings</span>
            </div>
            <div class="flex items-center px-4 py-3 text-gray-300 hover:bg-blue-700 hover:text-white rounded-md cursor-pointer mt-6">
                <i class="fas fa-sign-out-alt mr-3"></i>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"">
                        Logout
                    </button>
                </form>
            </div>
            </div>
        </nav>
    </div>

    <div class="flex flex-col flex-1 overflow-hidden">
        <!-- Header -->
        <header class="bg-white shadow-sm z-10">
            <div class="flex items-center justify-between h-16 px-6">
            <div class="flex items-center">
                <button class="text-gray-500 focus:outline-none md:hidden">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="relative w-64 ml-4 md:ml-0">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-search text-gray-500"></i>
                    </span>
                    <input class="block w-full pl-10 pr-3 py-2 rounded-md text-sm border border-gray-300 focus:outline-none focus:border-blue-500" placeholder="Search...">
                </div>
                
            </div>
            <div class="flex items-center">
                {{-- <button class="flex mx-4 text-gray-600 focus:outline-none">
                    <i class="fas fa-bell"></i>
                    <span class="absolute top-3 right-16 flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                    </span>
                </button> --}}
                <div class="relative">
                    <button class="flex items-center text-gray-600 focus:outline-none">
                        <div class="w-8 h-8 bg-gray-300 rounded-full overflow-hidden">
                        <img src="/api/placeholder/32/32" alt="Profile" class="w-full h-full object-cover">
                        </div>
                        <span class="ml-2">{{ Auth::user()->name }} , {{ Auth::user()->email }}</span>
                    </button>
                    
                </div>
            </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto bg-gray-100 p-6">
            <h1 class="text-2xl font-semibold text-gray-800">Dashboard</h1>
            <p class="text-gray-600 mb-6">Welcome, Mohamed Amine! Here's your system overview.</p>

            <!-- Four Cards for Key Metrics -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <!-- Total Clients -->
            <div class="bg-white rounded-lg shadow p-4">
                <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-500">
                    <i class="fas fa-users"></i>
                </div>
                <div class="ml-4">
                    <h2 class="font-semibold text-gray-800">Total Clients</h2>
                    <p class="text-2xl font-bold">247</p>
                    <p class="text-green-500 text-sm"><i class="fas fa-arrow-up"></i> 5% increase</p>
                </div>
                </div>
            </div>

            <!-- Total Importers -->
            <div class="bg-white rounded-lg shadow p-4">
                <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-500">
                    <i class="fas fa-building"></i>
                </div>
                <div class="ml-4">
                    <h2 class="font-semibold text-gray-800">Total Importers</h2>
                    <p class="text-2xl font-bold">42</p>
                    <p class="text-green-500 text-sm"><i class="fas fa-arrow-up"></i> 2% increase</p>
                </div>
                </div>
            </div>

            <!-- Total Scales -->
            <div class="bg-white rounded-lg shadow p-4">
                <div class="flex items-center">
                <div class="p-3 rounded-full bg-indigo-100 text-indigo-500">
                    <i class="fas fa-balance-scale"></i>
                </div>
                <div class="ml-4">
                    <h2 class="font-semibold text-gray-800">Total Scales</h2>
                    <p class="text-2xl font-bold">583</p>
                    <p class="text-green-500 text-sm"><i class="fas fa-arrow-up"></i> 7% increase</p>
                </div>
                </div>
            </div>

            <!-- Pending Revisions -->
            <div class="bg-white rounded-lg shadow p-4">
                <div class="flex items-center">
                <div class="p-3 rounded-full bg-red-100 text-red-500">
                    <i class="fas fa-clipboard-check"></i>
                </div>
                <div class="ml-4">
                    <h2 class="font-semibold text-gray-800">Pending Revisions</h2>
                    <p class="text-2xl font-bold">35</p>
                    <p class="text-red-500 text-sm"><i class="fas fa-arrow-up"></i> 12% increase</p>
                </div>
                </div>
            </div>
            </div>

            <!-- Three Column Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <!-- Upcoming Tasks/Notifications -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h2 class="font-semibold text-lg text-gray-800">Upcoming Tasks</h2>
                </div>
                <div class="p-4">
                <div class="mb-4 pb-4 border-b border-gray-100">
                    <div class="flex items-center justify-between mb-2">
                    <span class="font-medium text-red-600">Overdue Revisions</span>
                    <span class="text-sm bg-red-100 text-red-800 px-2 py-1 rounded-full">12</span>
                    </div>
                    <p class="text-sm text-gray-600">12 scales need immediate attention</p>
                </div>
                <div class="mb-4 pb-4 border-b border-gray-100">
                    <div class="flex items-center justify-between mb-2">
                    <span class="font-medium text-yellow-600">Upcoming Revisions</span>
                    <span class="text-sm bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full">23</span>
                    </div>
                    <p class="text-sm text-gray-600">Due within next 30 days</p>
                </div>
                <div class="mb-4">
                    <div class="flex items-center justify-between mb-2">
                    <span class="font-medium text-green-600">New Clients</span>
                    <span class="text-sm bg-green-100 text-green-800 px-2 py-1 rounded-full">5</span>
                    </div>
                    <p class="text-sm text-gray-600">Added in the last 7 days</p>
                </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h2 class="font-semibold text-lg text-gray-800">Recent Activity</h2>
                </div>
                <div class="p-4">
                <div class="mb-4 pb-4 border-b border-gray-100">
                    <div class="flex items-center mb-2">
                    <i class="fas fa-user-plus text-blue-500 mr-2"></i>
                    <span class="font-medium">Café Marrakech added as client</span>
                    </div>
                    <p class="text-sm text-gray-600">Added by Ahmed on Apr 14, 2025</p>
                </div>
                <div class="mb-4 pb-4 border-b border-gray-100">
                    <div class="flex items-center mb-2">
                    <i class="fas fa-sync text-green-500 mr-2"></i>
                    <span class="font-medium">Scale #M452 revision completed</span>
                    </div>
                    <p class="text-sm text-gray-600">Updated by Youssef on Apr 13, 2025</p>
                </div>
                <div class="mb-4">
                    <div class="flex items-center mb-2">
                    <i class="fas fa-plus-circle text-indigo-500 mr-2"></i>
                    <span class="font-medium">New scale added for Restaurant Fez</span>
                    </div>
                    <p class="text-sm text-gray-600">Added by Laila on Apr 12, 2025</p>
                </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h2 class="font-semibold text-lg text-gray-800">Quick Actions</h2>
                </div>
                <div class="p-4 flex flex-col space-y-4">
                <button class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded flex items-center justify-center">
                    <i class="fas fa-user-plus mr-2"></i> Add New Client
                </button>
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded flex items-center justify-center">
                    <i class="fas fa-plus-circle mr-2"></i> Add New Scale
                </button>
                <button class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded flex items-center justify-center">
                    <i class="fas fa-clipboard-check mr-2"></i> Manage Revisions
                </button>
                <button class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded flex items-center justify-center">
                    <i class="fas fa-file-export mr-2"></i> Export Reports
                </button>
                </div>
            </div>
            </div>

            <!-- Recent Revisions Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="font-semibold text-lg text-gray-800">Recent Revisions</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Scale ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Revision</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Next Due Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">SC-4589</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">Restaurant Agadir</div>
                            <div class="text-sm text-gray-500">Marrakech, Morocco</div>
                        </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Feb 15, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">May 15, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Schedule</a>
                    </td>
                    </tr>
                    <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">SC-4526</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">Boucherie Casablanca</div>
                            <div class="text-sm text-gray-500">Casablanca, Morocco</div>
                        </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jan 25, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-red-500">Apr 25, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Overdue</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                        <a href="#" class="text-red-600 hover:text-red-900">Urgent</a>
                    </td>
                    </tr>
                    <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">SC-4501</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">Supermarché Fes</div>
                            <div class="text-sm text-gray-500">Fes, Morocco</div>
                        </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mar 10, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jun 10, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Schedule</a>
                    </td>
                    </tr>
                    <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">SC-4487</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">Hôtel Royal</div>
                            <div class="text-sm text-gray-500">Rabat, Morocco</div>
                        </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mar 05, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-yellow-600">Apr 20, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Due Soon</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                        <a href="#" class="text-yellow-600 hover:text-yellow-900">Remind</a>
                    </td>
                    </tr>
                    <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">SC-4471</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">Café Tanger</div>
                            <div class="text-sm text-gray-500">Tanger, Morocco</div>
                        </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Apr 01, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jul 01, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Schedule</a>
                    </td>
                    </tr>
                </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-200">
                <div class="flex items-center justify-between">
                <div class="text-sm text-gray-500">
                    Showing 1 to 5 of 35 entries
                </div>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-600 hover:bg-gray-50">Previous</button>
                    <button class="px-3 py-1 border border-gray-300 bg-blue-500 text-white rounded-md text-sm hover:bg-blue-600">1</button>
                    <button class="px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-600 hover:bg-gray-50">2</button>
                    <button class="px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-600 hover:bg-gray-50">3</button>
                    <button class="px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-600 hover:bg-gray-50">Next</button>
                </div>
                </div>
            </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>
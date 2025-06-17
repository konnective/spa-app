<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPA</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .app-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 20px 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .header h1 {
            color: white;
            text-align: center;
            font-size: 2.5em;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .navigation {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .nav-btn {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 16px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .nav-btn:hover, .nav-btn.active {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .content-area {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            min-height: 500px;
        }

        .page {
            display: none;
            animation: fadeIn 0.5s ease-in;
        }

        .page.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .loading {
            text-align: center;
            padding: 40px;
            color: #666;
        }

        .loading i {
            font-size: 2em;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e1e1e1;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
        }

        .btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .user-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .user-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }

        .user-card h3 {
            color: #333;
            margin-bottom: 10px;
        }

        .user-card p {
            color: #666;
            margin-bottom: 5px;
        }

        .user-actions {
            margin-top: 15px;
        }

        .btn-small {
            padding: 6px 15px;
            font-size: 14px;
            margin-right: 10px;
        }

        .btn-danger {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
        }

        .btn-info {
            background: linear-gradient(135deg, #3c6382 0%, #40739e 100%);
        }

        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #28a745;
            color: #155724;
        }

        .alert-error {
            background-color: #f8d7da;
            border-color: #dc3545;
            color: #721c24;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
        }

        .stat-card h3 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .stat-card p {
            font-size: 1.1em;
            opacity: 0.9;
        }

        .search-box {
            position: relative;
            margin-bottom: 20px;
        }

        .search-box input {
            padding-left: 40px;
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        @media (max-width: 768px) {
            .navigation {
                flex-wrap: wrap;
                gap: 10px;
            }
            
            .nav-btn {
                padding: 8px 15px;
                font-size: 14px;
            }
            
            .header h1 {
                font-size: 2em;
            }
        }
    </style>
</head>
<body>
    <div class="app-container">
        <div class="header">
            <h1><i class="fas fa-rocket"></i> SPA Dashboard</h1>
            <div class="navigation">
                <button class="nav-btn active" data-page="dashboard">
                    <i class="fas fa-home"></i> Dashboard
                </button>
                <button class="nav-btn" data-page="users">
                    <i class="fas fa-users"></i> Users
                </button>
                <button class="nav-btn" data-page="create-user">
                    <i class="fas fa-user-plus"></i> Add User
                </button>
                <button class="nav-btn" data-page="settings">
                    <i class="fas fa-cog"></i> Settings
                </button>
            </div>
        </div>

        <div class="content-area">
            <!-- Dashboard Page -->
            <div id="dashboard" class="page active">
                <h2><i class="fas fa-chart-line"></i> Dashboard Overview</h2>
                <div class="stats-grid">
                    <div class="stat-card">
                        <h3 id="total-users">0</h3>
                        <p>Total Users</p>
                    </div>
                    <div class="stat-card">
                        <h3 id="active-sessions">0</h3>
                        <p>Active Sessions</p>
                    </div>
                    <div class="stat-card">
                        <h3 id="total-posts">0</h3>
                        <p>Total Posts</p>
                    </div>
                    <div class="stat-card">
                        <h3 id="server-status">Online</h3>
                        <p>Server Status</p>
                    </div>
                </div>
                <div>
                    <h3>Recent Activity</h3>
                    <div id="recent-activity">
                        <p>Loading recent activity...</p>
                    </div>
                </div>
            </div>

            <!-- Users Page -->
            <div id="users" class="page">
                <h2><i class="fas fa-users"></i> User Management</h2>
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="user-search" placeholder="Search users...">
                </div>
                <div id="users-list">
                    <div class="loading">
                        <i class="fas fa-spinner"></i>
                        <p>Loading users...</p>
                    </div>
                </div>
            </div>

            <!-- Create User Page -->
            <div id="create-user" class="page">
                <h2><i class="fas fa-user-plus"></i> Add New User</h2>
                <form id="user-form">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <textarea id="bio" name="bio" rows="4" placeholder="Tell us about yourself..."></textarea>
                    </div>
                    <button type="submit" class="btn">
                        <i class="fas fa-plus"></i> Create User
                    </button>
                </form>
            </div>

            <!-- Settings Page -->
            <div id="settings" class="page">
                <h2><i class="fas fa-cog"></i> Application Settings</h2>
                <form id="settings-form">
                    <div class="form-group">
                        <label for="app-name">Application Name</label>
                        <input type="text" id="app-name" name="app_name" value="SPA Dashboard">
                    </div>
                    <div class="form-group">
                        <label for="api-url">API Base URL</label>
                        <input type="url" id="api-url" name="api_url" value="/api">
                    </div>
                    <div class="form-group">
                        <label for="items-per-page">Items Per Page</label>
                        <input type="number" id="items-per-page" name="items_per_page" value="10" min="5" max="100">
                    </div>
                    <div class="form-group">
                        <label for="auto-refresh">Auto Refresh Dashboard</label>
                        <input type="checkbox" id="auto-refresh" name="auto_refresh" checked>
                    </div>
                    <button type="submit" class="btn">
                        <i class="fas fa-save"></i> Save Settings
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Application state
            const app = {
                users: [],
                settings: {
                    app_name: 'SPA Dashboard',
                    api_url: '/api',
                    items_per_page: 10,
                    auto_refresh: true
                },
                stats: {
                    total_users: 0,
                    active_sessions: 247,
                    total_posts: 1532,
                    server_status: 'Online'
                }
            };

            // Mock data for demonstration
            const mockUsers = [
                { id: 1, name: 'John Doe', email: 'john@example.com', phone: '+1234567890', bio: 'Software Developer' },
                { id: 2, name: 'Jane Smith', email: 'jane@example.com', phone: '+1234567891', bio: 'UI/UX Designer' },
                { id: 3, name: 'Mike Johnson', email: 'mike@example.com', phone: '+1234567892', bio: 'Project Manager' },
                { id: 4, name: 'Sarah Wilson', email: 'sarah@example.com', phone: '+1234567893', bio: 'Data Analyst' },
                { id: 5, name: 'David Brown', email: 'david@example.com', phone: '+1234567894', bio: 'DevOps Engineer' }
            ];

            // Initialize application
            function init() {
                app.users = [...mockUsers];
                app.stats.total_users = app.users.length;
                
                bindEvents();
                loadDashboard();
                
                // Auto-refresh dashboard every 30 seconds
                if (app.settings.auto_refresh) {
                    setInterval(loadDashboard, 30000);
                }
            }

            // Bind event listeners
            function bindEvents() {
                // Navigation
                $('.nav-btn').on('click', function() {
                    const targetPage = $(this).data('page');
                    navigateToPage(targetPage);
                });

                // User form submission
                $('#user-form').on('submit', handleUserFormSubmit);

                // Settings form submission
                $('#settings-form').on('submit', handleSettingsFormSubmit);

                // User search
                $('#user-search').on('input', handleUserSearch);

                // User actions (delegated events)
                $(document).on('click', '.edit-user', handleEditUser);
                $(document).on('click', '.delete-user', handleDeleteUser);
            }

            // Navigation function
            function navigateToPage(pageId) {
                $('.nav-btn').removeClass('active');
                $(`.nav-btn[data-page="${pageId}"]`).addClass('active');
                
                $('.page').removeClass('active');
                $(`#${pageId}`).addClass('active');

                // Load page-specific data
                switch(pageId) {
                    case 'dashboard':
                        loadDashboard();
                        break;
                    case 'users':
                        loadUsers();
                        break;
                    case 'settings':
                        loadSettings();
                        break;
                }
            }

            // Load dashboard data
            function loadDashboard() {
                // Update stats
                $('#total-users').text(app.stats.total_users);
                $('#active-sessions').text(app.stats.active_sessions);
                $('#total-posts').text(app.stats.total_posts);
                $('#server-status').text(app.stats.server_status);

                // Load recent activity
                const activities = [
                    'New user registered: Jane Smith',
                    'Server backup completed successfully',
                    'Database optimization finished',
                    'New post published by John Doe',
                    'System maintenance scheduled'
                ];

                const activityHtml = activities.map(activity => 
                    `<div class="user-card">
                        <p><i class="fas fa-clock"></i> ${activity}</p>
                        <small style="color: #999;">Just now</small>
                    </div>`
                ).join('');

                $('#recent-activity').html(activityHtml);
            }

            // Load users
            function loadUsers() {
                renderUsers(app.users);
            }

            // Render users list
            function renderUsers(users) {
                if (users.length === 0) {
                    $('#users-list').html('<p>No users found.</p>');
                    return;
                }

                const usersHtml = users.map(user => `
                    <div class="user-card" data-user-id="${user.id}">
                        <h3>${user.name}</h3>
                        <p><i class="fas fa-envelope"></i> ${user.email}</p>
                        <p><i class="fas fa-phone"></i> ${user.phone || 'Not provided'}</p>
                        <p><i class="fas fa-info-circle"></i> ${user.bio || 'No bio available'}</p>
                        <div class="user-actions">
                            <button class="btn btn-small btn-info edit-user" data-user-id="${user.id}">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="btn btn-small btn-danger delete-user" data-user-id="${user.id}">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </div>
                    </div>
                `).join('');

                $('#users-list').html(usersHtml);
            }

            // Load settings
            function loadSettings() {
                $('#app-name').val(app.settings.app_name);
                $('#api-url').val(app.settings.api_url);
                $('#items-per-page').val(app.settings.items_per_page);
                $('#auto-refresh').prop('checked', app.settings.auto_refresh);
            }

            // Handle user form submission
            function handleUserFormSubmit(e) {
                e.preventDefault();
                
                const formData = {
                    id: Date.now(), // Mock ID
                    name: $('#name').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    bio: $('#bio').val()
                };

                // Simulate API call
                simulateApiCall(() => {
                    app.users.push(formData);
                    app.stats.total_users = app.users.length;
                    
                    showAlert('User created successfully!', 'success');
                    $('#user-form')[0].reset();
                    
                    // Navigate to users page
                    navigateToPage('users');
                });
            }

            // Handle settings form submission
            function handleSettingsFormSubmit(e) {
                e.preventDefault();
                
                app.settings = {
                    app_name: $('#app-name').val(),
                    api_url: $('#api-url').val(),
                    items_per_page: parseInt($('#items-per-page').val()),
                    auto_refresh: $('#auto-refresh').prop('checked')
                };

                // Update header title
                $('.header h1').html(`<i class="fas fa-rocket"></i> ${app.settings.app_name}`);

                showAlert('Settings saved successfully!', 'success');
            }

            // Handle user search
            function handleUserSearch() {
                const searchTerm = $('#user-search').val().toLowerCase();
                const filteredUsers = app.users.filter(user => 
                    user.name.toLowerCase().includes(searchTerm) ||
                    user.email.toLowerCase().includes(searchTerm)
                );
                renderUsers(filteredUsers);
            }

            // Handle edit user
            function handleEditUser(e) {
                const userId = parseInt($(e.target).data('user-id'));
                const user = app.users.find(u => u.id === userId);
                
                if (user) {
                    // Pre-fill form with user data
                    $('#name').val(user.name);
                    $('#email').val(user.email);
                    $('#phone').val(user.phone);
                    $('#bio').val(user.bio);
                    
                    // Navigate to create user page (acting as edit)
                    navigateToPage('create-user');
                    
                    showAlert('User data loaded for editing', 'success');
                }
            }

            // Handle delete user
            function handleDeleteUser(e) {
                const userId = parseInt($(e.target).data('user-id'));
                
                if (confirm('Are you sure you want to delete this user?')) {
                    simulateApiCall(() => {
                        app.users = app.users.filter(u => u.id !== userId);
                        app.stats.total_users = app.users.length;
                        
                        showAlert('User deleted successfully!', 'success');
                        loadUsers();
                    });
                }
            }

            // Show alert message
            function showAlert(message, type) {
                const alertHtml = `
                    <div class="alert alert-${type}">
                        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
                        ${message}
                    </div>
                `;
                
                $('.content-area').prepend(alertHtml);
                
                // Auto-remove alert after 3 seconds
                setTimeout(() => {
                    $('.alert').fadeOut(() => {
                        $('.alert').remove();
                    });
                }, 3000);
            }

            // Simulate API call with loading state
            function simulateApiCall(callback, delay = 1000) {
                // Show loading state
                const $btn = $('button[type="submit"]');
                const originalText = $btn.html();
                $btn.html('<i class="fas fa-spinner fa-spin"></i> Processing...').prop('disabled', true);
                
                setTimeout(() => {
                    callback();
                    $btn.html(originalText).prop('disabled', false);
                }, delay);
            }

            // Initialize the application
            init();
        });
    </script>
</body>
</html>
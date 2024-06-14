<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List Sidebar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <style>
        /* Custom styles for the sidebar */
        #sidebar {
            width: 250px;
            height: 100vh;
            background-color: #f7fafc;
            padding: 10px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .user {
            padding: 10px;
            border-bottom: 1px solid #e2e8f0;
        }
    </style>
</head>

<body class="antialiased">
    <div class="flex">
        <div id="sidebar">
            <h2 class="text-lg font-semibold mb-4">Users</h2>
            <div id="user-list"></div>
        </div>
        <div class="flex-grow p-6">
            <!-- Main content goes here -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Define the API endpoint
            const apiEndpoint = '/api/users';

            // Function to fetch users and render them in the sidebar
            function fetchAndRenderUsers() {
                axios.get(apiEndpoint)
                    .then(response => {
                        // Get the user list container
                        const userList = document.getElementById('user-list');
                        userList.innerHTML = ''; // Clear any existing content

                        // Iterate over the users and create HTML elements for each user
                        response.data.forEach(user => {
                            const userElement = document.createElement('div');
                            userElement.classList.add('user');
                            userElement.textContent = `${user.name} (${user.email})`;
                            userList.appendChild(userElement);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching users:', error);
                        const userList = document.getElementById('user-list');
                        userList.innerHTML = '<p>Failed to load user list.</p>';
                    });
            }

            // Fetch and render users when the page loads
            fetchAndRenderUsers();
        });
    </script>
</body>

</html>

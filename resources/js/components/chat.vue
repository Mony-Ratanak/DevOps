<template>
    <main class="content">
        <div class="container p-0">
            <h1 class="h3 mb-3">Messages</h1>
            <div class="card">
                <div class="row g-0">
                    <div class="col-12 col-lg-5 col-xl-3 border-right">
                        <!-- User List -->
                        <div v-for="user in users" :key="user.id" @click="selectUser(user)">
                            <a href="#" class="list-group-item list-group-item-action border-0">
                                <div class="d-flex align-items-center">
                                    <img
                                        src="https://bootdey.com/img/Content/avatar/avatar5.png"
                                        class="rounded-circle mr-1"
                                        :alt="user.name"
                                        width="40"
                                        height="40"
                                    />
                                    <div class="flex-grow-1 ml-3">
                                        {{ user.name }}
                                        <div class="small">
                                            <span class="fas fa-circle chat-online"></span> Online
                                        </div>
                                    </div>
                                    <div class="d-flex w-6 h-6 bg-success text-white items-center justify-center">{{ user.message_count }}</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7 col-xl-9">
                        <!-- Display Messages for Selected User -->
                        <div v-if="selectedUser">
                            <div class="py-2 px-4 border-bottom d-none d-lg-block">
                                <div class="d-flex align-items-center py-1">
                                    <div class="position-relative">
                                        <img
                                            src="https://bootdey.com/img/Content/avatar/avatar5.png"
                                            class="rounded-circle mr-1"
                                            :alt="selectedUser.name"
                                            width="40"
                                            height="40"
                                        />
                                    </div>
                                    <div class="flex-grow-1 pl-3">
                                        <strong>{{ selectedUser.name }}</strong>
                                        <div class="text-muted small"><em>Typing...</em></div>
                                    </div>
                                    <div>
                                        <!-- Add your buttons here -->
                                    </div>
                                    <div>
                                        <button class="btn btn-primary btn-lg mr-1 px-3">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-phone feather-lg"
                                            >
                                                <path
                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"
                                                ></path>
                                            </svg>
                                        </button>
                                        <button
                                            class="btn btn-info btn-lg mr-1 px-3 d-none d-md-inline-block"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-video feather-lg"
                                            >
                                                <polygon points="23 7 16 12 23 17 23 7"></polygon>
                                                <rect
                                                    x="1"
                                                    y="5"
                                                    width="15"
                                                    height="14"
                                                    rx="2"
                                                    ry="2"
                                                ></rect>
                                            </svg>
                                        </button>
                                        <button class="btn btn-light border btn-lg px-3">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-more-horizontal feather-lg"
                                            >
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="19" cy="12" r="1"></circle>
                                                <circle cx="5" cy="12" r="1"></circle>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="position-relative">
                                <div class="chat-messages p-4">
                                    <div v-for="message in messages" :key="message.id" :class="{ 'chat-message-right': message.sender_id === currentUser.id, 'chat-message-left': message.sender_id !== currentUser.id }" class="pb-4">
                                        <div class="flex">
                                            <img
                                                src="https://bootdey.com/img/Content/avatar/avatar5.png"
                                                class="rounded-circle mr-1"
                                                width="40"
                                                height="40"
                                            />
                                            <div class="flex flex-column">
                                                <div>{{ message.user.name }}</div>
                                                <div>
                                                    <div class="text-muted small text-nowrap mt-2">
                                                        {{ message.created_at }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3">
                                            {{ message.text }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-0 py-3 px-4 border-top">
                                <div class="input-group">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Type your message"
                                    />
                                    <button class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import axios from 'axios';

export default {
    name: "ChatModule",
    data() {
        return {
            users: [],
            selectedUser: null,
            messages: [],
            currentUser: {
                id: 1,
                name: "Your Name",
                avatar: "https://bootdey.com/img/Content/avatar/avatar1.png"
            }
        };
    },
    methods: {
        async fetchUsers() {
            try {
                const response = await axios.get('http://127.0.0.1:8000/api/users');
                this.users = response.data;
            } catch (error) {
                console.error('Error fetching users:', error);
            }
        },

        async fetchMessages(user) {
            try {
                const userId = user.id;
                // console.log('User ID:', userId);
                const response = await axios.get(`http://127.0.0.1:8000/api/messages/${userId}`);
                this.messages = response.data.messages; // Extract messages array from response
                console.log('Messages:', this.messages);
            } catch (error) {
                console.error('Error fetching messages:', error);
            }
        },

        selectUser(user) {
            this.selectedUser = user;
            this.fetchMessages(user);
        },

        connectWebSocket() {
            console.log('connecting');
            window.Echo.private("channel_for_everyone")
                .listen('GotMessage', async (e) => {
                    console.log(e);
                    // alert(e);
                    location.reload();
                });
        }
    },
    mounted() {
        this.fetchUsers();
        this.connectWebSocket();
    }
    
}
</script>

<style scoped>
/* Add your custom styles here */
</style>